<?php
/**
 * Template Name: Landing Page
 * Description: A custom landing page template
 */

get_header(); ?>

<div class="landing-page-container">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1><?php echo get_theme_mod('landing_hero_title', 'Welcome to Our Site'); ?></h1>
            <p><?php echo get_theme_mod('landing_hero_description', 'Discover amazing things with us'); ?></p>
            <a href="#contact" class="cta-button">Get Started</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="features-grid">
            <div class="feature-box">
                <h3>Feature 1</h3>
                <p>Description of feature 1 goes here.</p>
            </div>
            <div class="feature-box">
                <h3>Feature 2</h3>
                <p>Description of feature 2 goes here.</p>
            </div>
            <div class="feature-box">
                <h3>Feature 3</h3>
                <p>Description of feature 3 goes here.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <h2>Contact Us</h2>
        <?php echo do_shortcode('[contact-form-7 id="YOUR_FORM_ID" title="Contact form"]'); ?>
    </section>
</div>

<style>
.landing-page-container {
    max-width: 100%;
    margin: 0 auto;
}

.hero-section {
    padding: 100px 20px;
    text-align: center;
    background-color: #f5f5f5;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.hero-content h1 {
    font-size: 3em;
    margin-bottom: 20px;
}

.cta-button {
    display: inline-block;
    padding: 15px 30px;
    background-color: #0073aa;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
}

.features-section {
    padding: 80px 20px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

.feature-box {
    padding: 30px;
    text-align: center;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.contact-section {
    padding: 80px 20px;
    background-color: #f5f5f5;
    text-align: center;
}

@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 2em;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>
