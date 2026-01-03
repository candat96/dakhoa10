# AGENTS.md - BVDK10 WordPress Theme

> Guidelines for AI coding agents working in this repository.

## Project Overview

Custom WordPress theme for "Benh vien Da khoa so 10" (Hospital No. 10) - a Vietnamese healthcare website. The project uses Docker for local development and ACF Pro for content management.

**Tech Stack:** PHP 8.2, WordPress 6.x, ACF Pro, Swiper.js 11, CSS (no preprocessor), Vanilla JavaScript

## Build & Development Commands

```bash
# Start development environment
make up              # Start Docker containers (WordPress: localhost:8080, phpMyAdmin: localhost:8081)
make down            # Stop containers
make restart         # Restart containers
make build           # Rebuild and start with fresh image

# First-time setup
make install         # Full WordPress installation with Vietnamese locale

# Logs and debugging
make logs            # View all container logs
make logs-wp         # WordPress-only logs
make shell           # Access WordPress container shell
make db-shell        # Access MySQL shell

# WP-CLI commands
make wp cmd="..."    # Run WP-CLI (e.g., make wp cmd="plugin list")

# Database operations
make backup          # Export database to /backups/
make restore file=backups/backup-xxx.sql

# Maintenance
make update-wp       # Update WP core, plugins, themes
make status          # Show WordPress status
make clean           # Remove all containers and volumes (DESTRUCTIVE)
```

## Testing

No automated tests exist in this project. Verify changes manually:
1. Run `make up` to start the development server
2. Test at http://localhost:8080
3. Check responsive layouts at 1280px, 1024px, 768px, 480px breakpoints

## Project Structure

```
bvdk10-theme/
├── assets/
│   ├── css/main.css       # All styles (CSS custom properties, BEM naming)
│   └── js/main.js         # Vanilla JS (IIFE pattern)
├── inc/
│   ├── acf-fields.php     # ACF field group definitions
│   ├── class-nav-walker.php
│   ├── custom-post-types.php
│   └── theme-helpers.php  # Utility functions (bvdk10_*)
├── template-parts/
│   ├── components/        # Reusable UI (doctor-card.php, service-card.php)
│   └── sections/          # Page sections (hero.php, about.php, etc.)
├── functions.php          # Theme setup, asset enqueue
├── header.php, footer.php
├── front-page.php         # Homepage template
└── style.css              # Theme metadata only
```

## Code Style Guidelines

### PHP

**File Header:**
```php
<?php
/**
 * Description of file
 *
 * @package BVDK10
 */

if (!defined('ABSPATH')) {
    exit;
}
```

**Function Naming:** Use `bvdk10_` prefix for all theme functions:
```php
function bvdk10_get_field($field, $post_id = false, $default = '') { }
function bvdk10_phone_link($phone) { }
function bvdk10_get_doctors($args = array()) { }
```

**Output Escaping:** Always escape output using WordPress functions:
```php
echo esc_html($text);           // Plain text
echo esc_url($url);             // URLs
echo esc_attr($attribute);      // HTML attributes
echo wp_kses_post($html);       // Allowed HTML
```

**ACF Fields:** Use the wrapper function with defaults:
```php
$value = bvdk10_get_field('field_name', false, 'default_value');
```

**Template Parts:** Use `get_template_part()` for modularity:
```php
get_template_part('template-parts/sections/hero');
get_template_part('template-parts/components/doctor', 'card');
```

**WP Query Pattern:**
```php
$doctors = bvdk10_get_doctors(array(
    'posts_per_page' => 6,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));

if ($doctors->have_posts()) :
    while ($doctors->have_posts()) : $doctors->the_post();
        get_template_part('template-parts/components/doctor-card');
    endwhile;
    wp_reset_postdata();
endif;
```

### CSS

**Design Tokens (Custom Properties):**
```css
:root {
    --color-primary: #E53935;
    --color-primary-dark: #C62828;
    --color-secondary: #1565C0;
    --font-family: 'Be Vietnam Pro', sans-serif;
    --spacing-4: 1rem;
    --radius-lg: 1rem;
    --transition-base: 300ms ease;
}
```

**BEM Naming Convention:**
```css
.section-name { }                    /* Block */
.section-name__element { }           /* Element */
.section-name__element--modifier { } /* Modifier */
```

**State Classes:**
```css
.is-active, .is-visible, .is-scrolled, .is-hidden
```

**Responsive Breakpoints:**
```css
@media (max-width: 1280px) { }  /* Large desktop */
@media (max-width: 1024px) { }  /* Tablet landscape */
@media (max-width: 768px) { }   /* Tablet portrait */
@media (max-width: 480px) { }   /* Mobile */
```

### JavaScript

**IIFE Pattern with Strict Mode:**
```javascript
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        initFeatureName();
    });

    function initFeatureName() {
        const element = document.getElementById('element-id');
        if (!element) return;  // Early return if element doesn't exist
        // ... implementation
    }
})();
```

**Utility Functions:** Use `throttle()` and `debounce()` for scroll/resize events.

## Custom Post Types

| Post Type | Slug | Taxonomy |
|-----------|------|----------|
| Doctors | `bac-si` | `chuyen-khoa` (Specialty) |
| Services | `dich-vu` | `danh-muc-dich-vu` (Category) |
| Partners | `doi-tac` | - |
| Achievements | `thanh-tuu` | - |

## Important Notes

1. **No Build Process:** Edit CSS/JS files directly. Changes are reflected on browser refresh.
2. **ACF Pro Required:** Theme depends on Advanced Custom Fields Pro for all custom fields.
3. **Vietnamese Language:** All labels, content defaults, and admin UI are in Vietnamese.
4. **Theme-Only Git:** Only the theme folder is tracked. WordPress core and plugins are excluded.
5. **Docker Volume:** Theme files are mounted at `/var/www/html/wp-content/themes/bvdk10-theme`

## Adding New Features

**New Section:**
1. Create template in `template-parts/sections/new-section.php`
2. Add styles to `assets/css/main.css` (use BEM naming)
3. Include in page template: `get_template_part('template-parts/sections/new-section');`
4. Register ACF fields in `inc/acf-fields.php` if needed

**New Custom Post Type:**
1. Add registration in `inc/custom-post-types.php`
2. Create query helper in `inc/theme-helpers.php`
3. Create card component in `template-parts/components/`

## External Dependencies

- Google Fonts: Be Vietnam Pro (400, 500, 600, 700)
- Swiper.js v11 (CDN): Carousel functionality
- ACF Pro: Custom field management (must be installed separately)
