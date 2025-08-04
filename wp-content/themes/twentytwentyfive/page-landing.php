<?php
/**
 * Template Name: Landing Page
 * Description: A custom landing page template for Spanish Learning Platform
 */

// Enqueue necessary assets
function enqueue_assets() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    
    // Bootstrap JS and Popper
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    
    // Font Awesome icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    
    // AOS animation
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);
    
    // Initialize AOS
    wp_add_inline_script('aos-js', "
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
                offset: 100
            });
        });
    ");
}
add_action('wp_enqueue_scripts', 'enqueue_assets');

get_header(); ?>

<div class="landing-page-container">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <span class="text-primary">Spanish</span>Talking
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#courses">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#method">Method</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Reviews</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="#pricing" class="btn btn-primary rounded-pill px-4">
                            Start Learning
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section bg-light py-5 mt-5">
        <div class="container">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="badge bg-primary-subtle text-primary mb-3 px-3 py-2 rounded-pill">Best Way to Learn Spanish</span>
                    <h1 class="display-4 fw-bold mb-4">
                        Master Spanish Through
                        <span class="text-primary">Engaging Stories</span>
                    </h1>
                    <p class="lead text-secondary mb-4">
                        Learn Spanish naturally with captivating stories. No boring exercises, no forced memorization - just interesting stories that will help you achieve fluency.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#courses" class="btn btn-primary btn-lg rounded-pill">
                            Start Free Trial
                        </a>
                        <a href="#method" class="btn btn-outline-primary btn-lg rounded-pill">
                            Learn More
                        </a>
                    </div>
                    <div class="mt-4 pt-2">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div class="d-flex">
                                <img src="https://randomuser.me/api/portraits/women/1.jpg" class="rounded-circle" width="32" height="32" alt="User">
                                <img src="https://randomuser.me/api/portraits/men/1.jpg" class="rounded-circle border border-white" width="32" height="32" alt="User" style="margin-left: -10px;">
                                <img src="https://randomuser.me/api/portraits/women/2.jpg" class="rounded-circle border border-white" width="32" height="32" alt="User" style="margin-left: -10px;">
                            </div>
                            <div class="text-secondary">
                                <strong>50,000+</strong> students already enrolled
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="text-secondary ms-2">4.9/5 from 2,500+ reviews</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="position-relative">
                        <div class="position-absolute top-50 start-50 translate-middle w-75 h-75 bg-primary opacity-10 rounded-circle filter-blur"></div>
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/hero-image.jpg')); ?>" 
                             alt="Learn Spanish through stories" 
                             class="img-fluid rounded-4 shadow-lg hero-image"
                        >
                        <!-- Floating Elements -->
                        <div class="position-absolute top-0 start-0 bg-white p-3 rounded-4 shadow-lg" style="transform: translate(-20%, 20%);" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary-subtle p-2 rounded-circle">
                                    <i class="fas fa-book text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Interactive Stories</h6>
                                    <small class="text-secondary">Learn naturally</small>
                                </div>
                            </div>
                        </div>
                        <div class="position-absolute bottom-0 end-0 bg-white p-3 rounded-4 shadow-lg" style="transform: translate(20%, -20%);" data-aos="fade-left" data-aos-delay="400">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary-subtle p-2 rounded-circle">
                                    <i class="fas fa-graduation-cap text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Certified Teachers</h6>
                                    <small class="text-secondary">Native speakers</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Stats Section -->
    <section class="py-5 bg-light position-relative overflow-hidden">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 bg-white shadow-sm hover-shadow-lg transition-all h-100">
                        <div class="card-body text-center p-5">
                            <div class="stats-icon mb-3">
                                <i class="fas fa-book-open text-primary fa-2x"></i>
                            </div>
                            <h3 class="display-5 fw-bold text-primary mb-2" data-count="20">0+</h3>
                            <p class="text-muted mb-0 fs-5">Cursos de Español</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 bg-white shadow-sm hover-shadow-lg transition-all h-100">
                        <div class="card-body text-center p-5">
                            <div class="stats-icon mb-3">
                                <i class="fas fa-book text-primary fa-2x"></i>
                            </div>
                            <h3 class="display-5 fw-bold text-primary mb-2" data-count="1000">0+</h3>
                            <p class="text-muted mb-0 fs-5">Historias Disponibles</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 bg-white shadow-sm hover-shadow-lg transition-all h-100">
                        <div class="card-body text-center p-5">
                            <div class="stats-icon mb-3">
                                <i class="fas fa-users text-primary fa-2x"></i>
                            </div>
                            <h3 class="display-5 fw-bold text-primary mb-2" data-count="50000">0+</h3>
                            <p class="text-muted mb-0 fs-5">Estudiantes Activos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background Shape -->
        <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden" style="z-index: 0;">
            <div class="position-absolute top-50 start-0 translate-middle-y opacity-10">
                <svg width="800" height="800" viewBox="0 0 200 200">
                    <path fill="#0d6efd" d="M41.9,-72.5C54,-67.2,63.3,-55.7,71.6,-42.8C79.9,-29.9,87.2,-15,86.6,-0.3C86,14.3,77.5,28.6,67.9,41.1C58.3,53.6,47.6,64.3,34.9,70.7C22.2,77.1,7.6,79.2,-6.4,77.8C-20.4,76.4,-34.8,71.5,-45.8,63.1C-56.8,54.7,-64.4,42.8,-71.1,29.7C-77.8,16.5,-83.6,2.1,-82.1,-11.8C-80.7,-25.7,-72,-39,-61.1,-48.3C-50.1,-57.7,-36.8,-63,-24.3,-67.8C-11.7,-72.6,0.1,-76.9,12.8,-77.8C25.5,-78.8,39.1,-76.4,41.9,-72.5Z" transform="translate(100 100)" />
                </svg>
            </div>
            <div class="position-absolute top-50 end-0 translate-middle-y opacity-10">
                <svg width="800" height="800" viewBox="0 0 200 200">
                    <path fill="#0d6efd" d="M47.7,-73.2C59.5,-67.3,65.9,-51.5,71.9,-35.9C77.9,-20.3,83.5,-4.9,81.9,9.7C80.4,24.2,71.7,37.9,60.4,47.4C49.1,56.9,35.1,62.2,20.8,66.5C6.6,70.8,-8,74.1,-21.4,71.2C-34.8,68.2,-47,59,-56.9,47.4C-66.8,35.8,-74.4,21.8,-77.1,6.5C-79.8,-8.8,-77.7,-25.4,-69.3,-37.7C-61,-50,-46.4,-58,-32.8,-62.9C-19.2,-67.8,-6.5,-69.5,7.8,-71.6C22.1,-73.7,36,-79.1,47.7,-73.2Z" transform="translate(100 100)" />
                </svg>
            </div>
        </div>
        <!-- Add Intersection Observer for counting animation -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const countElement = entry.target;
                            const targetCount = parseInt(countElement.getAttribute('data-count'));
                            animateCount(countElement, targetCount);
                            observer.unobserve(countElement);
                        }
                    });
                }, { threshold: 0.5 });

                document.querySelectorAll('[data-count]').forEach(el => observer.observe(el));

                function animateCount(element, target) {
                    let current = 0;
                    const duration = 2000; // 2 seconds
                    const step = target / (duration / 16); // 60fps

                    function update() {
                        current = Math.min(current + step, target);
                        element.textContent = Math.floor(current).toLocaleString() + '+';
                        
                        if (current < target) {
                            requestAnimationFrame(update);
                        }
                    }
                    
                    update();
                }
            });
        </script>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-5 bg-gradient" id="method">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4" data-aos="fade-up">Why Choose Spanish Talking?</h2>
                    <div class="divider-custom" data-aos="fade-up" data-aos-delay="100">
                        <div class="line"></div>
                        <div class="icon"><i class="fas fa-star"></i></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            
            <div class="row g-4 justify-content-center">
                <!-- Feature 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card feature-card h-100 border-0 rounded-4 shadow-sm hover-shadow-lg transition-all">
                        <div class="card-body p-5 text-center">
                            <div class="feature-icon-wrapper mb-4">
                                <div class="feature-icon-bg rounded-circle d-flex align-items-center justify-content-center mx-auto">
                                    <i class="fas fa-book-reader fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3 class="h4 mb-3">Engaging Stories</h3>
                            <p class="text-muted mb-0">Learn Spanish through interesting and culturally relevant stories that keep you engaged.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card feature-card h-100 border-0 rounded-4 shadow-sm hover-shadow-lg transition-all">
                        <div class="card-body p-5 text-center">
                            <div class="feature-icon-wrapper mb-4">
                                <div class="feature-icon-bg rounded-circle d-flex align-items-center justify-content-center mx-auto">
                                    <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3 class="h4 mb-3">Natural Method</h3>
                            <p class="text-muted mb-0">Learn like children do: through natural language exposure, without forced memorization.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card feature-card h-100 border-0 rounded-4 shadow-sm hover-shadow-lg transition-all">
                        <div class="card-body p-5 text-center">
                            <div class="feature-icon-wrapper mb-4">
                                <div class="feature-icon-bg rounded-circle d-flex align-items-center justify-content-center mx-auto">
                                    <i class="fas fa-mobile-alt fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3 class="h4 mb-3">Learn Anywhere</h3>
                            <p class="text-muted mb-0">Access your lessons from any device, anytime and anywhere.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add custom styles for this section -->
        <style>
        .bg-gradient {
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .divider-custom {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1.5rem 0;
        }
        
        .divider-custom .line {
            width: 60px;
            height: 3px;
            background: var(--bs-primary);
            border-radius: 1rem;
        }
        
        .divider-custom .icon {
            color: var(--bs-primary);
            font-size: 1.5rem;
            margin: 0 1rem;
        }
        
        .feature-icon-bg {
            width: 80px;
            height: 80px;
            background-color: rgba(13, 110, 253, 0.1);
        }
        
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .hover-shadow-lg {
            transition: box-shadow 0.3s ease;
        }
        
        .hover-shadow-lg:hover {
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
        }
        </style>
    </section>

    <!-- Course Selection Section -->
    <section class="py-5 bg-white" id="courses">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold mb-4">Find Your Perfect Course</h2>
                <div class="divider-custom">
                    <div class="line"></div>
                    <div class="icon"><i class="fas fa-book"></i></div>
                    <div class="line"></div>
                </div>
            </div>
            
            <!-- Language Level Filters -->
            <div class="d-flex justify-content-center gap-3 mb-5">
                <button class="btn btn-primary px-4 rounded-pill">All Levels</button>
                <button class="btn btn-outline-primary px-4 rounded-pill">Beginner</button>
                <button class="btn btn-outline-primary px-4 rounded-pill">Intermediate</button>
                <button class="btn btn-outline-primary px-4 rounded-pill">Advanced</button>
            </div>

            <!-- Course Grid -->
            <div class="row g-4">
                <!-- Basic Course -->
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm h-100 course-card hover-shadow-lg transition-all">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/course-1.jpg')); ?>" class="card-img-top" alt="Basic Spanish Course">
                        <div class="card-body p-4">
                            <h3 class="h4 fw-bold mb-2">Basic Spanish</h3>
                            <p class="text-muted mb-4">For absolute beginners</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    30 Interactive Stories
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Native Audio
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Practical Exercises
                                </li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary rounded-pill w-100">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Intermediate Course -->
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm h-100 course-card">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/course-2.jpg')); ?>" class="card-img-top" alt="Intermediate Spanish Course">
                        <div class="card-body p-4">
                            <h3 class="h4 fw-bold mb-2">Intermediate (B1-B2)</h3>
                            <p class="text-muted mb-4">For students with basic knowledge</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Fluent Expression
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Advanced Grammar
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Listening Comprehension
                                </li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary rounded-pill w-100">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Advanced Course -->
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm h-100 course-card">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/course-3.jpg')); ?>" class="card-img-top" alt="Advanced Spanish Course">
                        <div class="card-body p-4">
                            <h3 class="h4 fw-bold mb-2">Advanced (C1-C2)</h3>
                            <p class="text-muted mb-4">For complete mastery</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Native Fluency
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Idiomatic Expressions
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Literature & Culture
                                </li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary rounded-pill w-100">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-5 bg-light" id="blog">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold mb-4">Latest Articles</h2>
                <div class="divider-custom">
                    <div class="line"></div>
                    <div class="icon"><i class="fas fa-newspaper"></i></div>
                    <div class="line"></div>
                </div>
            </div>
            <div class="row g-4">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $latest_posts = new WP_Query($args);
                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="card-img-wrapper">
                                <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                            </div>
                            <?php endif; ?>
                            <div class="card-body p-4">
                                <div class="text-muted small mb-2">
                                    <?php echo get_the_date('F j, Y'); ?> • <?php echo get_the_category_list(', '); ?>
                                </div>
                                <h3 class="h5 card-title">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <p class="card-text text-muted">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="text-center mt-5">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" 
                   class="btn btn-primary btn-lg rounded-pill px-5">
                    View All Articles
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="display-4 fw-bold mb-4">Get in Touch</h2>
                    <div class="divider-custom mb-5">
                        <div class="line"></div>
                        <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="line"></div>
                    </div>
                    <p class="lead text-muted mb-5">Have questions about our Spanish courses? We're here to help!</p>
                    <?php echo do_shortcode('[contact-form-7 id="YOUR_FORM_ID" title="Contact form"]'); ?>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
/* Custom Variables */
:root {
    --primary: #0d6efd;
    --secondary: #6c757d;
    --transition: all 0.3s ease;
}

/* General Styles */
body {
    font-family: 'Inter', sans-serif;
}

/* Animations */
@keyframes float {
    0% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0); }
}

