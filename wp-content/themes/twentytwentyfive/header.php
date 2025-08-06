<?php
/**
 * Header template for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site-wrapper">
<?php
// Note: Kita tidak menambahkan site-header atau title di sini
// sehingga hanya navbar dari template kita yang akan muncul
?>
