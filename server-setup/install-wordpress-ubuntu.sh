#!/bin/bash
#
# WordPress Installation Script for Ubuntu 22.04/24.04
# Bệnh viện Đa khoa số 10
#
# Usage: sudo bash install-wordpress-ubuntu.sh
#

set -e

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Configuration - THAY ĐỔI CÁC THÔNG SỐ NÀY
DOMAIN="benhvien10.vn"
DB_NAME="bvdk10_db"
DB_USER="bvdk10_user"
DB_PASS="$(openssl rand -base64 16)"  # Random password
WP_ADMIN="admin"
WP_ADMIN_PASS="$(openssl rand -base64 12)"
WP_ADMIN_EMAIL="admin@benhvien10.vn"
WEB_ROOT="/var/www/${DOMAIN}"

echo -e "${GREEN}========================================${NC}"
echo -e "${GREEN}  WordPress Installation for Ubuntu${NC}"
echo -e "${GREEN}  Domain: ${DOMAIN}${NC}"
echo -e "${GREEN}========================================${NC}"

# Check if running as root
if [ "$EUID" -ne 0 ]; then
    echo -e "${RED}Please run as root (sudo)${NC}"
    exit 1
fi

# Update system
echo -e "${YELLOW}[1/10] Updating system...${NC}"
apt update && apt upgrade -y

# Install required packages
echo -e "${YELLOW}[2/10] Installing LAMP stack...${NC}"
apt install -y \
    apache2 \
    mysql-server \
    php8.3 \
    php8.3-mysql \
    php8.3-curl \
    php8.3-gd \
    php8.3-mbstring \
    php8.3-xml \
    php8.3-xmlrpc \
    php8.3-zip \
    php8.3-intl \
    php8.3-imagick \
    php8.3-bcmath \
    libapache2-mod-php8.3 \
    unzip \
    curl \
    wget

# For Ubuntu 22.04, use php8.1 instead of php8.3
# apt install -y php8.1 php8.1-mysql php8.1-curl ...

# Enable Apache modules
echo -e "${YELLOW}[3/10] Configuring Apache...${NC}"
a2enmod rewrite
a2enmod ssl
a2enmod headers

# Configure MySQL
echo -e "${YELLOW}[4/10] Configuring MySQL...${NC}"
mysql -e "CREATE DATABASE IF NOT EXISTS ${DB_NAME} DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -e "CREATE USER IF NOT EXISTS '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASS}';"
mysql -e "GRANT ALL PRIVILEGES ON ${DB_NAME}.* TO '${DB_USER}'@'localhost';"
mysql -e "FLUSH PRIVILEGES;"

# Create web directory
echo -e "${YELLOW}[5/10] Creating web directory...${NC}"
mkdir -p ${WEB_ROOT}

# Download WordPress
echo -e "${YELLOW}[6/10] Downloading WordPress...${NC}"
cd /tmp
wget -q https://wordpress.org/latest.tar.gz
tar -xzf latest.tar.gz
cp -r wordpress/* ${WEB_ROOT}/
rm -rf wordpress latest.tar.gz

# Configure WordPress
echo -e "${YELLOW}[7/10] Configuring WordPress...${NC}"
cd ${WEB_ROOT}
cp wp-config-sample.php wp-config.php

# Generate security keys
SALT=$(curl -s https://api.wordpress.org/secret-key/1.1/salt/)

# Update wp-config.php
sed -i "s/database_name_here/${DB_NAME}/" wp-config.php
sed -i "s/username_here/${DB_USER}/" wp-config.php
sed -i "s/password_here/${DB_PASS}/" wp-config.php

# Replace security keys
sed -i "/AUTH_KEY/d" wp-config.php
sed -i "/SECURE_AUTH_KEY/d" wp-config.php
sed -i "/LOGGED_IN_KEY/d" wp-config.php
sed -i "/NONCE_KEY/d" wp-config.php
sed -i "/AUTH_SALT/d" wp-config.php
sed -i "/SECURE_AUTH_SALT/d" wp-config.php
sed -i "/LOGGED_IN_SALT/d" wp-config.php
sed -i "/NONCE_SALT/d" wp-config.php

# Add salt keys before "That's all" comment
sed -i "/\/\* That's all/i\\
${SALT}
" wp-config.php

# Add additional configurations
cat >> wp-config.php << 'WPCONFIG'

/* Additional configurations */
define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '512M');
define('DISALLOW_FILE_EDIT', true);
define('WP_AUTO_UPDATE_CORE', 'minor');
define('FS_METHOD', 'direct');

/* Vietnamese locale */
define('WPLANG', 'vi');
WPCONFIG

# Set permissions
echo -e "${YELLOW}[8/10] Setting permissions...${NC}"
chown -R www-data:www-data ${WEB_ROOT}
find ${WEB_ROOT} -type d -exec chmod 755 {} \;
find ${WEB_ROOT} -type f -exec chmod 644 {} \;