.hero-image {
    animation: float 6s ease-in-out infinite;
}

/* Helper Classes */
.min-vh-75 {
    min-height: 75vh;
}

.filter-blur {
    filter: blur(40px);
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

.text-gradient {
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
}

/* Navbar Styles */
.backdrop-blur-md {
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

.navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
}

/* Hero Section */
.hero-section {
    padding: 160px 0 100px;
    background-color: #f8f9fa;
    position: relative;
}

.hero-image {
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    animation: float 6s ease-in-out infinite;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.hero-content h1 {
    font-size: var(--wp--preset--font-size--xxx-large);
    margin-bottom: 20px;
    color: var(--wp--preset--color--contrast);
}

.hero-content p {
    font-size: var(--wp--preset--font-size--medium);
    margin-bottom: 30px;
    color: var(--wp--preset--color--contrast);
}

.cta-container {
    margin-top: 30px;
}

.cta-button {
    display: inline-block;
    text-decoration: none;
    transition: all 0.3s ease;
}

.cta-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.features-section {
    padding: 100px 20px;
    background-color: var(--wp--preset--color--base);
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 40px;
    max-width: 1200px;
    margin: 0 auto;
}

.feature-box {
    padding: 40px;
    text-align: center;
    background-color: var(--wp--preset--color--base-2);
    border-radius: 12px;
    transition: transform 0.3s ease;
}

.feature-box:hover {
    transform: translateY(-5px);
}

.feature-box h3 {
    color: var(--wp--preset--color--contrast);
    margin-bottom: 15px;
    font-size: var(--wp--preset--font-size--large);
}

.feature-box p {
    color: var(--wp--preset--color--contrast);
    font-size: var(--wp--preset--font-size--medium);
}

.course-levels-section {
    padding: 100px 20px;
    background-color: var(--wp--preset--color--base);
}

.course-levels-section h2 {
    text-align: center;
    color: var(--wp--preset--color--contrast);
    margin-bottom: 50px;
    font-size: var(--wp--preset--font-size--xx-large);
}

.levels-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

.level-box {
    background-color: var(--wp--preset--color--base-2);
    padding: 40px;
    border-radius: 12px;
    text-align: left;
}

.level-box h3 {
    color: var(--wp--preset--color--contrast);
    margin-bottom: 20px;
    font-size: var(--wp--preset--font-size--large);
}

.level-box ul {
    list-style-type: none;
    padding: 0;
    margin: 0 0 30px 0;
}

.level-box ul li {
    color: var(--wp--preset--color--contrast);
    margin-bottom: 10px;
    padding-left: 25px;
    position: relative;
}

.level-box ul li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: var(--wp--preset--color--primary);
}

.level-button {
    display: inline-block;
    padding: 12px 25px;
    background-color: var(--wp--preset--color--primary);
    color: var(--wp--preset--color--base);
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.level-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.contact-section {
    padding: 100px 20px;
    background-color: var(--wp--preset--color--base-2);
    text-align: center;
}

.contact-section h2 {
    color: var(--wp--preset--color--contrast);
    margin-bottom: 40px;
    font-size: var(--wp--preset--font-size--xx-large);
}

/* Stats Section */
.stats-section {
    background-color: #fff;
    border-bottom: 1px solid #eee;
}

.stat-item h3 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #0d6efd;
    margin-bottom: 0.5rem;
}

.stat-item p {
    color: #6c757d;
    margin: 0;
}

/* Feature Cards */
.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.feature-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: rgba(13, 110, 253, 0.1);
    margin-bottom: 1.5rem;
}

