# Makefile for BVDK10 WordPress Docker Setup
# Usage: make [command]

.PHONY: help up down restart logs shell db-shell wp install clean backup

# Default command
help:
	@echo "BVDK10 WordPress Docker Commands"
	@echo "================================="
	@echo ""
	@echo "  make up        - Start all containers"
	@echo "  make down      - Stop all containers"
	@echo "  make restart   - Restart all containers"
	@echo "  make logs      - View container logs"
	@echo "  make shell     - Access WordPress container shell"
	@echo "  make db-shell  - Access MySQL shell"
	@echo "  make wp        - Run WP-CLI commands (e.g., make wp cmd='plugin list')"
	@echo "  make install   - First time setup (install & configure)"
	@echo "  make clean     - Remove all containers and volumes"
	@echo "  make backup    - Backup database"
	@echo ""
	@echo "URLs:"
	@echo "  WordPress:   http://localhost:8080"
	@echo "  phpMyAdmin:  http://localhost:8081"

# Start containers
up:
	docker compose up -d
	@echo ""
	@echo "✅ Containers started!"
	@echo "   WordPress:  http://localhost:8080"
	@echo "   phpMyAdmin: http://localhost:8081"

# Stop containers
down:
	docker compose down

# Restart containers
restart:
	docker compose restart

# Build and start
build:
	docker compose up -d --build

# View logs
logs:
	docker compose logs -f

# WordPress logs only
logs-wp:
	docker compose logs -f wordpress

# Access WordPress shell
shell:
	docker compose exec wordpress bash

# Access MySQL shell
db-shell:
	docker compose exec db mysql -u bvdk10_user -pbvdk10_secret_password bvdk10_db

# Run WP-CLI command
# Usage: make wp cmd="plugin list"
wp:
	docker compose run --rm wpcli $(cmd)

# First time installation
install: up
	@echo "⏳ Waiting for database to be ready..."
	@sleep 10
	@echo "🔧 Installing WordPress..."
	docker compose run --rm wpcli core install \
		--url="http://localhost:8080" \
		--title="Bệnh viện Đa khoa số 10" \
		--admin_user=admin \
		--admin_password=admin123 \
		--admin_email=admin@example.com \
		--locale=vi
	@echo "🌐 Installing Vietnamese language..."
	docker compose run --rm wpcli language core install vi
	docker compose run --rm wpcli site switch-language vi
	@echo "🔗 Setting up permalinks..."
	docker compose run --rm wpcli rewrite structure '/%postname%/'
	@echo "🎨 Activating theme..."
	docker compose run --rm wpcli theme activate bvdk10-theme || true
	@echo ""
	@echo "✅ Installation complete!"
	@echo ""
	@echo "🌐 WordPress: http://localhost:8080"
	@echo "👤 Admin:     http://localhost:8080/wp-admin"
	@echo "   Username:  admin"
	@echo "   Password:  admin123"
	@echo ""
	@echo "📌 Next steps:"
	@echo "   1. Install ACF Pro plugin"
	@echo "   2. Go to Theme Settings to configure"

# Install ACF Pro (if you have the zip file)
install-acf:
	@echo "📦 To install ACF Pro:"
	@echo "   1. Download from advancedcustomfields.com"
	@echo "   2. Go to http://localhost:8080/wp-admin/plugin-install.php"
	@echo "   3. Click 'Upload Plugin' and select the zip file"

# Clean everything (WARNING: removes all data)
clean:
	@echo "⚠️  This will remove all containers and data!"
	@read -p "Are you sure? [y/N] " confirm && [ "$$confirm" = "y" ]
	docker compose down -v --remove-orphans
	@echo "✅ Cleaned!"

# Backup database
backup:
	@mkdir -p backups
	@docker compose exec db mysqldump -u bvdk10_user -pbvdk10_secret_password bvdk10_db > backups/backup-$$(date +%Y%m%d-%H%M%S).sql
	@echo "✅ Backup saved to backups/"

# Restore database
# Usage: make restore file=backups/backup-xxx.sql
restore:
	@docker compose exec -T db mysql -u bvdk10_user -pbvdk10_secret_password bvdk10_db < $(file)
	@echo "✅ Database restored from $(file)"

# Update WordPress
update-wp:
	docker compose run --rm wpcli core update
	docker compose run --rm wpcli plugin update --all
	docker compose run --rm wpcli theme update --all

# Check WordPress status
status:
	@echo "📊 WordPress Status"
	@echo "==================="
	docker compose run --rm wpcli core version
	docker compose run --rm wpcli plugin list
	docker compose run --rm wpcli theme list
