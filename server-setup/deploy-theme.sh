#!/bin/bash
#
# Deploy BVDK10 Theme to Server
#
# Usage: bash deploy-theme.sh user@server-ip
#

SERVER=${1:-"root@your-server-ip"}
DOMAIN="benhvien10.vn"
THEME_DIR="bvdk10-theme"
REMOTE_PATH="/var/www/${DOMAIN}/wp-content/themes/"

echo "Deploying theme to ${SERVER}..."

# Sync theme files
rsync -avz --delete \
    --exclude '.DS_Store' \
    --exclude '*.log' \
    --exclude 'node_modules' \
    ../${THEME_DIR}/ \
    ${SERVER}:${REMOTE_PATH}${THEME_DIR}/

# Set permissions on server
ssh ${SERVER} "chown -R www-data:www-data ${REMOTE_PATH}${THEME_DIR}"
ssh ${SERVER} "find ${REMOTE_PATH}${THEME_DIR} -type d -exec chmod 755 {} \;"
ssh ${SERVER} "find ${REMOTE_PATH}${THEME_DIR} -type f -exec chmod 644 {} \;"

echo "Theme deployed successfully!"
echo "Activate at: https://${DOMAIN}/wp-admin/themes.php"