/* Course Cards */
.card-img-top {
    height: 200px;
    object-fit: cover;
}

/* Animations */
@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-section {
        padding: 120px 0 60px;
        text-align: center;
    }

    .hero-image {
        margin-top: 3rem;
    }

    .stat-item {
        margin-bottom: 2rem;
    }
}

/* Testimonials Section */
.testimonial-card {
    background-color: #fff;
}

.testimonial-avatar {
    width: 50px;
    height: 50px;
    object-fit: cover;
}

.testimonial-text {
    font-style: italic;
}

/* FAQ Section */
.accordion-item {
    background-color: #fff;
    border-radius: 8px !important;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.accordion-button {
    font-weight: 600;
    padding: 1.25rem;
}

.accordion-button:not(.collapsed) {
    background-color: #fff;
    color: #0d6efd;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: rgba(13, 110, 253, 0.1);
}

.accordion-body {
    padding: 1.25rem;
    background-color: #fff;
}

/* Blog Section */
.blog-card {
    transition: transform 0.3s ease;
}

.blog-card:hover {
    transform: translateY(-5px);
}

.blog-image-wrapper {
    height: 200px;
    overflow: hidden;
}

.blog-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.blog-card:hover .blog-image {
    transform: scale(1.05);
}

.blog-meta {
    font-size: 0.875rem;
}

.blog-card .card-title {
    margin-bottom: 1rem;
}

.blog-card .card-title a:hover {
    color: var(--wp--preset--color--primary) !important;
}

/* Contact Form */
.wpcf7-form {
    max-width: 600px;
    margin: 0 auto;
}

.wpcf7-form input[type="text"],
.wpcf7-form input[type="email"],
.wpcf7-form textarea {
    width: 100%;
    padding: 0.75rem;
    margin-bottom: 1rem;
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out;
}

.wpcf7-form input[type="text"]:focus,
.wpcf7-form input[type="email"]:focus,
.wpcf7-form textarea:focus {
    border-color: #0d6efd;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

.wpcf7-submit {
    background-color: #0d6efd;
    color: white;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 0.375rem;
    cursor: pointer;
    transition: background-color 0.15s ease-in-out;
}

.wpcf7-submit:hover {
    background-color: #0b5ed7;
}
</style>

<?php get_footer(); ?>
