# Bệnh viện Đa khoa số 10 - Website

WordPress website cho Bệnh viện Đa khoa số 10.

## Yêu cầu

- Docker Desktop
- Git

## Cài đặt nhanh

### 1. Clone và khởi động

```bash
cd vien-10-website

# Khởi động Docker containers
make up

# Hoặc nếu không có make:
docker compose up -d
```

### 2. Cài đặt WordPress

```bash
make install

# Hoặc chạy thủ công:
docker compose run --rm wpcli core install \
    --url="http://localhost:8080" \
    --title="Bệnh viện Đa khoa số 10" \
    --admin_user=admin \
    --admin_password=admin123 \
    --admin_email=admin@example.com \
    --locale=vi
```

### 3. Truy cập

- **Website:** http://localhost:8080
- **Admin:** http://localhost:8080/wp-admin
  - Username: `admin`
  - Password: `admin123`
- **phpMyAdmin:** http://localhost:8081

## Cấu trúc project

```
vien-10-website/
├── bvdk10-theme/          # WordPress theme
│   ├── assets/
│   ├── inc/
│   ├── template-parts/
│   ├── functions.php
│   ├── style.css
│   └── ...
├── docker/                 # Docker configs
│   ├── php.ini
│   ├── mysql.cnf
│   └── apache.conf
├── backups/               # Database backups
├── docker-compose.yml
├── Dockerfile
├── Makefile
└── README.md
```

## Commands

```bash
# Khởi động
make up

# Dừng
make down

# Restart
make restart

# Xem logs
make logs

# Vào shell WordPress
make shell

# Vào MySQL
make db-shell

# Chạy WP-CLI
make wp cmd="plugin list"
make wp cmd="theme list"
make wp cmd="cache flush"

# Backup database
make backup

# Restore database
make restore file=backups/backup-xxx.sql

# Update WordPress
make update-wp

# Xóa tất cả (cẩn thận!)
make clean
```

## Cài đặt ACF Pro

1. Tải ACF Pro từ [advancedcustomfields.com](https://www.advancedcustomfields.com/)
2. Vào Admin > Plugins > Add New > Upload Plugin
3. Upload file zip và kích hoạt

## Theme Development

Theme được mount trực tiếp vào container, mọi thay đổi sẽ tự động cập nhật.

```bash
# Edit files trong bvdk10-theme/
# Refresh browser để thấy thay đổi
```

## Production Deployment

```bash
# Build production image
docker build -t bvdk10-wordpress .

# Push to registry
docker tag bvdk10-wordpress your-registry/bvdk10-wordpress:latest
docker push your-registry/bvdk10-wordpress:latest
```

## Troubleshooting

### Lỗi permissions
```bash
docker compose exec wordpress chown -R www-data:www-data /var/www/html
```

### Reset WordPress
```bash
make clean
make up
make install
```

### Xem error logs
```bash
docker compose logs wordpress
```
