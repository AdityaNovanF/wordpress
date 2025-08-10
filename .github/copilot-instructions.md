# Copilot Instructions for Spanish Learning WordPress Theme

## Project Overview
This is a WordPress theme for a Spanish learning platform with components for lessons, landing page, and blog content. The theme follows a modular architecture with template parts and custom page templates.

## Key Components

### Template Structure
- `page-landing.php` - Main landing page template with hero section, testimonials, and featured lessons
- `page-lessons.php` - Template for displaying all lessons in a grid layout
- `template-parts/` - Modular components like navbar and footer
- `wp-content/themes/twentytwentyfive/` - Theme root directory

### Design Patterns

#### Template Parts Usage
```php
// Include modular components using template parts
get_template_part('template-parts/header/navbar');
get_template_part('template-parts/footer/footer');
```

#### WordPress Naming Conventions
- Page templates use `page-{slug}.php` format
- Template parts stored in `template-parts/{section}/{name}.php`
- Custom templates require header comment block:
```php
/**
 * Template Name: Lessons
 * Description: Template for displaying all lessons in blog style
 */
```

#### Styling Conventions
- CSS variables for consistent theming:
```css
:root {
    --primary: #0D47A1;
    --warning: #FFC107;
    --navbar-height: 56px;
}
```
- BEM-like class naming: `.blog-card`, `.card-img-wrapper`
- Bootstrap 5 grid system and utilities
- AOS animations for scroll effects

### Common Operations

#### Creating New Page Templates
1. Create file with `page-{slug}.php` naming
2. Add template header comment block
3. Include necessary template parts
4. Enqueue required assets
5. Create corresponding page in WordPress admin

#### Query Posts
```php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
);
$query = new WP_Query($args);
```

### External Dependencies
- Bootstrap 5 CSS/JS
- Font Awesome icons
- Google Fonts (Inter)
- AOS animation library

### Development Workflow
1. Changes made in theme files at `wp-content/themes/twentytwentyfive/`
2. Clear cache when modifying templates
3. Create pages in WordPress admin and assign templates
4. Test responsive behavior across breakpoints

## Best Practices
- Always escape output with `esc_html()`, `esc_url()`
- Use template parts for reusable components
- Follow WordPress coding standards
- Maintain mobile-first responsive design
