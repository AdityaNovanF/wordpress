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
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm py-0" style="top: var(--wp-admin--admin-bar--height, 0);">
        <div class="container h-100">
            <a class="navbar-brand fw-bold fs-4 py-0" href="#">
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
    <section class="hero-section position-relative overflow-hidden d-flex align-items-center">
        <div class="hero-bg position-absolute w-100 h-100" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);"></div>
        <div class="container position-relative">
            <div class="row align-items-center py-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill fw-semibold">
                        Best Way to Learn Spanish
                    </span>
                    <h1 class="display-4 fw-bold mb-4 lh-sm">
                        Master Spanish Through
                        <span class="text-primary d-inline-block">Engaging Stories</span>
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
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="position-relative mt-5 mt-lg-0">
                        <!-- Background Shapes -->
                        <div class="position-absolute top-50 start-50 translate-middle w-100 h-100">
                            <div class="position-absolute top-0 end-0 bg-primary opacity-10 rounded-circle" 
                                 style="width: 300px; height: 300px; filter: blur(40px); transform: translate(20%, -20%);"></div>
                            <div class="position-absolute bottom-0 start-0 bg-info opacity-10 rounded-circle" 
                                 style="width: 200px; height: 200px; filter: blur(40px); transform: translate(-20%, 20%);"></div>
                        </div>
                        
                        <!-- Main Image -->
                        <div class="position-relative" data-aos="fade-up">
                            <img src="<?php echo esc_url(get_theme_file_uri('assets/hero-image.jpg')); ?>" 
                                 alt="Learn Spanish through stories" 
                                 class="img-fluid rounded-4 shadow-lg"
                                 style="max-height: 500px; object-fit: cover; width: 100%;"
                            >
                        </div>
                        
                        <!-- Modern Floating Cards -->
                        <div class="modern-floating-card card-1" 
                             data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-wrapper">
                                    <i class="fas fa-book text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-semibold">Interactive Stories</h6>
                                    <small class="text-secondary">Learn naturally</small>
                                </div>
                            </div>
                        </div>
                        <div class="modern-floating-card card-2" 
                             data-aos="fade-left" data-aos-delay="400">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-wrapper">
                                    <i class="fas fa-graduation-cap text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-semibold">Certified Teachers</h6>
                                    <small class="text-secondary">Native speakers</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Add Hero Section Styles -->
    <style>
        :root {
            --navbar-height: 56px;
        }

        .hero-section {
            background-color: #f8f9fa;
            overflow: hidden;
            min-height: 100vh;
            padding: 0;
            margin: 0;
            margin-top: calc(var(--navbar-height) * -1);
            padding-top: var(--navbar-height);
            display: flex;
            align-items: center;
        }
        
        .hero-bg {
            background-size: cover;
            background-position: center;
            opacity: 0.8;
            top: 0;
        }

        body.admin-bar .hero-section {
            min-height: 100vh;
            margin-top: calc((var(--navbar-height) + var(--wp-admin--admin-bar--height, 0px)) * -1);
            padding-top: calc(var(--navbar-height) + var(--wp-admin--admin-bar--height, 0px));
        }

        .landing-page-container > section:not(.hero-section) {
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        /* Modern Floating Cards */
        .modern-floating-card {
            position: absolute;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 1rem 1.5rem;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            z-index: 2;
        }

        .modern-floating-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .modern-floating-card.card-1 {
            top: 10%;
            right: -30px;
        }

        .modern-floating-card.card-2 {
            bottom: 10%;
            left: -30px;
        }

        .modern-floating-card .icon-wrapper {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(13, 110, 253, 0.1);
            border-radius: 12px;
            font-size: 1.25rem;
        }
        
        @media (max-width: 991.98px) {
            .hero-section {
                text-align: center;
            }
            
            .hero-section .d-flex {
                justify-content: center;
            }
            
            .modern-floating-card {
                position: static;
                margin: 1rem auto;
                max-width: 280px;
                transform: none !important;
            }

            .modern-floating-card.card-1,
            .modern-floating-card.card-2 {
                top: auto;
                right: auto;
                bottom: auto;
                left: auto;
            }
        }

        .navbar {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9) !important;
            transition: all 0.3s ease;
            height: var(--navbar-height);
            min-height: auto;
            padding: 0;
        }

        .navbar-brand,
        .nav-link,
        .navbar .btn {
            line-height: var(--navbar-height);
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        .navbar.scrolled {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .landing-page-container {
            padding: 0;
            margin: 0;
        }
    </style>

    <!-- Stats Section -->
    <section class="bg-white position-relative">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 bg-light shadow-sm hover-shadow-lg transition-all h-100">
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
                    <div class="card border-0 bg-light shadow-sm hover-shadow-lg transition-all h-100">
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
                    <div class="card border-0 bg-light shadow-sm hover-shadow-lg transition-all h-100">
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
        <!-- Subtle Background Pattern -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image: radial-gradient(circle at 50% 50%, rgba(248, 249, 250, 0.1) 0%, rgba(248, 249, 250, 0.05) 25%, transparent 50%);"></div>
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
    <section class="py-5 position-relative bg-light" id="method">
        <!-- Background Gradient -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(248, 249, 250, 0.9) 0%, rgba(232, 240, 254, 0.9) 100%);"></div>
        
        <div class="container py-5 position-relative">
            <!-- Section Header -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3" data-aos="fade-up">
                        Our Unique Approach
                    </span>
                    <h2 class="display-5 fw-bold mb-4" data-aos="fade-up">
                        Why Choose <span class="text-primary">Spanish Talking</span>?
                    </h2>
                    <p class="lead text-muted mb-0" data-aos="fade-up" data-aos-delay="100">
                        Discover how our innovative methods make learning Spanish natural and enjoyable
                    </p>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="row g-4 justify-content-center">
                <!-- Feature 1: Interactive Learning -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="card-body p-4">
                            <div class="d-inline-block p-3 bg-primary bg-opacity-10 rounded-3 mb-4">
                                <i class="fas fa-book-reader fa-2x text-primary"></i>
                            </div>
                            <h3 class="h4 fw-bold mb-3">Interactive Stories</h3>
                            <p class="text-muted mb-4">Learn through engaging stories crafted by native speakers, making language acquisition natural and enjoyable.</p>
                            <div class="border-top pt-4">
                                <div class="d-flex align-items-center text-primary">
                                    <small class="fw-semibold me-2">Included Features:</small>
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-primary bg-opacity-10 text-primary me-2 mb-2">Audio Stories</span>
                                    <span class="badge bg-primary bg-opacity-10 text-primary me-2 mb-2">Interactive Exercises</span>
                                    <span class="badge bg-primary bg-opacity-10 text-primary mb-2">Cultural Notes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature 2: Personalized Learning -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="card-body p-4">
                            <div class="d-inline-block p-3 bg-primary bg-opacity-10 rounded-3 mb-4">
                                <i class="fas fa-user-graduate fa-2x text-primary"></i>
                            </div>
                            <h3 class="h4 fw-bold mb-3">Personalized Learning</h3>
                            <p class="text-muted mb-4">Adaptive learning system that adjusts to your pace and style, ensuring optimal progress at every step.</p>
                            <div class="border-top pt-4">
                                <div class="d-flex align-items-center text-primary">
                                    <small class="fw-semibold me-2">Smart Features:</small>
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-primary bg-opacity-10 text-primary me-2 mb-2">Progress Tracking</span>
                                    <span class="badge bg-primary bg-opacity-10 text-primary me-2 mb-2">Custom Path</span>
                                    <span class="badge bg-primary bg-opacity-10 text-primary mb-2">Level Assessment</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature 3: Expert Support -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="card-body p-4">
                            <div class="d-inline-block p-3 bg-primary bg-opacity-10 rounded-3 mb-4">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                            <h3 class="h4 fw-bold mb-3">Expert Support</h3>
                            <p class="text-muted mb-4">Get guidance from certified native Spanish teachers and practice with fellow learners in our community.</p>
                            <div class="border-top pt-4">
                                <div class="d-flex align-items-center text-primary">
                                    <small class="fw-semibold me-2">Support Options:</small>
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-primary bg-opacity-10 text-primary me-2 mb-2">Live Sessions</span>
                                    <span class="badge bg-primary bg-opacity-10 text-primary me-2 mb-2">Community</span>
                                    <span class="badge bg-primary bg-opacity-10 text-primary mb-2">24/7 Help</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-5 pt-3" data-aos="fade-up" data-aos-delay="400">
                <a href="#courses" class="btn btn-primary btn-lg rounded-pill px-5">
                    Start Learning Now
                </a>
            </div>
        </div>
    </section>

    <style>
    /* Card hover effects */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.075)!important;
    }

    /* Badge styles */
    .badge {
        font-weight: 500;
        padding: 0.5em 1em;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card {
            margin-bottom: 1rem;
        }
    }
    </style>

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
                <h2 class="display-4 fw-bold mb-4">Artikel Terbaru</h2>
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
                    'posts_per_page' => 6, // Menampilkan 6 artikel
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $latest_posts = new WP_Query($args);
                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <article class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="card-img-wrapper overflow-hidden">
                                <?php the_post_thumbnail('medium_large', array(
                                    'class' => 'card-img-top transition-all',
                                    'style' => 'height: 240px; object-fit: cover;'
                                )); ?>
                            </div>
                            <?php endif; ?>
                            <div class="card-body p-4">
                                <!-- Kategori -->
                                <div class="mb-2">
                                    <?php
                                    $categories = get_the_category();
                                    if ($categories) {
                                        foreach($categories as $category) {
                                            echo '<span class="badge bg-primary bg-opacity-10 text-primary me-2">' . 
                                                  esc_html($category->name) . 
                                                  '</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- Judul -->
                                <h3 class="h5 card-title mb-3">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark stretched-link">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <!-- Excerpt -->
                                <p class="card-text text-muted mb-3">
                                    <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                </p>
                                <!-- Meta -->
                                <div class="d-flex align-items-center text-muted small">
                                    <div class="d-flex align-items-center me-3">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        <?php echo get_the_date('j F Y'); ?>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-user me-1"></i>
                                        <?php echo get_the_author(); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    // Jika tidak ada artikel
                    echo '<div class="col-12 text-center">';
                    echo '<div class="alert alert-info">';
                    echo 'Belum ada artikel yang dipublikasikan.';
                    echo '</div>';
                    echo '</div>';
                endif;
                ?>
            </div>
            
            <?php if ($latest_posts->have_posts()) : ?>
            <div class="text-center mt-5">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" 
                   class="btn btn-primary btn-lg rounded-pill px-5">
                    Lihat Semua Artikel
                </a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Tambahkan CSS untuk Blog Section -->
    <style>
    .card .card-img-wrapper {
        overflow: hidden;
    }
    
    .card .card-img-top {
        transition: transform 0.5s ease;
    }
    
    .card:hover .card-img-top {
        transform: scale(1.05);
    }
    
    .badge {
        font-weight: 500;
        padding: 0.5em 1em;
    }
    
    .stretched-link::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
        content: "";
    }
    
    @media (max-width: 768px) {
        .card .card-img-top {
            height: 200px !important;
        }
    }
    </style>

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