# Create Apache virtual host
echo -e "${YELLOW}[9/10] Creating Apache virtual host...${NC}"
cat > /etc/apache2/sites-available/${DOMAIN}.conf << VHOST
<VirtualHost *:80>
    ServerName ${DOMAIN}
    ServerAlias www.${DOMAIN}
    DocumentRoot ${WEB_ROOT}

    <Directory ${WEB_ROOT}>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    # Security headers
    Header always set X-Content-Type-Options "nosniff"
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-XSS-Protection "1; mode=block"

    # Logging
    ErrorLog \${APACHE_LOG_DIR}/${DOMAIN}-error.log
    CustomLog \${APACHE_LOG_DIR}/${DOMAIN}-access.log combined
</VirtualHost>
VHOST

# Enable site
a2ensite ${DOMAIN}.conf
a2dissite 000-default.conf

# Create .htaccess
cat > ${WEB_ROOT}/.htaccess << 'HTACCESS'
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress

# Security
<Files wp-config.php>
    Order Allow,Deny
    Deny from all
</Files>

<Files .htaccess>
    Order Allow,Deny
    Deny from all
</Files>

# Disable directory browsing
Options -Indexes

# Block access to sensitive files
<FilesMatch "^(readme\.html|license\.txt|wp-config-sample\.php)$">
    Order Allow,Deny
    Deny from all
</FilesMatch>

# Protect uploads
<Directory "wp-content/uploads">
    <FilesMatch "\.(php|php\d|phtml|pht|php-s)$">
        Order Allow,Deny
        Deny from all
    </FilesMatch>
</Directory>
HTACCESS

chown www-data:www-data ${WEB_ROOT}/.htaccess

# Configure PHP
echo -e "${YELLOW}[10/10] Configuring PHP...${NC}"
PHP_INI="/etc/php/8.3/apache2/php.ini"
# For Ubuntu 22.04: PHP_INI="/etc/php/8.1/apache2/php.ini"

sed -i "s/upload_max_filesize = .*/upload_max_filesize = 64M/" ${PHP_INI}
sed -i "s/post_max_size = .*/post_max_size = 64M/" ${PHP_INI}
sed -i "s/memory_limit = .*/memory_limit = 256M/" ${PHP_INI}
sed -i "s/max_execution_time = .*/max_execution_time = 300/" ${PHP_INI}
sed -i "s/max_input_time = .*/max_input_time = 300/" ${PHP_INI}

# Restart Apache
systemctl restart apache2
systemctl enable apache2

# Install WP-CLI
echo -e "${YELLOW}Installing WP-CLI...${NC}"
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
mv wp-cli.phar /usr/local/bin/wp

# Complete WordPress installation via WP-CLI
echo -e "${YELLOW}Completing WordPress installation...${NC}"
cd ${WEB_ROOT}
sudo -u www-data wp core install \
    --url="${DOMAIN}" \
    --title="Bệnh viện Đa khoa số 10" \
    --admin_user="${WP_ADMIN}" \
    --admin_password="${WP_ADMIN_PASS}" \
    --admin_email="${WP_ADMIN_EMAIL}" \
    --locale="vi" \
    --skip-email

# Install Vietnamese language
sudo -u www-data wp language core install vi
sudo -u www-data wp site switch-language vi

# Configure permalinks
sudo -u www-data wp rewrite structure '/%postname%/'

# Delete default content
sudo -u www-data wp post delete 1 2 --force 2>/dev/null || true
sudo -u www-data wp plugin delete hello akismet 2>/dev/null || true
sudo -u www-data wp theme delete twentytwentytwo twentytwentythree 2>/dev/null || true

# Print credentials
echo -e "${GREEN}========================================${NC}"
echo -e "${GREEN}  Installation Complete!${NC}"
echo -e "${GREEN}========================================${NC}"
echo ""
echo -e "${YELLOW}Database Information:${NC}"
echo "  Database: ${DB_NAME}"
echo "  Username: ${DB_USER}"
echo "  Password: ${DB_PASS}"
echo ""
echo -e "${YELLOW}WordPress Admin:${NC}"
echo "  URL: http://${DOMAIN}/wp-admin"
echo "  Username: ${WP_ADMIN}"
echo "  Password: ${WP_ADMIN_PASS}"
echo ""
echo -e "${YELLOW}Web Root: ${WEB_ROOT}${NC}"
echo ""
echo -e "${RED}IMPORTANT: Save these credentials securely!${NC}"
echo -e "${RED}Then delete this output from your terminal history.${NC}"
echo ""
echo -e "${YELLOW}Next steps:${NC}"
echo "1. Point your domain DNS to this server's IP"
echo "2. Install SSL certificate: sudo certbot --apache -d ${DOMAIN}"
echo "3. Copy your theme to: ${WEB_ROOT}/wp-content/themes/"
echo "4. Install ACF Pro plugin"
echo ""

# Save credentials to file
cat > /root/wordpress-credentials-${DOMAIN}.txt << CREDS
WordPress Installation Credentials
===================================
Date: $(date)

Database:
  Name: ${DB_NAME}
  User: ${DB_USER}
  Pass: ${DB_PASS}

WordPress Admin:
  URL: http://${DOMAIN}/wp-admin
  User: ${WP_ADMIN}
  Pass: ${WP_ADMIN_PASS}

Web Root: ${WEB_ROOT}
CREDS

chmod 600 /root/wordpress-credentials-${DOMAIN}.txt
echo -e "${GREEN}Credentials saved to: /root/wordpress-credentials-${DOMAIN}.txt${NC}"
