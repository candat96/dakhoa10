#!/bin/bash
#
# SSL Certificate Setup with Let's Encrypt
# Run after WordPress installation and DNS is configured
#
# Usage: sudo bash setup-ssl.sh benhvien10.vn
#

DOMAIN=${1:-"benhvien10.vn"}

echo "Setting up SSL for ${DOMAIN}..."

# Install Certbot
apt install -y certbot python3-certbot-apache

# Get certificate
certbot --apache -d ${DOMAIN} -d www.${DOMAIN} --non-interactive --agree-tos --email admin@${DOMAIN}

# Auto-renewal (already set up by certbot, but verify)
systemctl enable certbot.timer
systemctl start certbot.timer

# Test renewal
certbot renew --dry-run

echo "SSL setup complete!"
echo "Your site is now available at: https://${DOMAIN}"
