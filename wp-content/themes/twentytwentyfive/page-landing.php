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
    <?php get_template_part('template-parts/header/navbar'); ?>

    <!-- Hero Section -->
    <section class="hero-section position-relative overflow-hidden d-flex align-items-center">
        <div class="hero-bg position-absolute w-100 h-100" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);"></div>
        <div class="container position-relative">
            <div class="row align-items-center py-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill fw-semibold">
                        Simple & Natural Spanish Learning
                    </span>
                    <h1 class="display-4 fw-bold mb-4 lh-sm">
                        Ready to Speak Spanish
                        <span class="text-primary d-inline-block">with Confidence?</span>
                    </h1>
                    <p class="lead text-secondary mb-4">
                        Join thousands of learners following our simple, friendly, and practical Spanish lessons — no pressure, just progress.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#get-started" class="btn btn-primary btn-lg rounded-pill">
                            <i class="fas fa-play-circle me-2"></i>Start Learning Now
                        </a>
                        <a href="https://youtube.com" target="_blank" class="btn btn-outline-primary btn-lg rounded-pill">
                            <i class="fab fa-youtube me-2"></i>Visit Our YouTube Channel
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
            --wp-admin--admin-bar--height: 32px;
        }

        .hero-section {
            background-color: #f8f9fa;
            overflow: hidden;
            min-height: 100vh;
            padding: 0;
            margin: 0;
            padding-top: calc(var(--navbar-height) + 1rem);
            padding-bottom: 2rem;
            display: flex;
            align-items: flex-start;
            position: relative;
            z-index: 1;
        }
        
        .hero-section h1,
        .hero-section .lead,
        .hero-section .badge {
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
        }
        
        .hero-section .lead {
            color: #2a2a2a;
            font-weight: 500;
        }
        
        .hero-bg {
            background-size: cover;
            background-position: center;
            opacity: 0.95;
            top: 0;
            z-index: 1;
        }
        
        .container.position-relative {
            z-index: 2;
        }

        body.admin-bar .hero-section {
            min-height: 100vh;
            padding-top: calc(var(--navbar-height) + var(--wp-admin--admin-bar--height, 0px) + 1rem);
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

        /* Navbar styles moved to navbar.php */
        
        .landing-page-container {
            padding: 0;
            margin: 0;
        }
    </style>

    <!-- User Reviews Section -->
    <section class="position-relative py-5 overflow-hidden" id="testimonials">
        <!-- Background Design Elements -->
        <div class="position-absolute top-0 start-0 w-100 h-100" 
             style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);"></div>
        <div class="position-absolute top-50 end-0 translate-middle-y">
            <div class="bg-warning opacity-10 rounded-circle" 
                 style="width: 500px; height: 500px; filter: blur(90px);"></div>
        </div>
        <div class="position-absolute bottom-0 start-0">
            <div class="bg-primary opacity-10 rounded-circle" 
                 style="width: 400px; height: 400px; filter: blur(70px);"></div>
        </div>

        <!-- Decorative Elements -->
        <div class="position-absolute" style="top: 15%; left: 10%;">
            <i class="fas fa-quote-right text-primary opacity-10" style="font-size: 80px;"></i>
        </div>
        <div class="position-absolute" style="bottom: 15%; right: 10%;">
            <i class="fas fa-comment-dots text-warning opacity-10" style="font-size: 70px;"></i>
        </div>

        <div class="container position-relative">
            <div class="text-center mb-5">
                <div class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill mb-3" data-aos="fade-up">
                    Testimonials
                </div>
                <h2 class="display-4 fw-bold mb-4" data-aos="fade-up">What Our <span class="text-primary">Viewers</span> Say</h2>
            </div>

            <div class="row g-4 justify-content-center position-relative">
                <!-- Testimonial 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card testimonial-card border-0 bg-white bg-opacity-75 shadow-sm hover-float rounded-4 p-4 h-100">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://randomuser.me/api/portraits/men/1.jpg" 
                                     class="rounded-circle border border-3 border-white shadow-sm" 
                                     width="60" height="60" alt="Liam">
                                <div class="ms-3">
                                    <h5 class="fw-bold mb-1">Liam</h5>
                                    <p class="text-primary mb-0">from UK</p>
                                </div>
                            </div>
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="lead mb-0">"SpanishTalking helped me speak basic Spanish in just a few weeks!"</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card testimonial-card border-0 bg-white bg-opacity-75 shadow-sm hover-float rounded-4 p-4 h-100">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://randomuser.me/api/portraits/women/1.jpg" 
                                     class="rounded-circle border border-3 border-white shadow-sm" 
                                     width="60" height="60" alt="Ana">
                                <div class="ms-3">
                                    <h5 class="fw-bold mb-1">Ana</h5>
                                    <p class="text-primary mb-0">from Brazil</p>
                                </div>
                            </div>
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="lead mb-0">"I love how casual and real the videos are. Not boring like school."</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card testimonial-card border-0 bg-white bg-opacity-75 shadow-sm hover-float rounded-4 p-4 h-100">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://randomuser.me/api/portraits/men/2.jpg" 
                                     class="rounded-circle border border-3 border-white shadow-sm" 
                                     width="60" height="60" alt="James">
                                <div class="ms-3">
                                    <h5 class="fw-bold mb-1">James</h5>
                                    <p class="text-primary mb-0">from Australia</p>
                                </div>
                            </div>
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="lead mb-0">"The blog posts are simple and straight to the point. Perfect for beginners."</p>
                        </div>
                    </div>
                </div>

                <!-- Background Circles -->
                <div class="position-absolute top-50 start-50 translate-middle" style="z-index: -1;">
                    <div class="rounded-circle bg-primary bg-opacity-10" 
                         style="width: 300px; height: 300px; transform: translateX(-150px);"></div>
                </div>
            </div>
        </div>
    </section>
    
    <style>
    /* Navbar Styles */
    :root {
        --navbar-height: 56px;
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

    .navbar-brand {
        font-size: 1.5rem;
        color: var(--dark);
        padding: 0;
        height: var(--navbar-height);
        display: flex;
        align-items: center;
    }

    .nav-link {
        color: var(--dark);
        font-weight: 500;
        padding: 0 1rem;
        height: var(--navbar-height);
        display: flex;
        align-items: center;
    }

    .navbar .btn {
        padding: 0.5rem 1.25rem;
        height: 38px;
        display: flex;
        align-items: center;
        font-size: 0.95rem;
    }

    .navbar.scrolled {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    /* Enhanced smooth scroll behavior */
    html {
        scroll-behavior: smooth;
        scroll-padding-top: var(--wp-admin--admin-bar--height, 0);
    }
    
    /* Improved section transitions and spacing */
    section {
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 8rem 0;
        position: relative;
        overflow: hidden;
        z-index: 1;
        background-color: #ffffff;
    }
    
    section:nth-child(even) {
        background-color: #f8f9fa;
    }
    
    section:not(:first-child) {
        margin-top: -2px;
    }
    
    /* Card hover effects with smoother animation */
    .hover-float {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .hover-float:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }
    
    /* Testimonial card specific styles */
    .testimonial-card {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    
    /* Add smooth transitions to all interactive elements */
    a, button, .card, .icon-wrapper, img {
        transition: all 0.3s ease;
    }
    
    /* Enhance AOS animations */
    [data-aos] {
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Badge and button styles */
    .badge.bg-primary {
        background-color: #0d6efd !important;
        color: #ffffff !important;
    }

    .badge.bg-primary.bg-opacity-10 {
        background-color: rgba(13, 110, 253, 0.1) !important;
        color: #0d6efd !important;
    }

    .text-primary {
        color: #0d6efd !important;
    }
    
    /* Enhanced section spacing and transitions */
    .section-gap {
        padding: 8rem 0;
        position: relative;
        transition: padding 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Dynamic section separators */
    .section-separator-top,
    .section-separator-bottom {
        position: absolute;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        z-index: 2;
    }

    .section-separator-top {
        top: -1px;
    }

    .section-separator-bottom {
        bottom: -1px;
    }

    .section-separator-top svg,
    .section-separator-bottom svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 50px;
    }

    section {
        background-color: #ffffff;
        position: relative;
    }

    section.bg-light {
        background-color: #f8f9fa;
    }
    
    @media (max-width: 768px) {
        .section-gap {
            padding: 5rem 0;
        }
        
        section {
            padding: 4rem 0;
        }
    }
    </style>

    <!-- What is SpanishTalking.com Section -->
    <section class="position-relative py-5" id="about">
        <!-- Background Design Elements -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);"></div>
        <div class="position-absolute top-0 end-0 translate-middle-y">
            <div class="bg-primary opacity-10 rounded-circle" 
                 style="width: 400px; height: 400px; filter: blur(80px);"></div>
        </div>
        <div class="position-absolute bottom-0 start-0">
            <div class="bg-info opacity-10 rounded-circle" 
                 style="width: 300px; height: 300px; filter: blur(60px);"></div>
        </div>
        
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3" data-aos="fade-up">
                        About Us
                    </div>
                    <h2 class="display-4 fw-bold mb-4" data-aos="fade-up">So... What is <span class="text-primary">SpanishTalking.com</span>?</h2>
                    
                    <!-- Feature Cards -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 bg-white bg-opacity-75 shadow-sm hover-shadow-md rounded-4 p-4 h-100">
                                <div class="card-body">
                                    <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-3 mb-3 mx-auto">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3">Natural Learning</h5>
                                    <p class="text-secondary mb-0">Your go-to space for learning Spanish in a natural and enjoyable way.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="card border-0 bg-white bg-opacity-75 shadow-sm hover-shadow-md rounded-4 p-4 h-100">
                                <div class="card-body">
                                    <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-3 mb-3 mx-auto">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3">Rich Content</h5>
                                    <p class="text-secondary mb-0">Free lessons, tips, and cultural insights through our blog and YouTube channel.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <p class="lead text-dark mb-4" data-aos="fade-up">
                        Whether you're a total beginner or someone brushing up, we've got you covered with simple explanations, 
                        vocabulary lists, grammar tips, and helpful videos.
                    </p>
                    <p class="lead fw-semibold text-primary mb-5" data-aos="fade-up">
                        👉 We don't overcomplicate things. We focus on helping you speak and understand Spanish, naturally.
                    </p>
                    
                    <div class="d-flex justify-content-center gap-3" data-aos="fade-up">
                        <a href="#blog" class="btn btn-primary btn-lg rounded-pill px-4 hover-shadow-primary">
                            <i class="fas fa-book me-2"></i>Explore the Blog
                        </a>
                        <a href="https://youtube.com" target="_blank" class="btn btn-danger btn-lg rounded-pill px-4 hover-shadow-danger">
                            <i class="fab fa-youtube me-2"></i>Subscribe on YouTube
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Add decorative elements -->
        <div class="position-absolute" style="bottom: 50px; left: 5%;">
            <i class="fas fa-comment text-primary opacity-10" style="font-size: 60px;"></i>
        </div>
        <div class="position-absolute" style="top: 80px; right: 10%;">
            <i class="fas fa-graduation-cap text-info opacity-10" style="font-size: 70px;"></i>
        </div>
    </section>
    
    <style>
    .hover-shadow-md {
        transition: all 0.3s ease;
    }
    
    .hover-shadow-md:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
    }
    
    .hover-shadow-primary:hover {
        box-shadow: 0 8px 25px rgba(13, 110, 253, 0.2) !important;
    }
    
    .hover-shadow-danger:hover {
        box-shadow: 0 8px 25px rgba(220, 53, 69, 0.2) !important;
    }
    
    .icon-wrapper {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .display-4 {
            font-size: calc(1.6rem + 2vw);
        }
        .lead {
            font-size: 1.1rem;
        }
    }
    </style>

    <!-- Blog Section -->
    <section class="position-relative py-5 overflow-hidden" id="blog">
        <!-- Section Separator -->
        <div class="section-separator-top">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,144C384,128,480,64,576,48C672,32,768,64,864,80C960,96,1056,96,1152,80C1248,64,1344,32,1392,16L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        
        <div class="section-separator-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#ffffff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,208C384,192,480,128,576,112C672,96,768,128,864,144C960,160,1056,160,1152,144C1248,128,1344,96,1392,80L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            </svg>
        </div>

        <div class="container position-relative py-5">
            <div class="text-center mb-5">
                <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3" data-aos="fade-up">
                    Featured Content
                </div>
                <h2 class="display-4 fw-bold mb-4" data-aos="fade-up">
                    Popular <span class="text-primary">Spanish Lessons</span>
                </h2>
                <p class="lead text-secondary col-lg-8 mx-auto" data-aos="fade-up">
                    Start your Spanish journey with our most helpful and engaging content
                </p>
            </div>
            
            <!-- Featured Blog Posts -->
            <div class="row g-4 mb-5">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                
                $recent_posts = new WP_Query($args);
                
                if ($recent_posts->have_posts()) :
                    $delay = 100;
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                    ?>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
                        <a href="<?php the_permalink(); ?>" class="card blog-card border-0 bg-white shadow-sm hover-float rounded-4 h-100 text-decoration-none">
                            <div class="card-body p-4">
                                <?php if(has_post_thumbnail()): ?>
                                <div class="card-img-wrapper rounded-4 mb-4 overflow-hidden">
                                    <?php the_post_thumbnail('medium_large', array('class' => 'card-img-top w-100 h-auto')); ?>
                                </div>
                                <?php endif; ?>
                                
                                <div class="d-flex align-items-center mb-4">
                                    <div class="icon-wrapper-lg rounded-3 
                                    <?php
                                    $categories = get_the_category();
                                    if(!empty($categories)) {
                                        switch($categories[0]->slug) {
                                            case 'beginner':
                                                echo 'bg-primary bg-opacity-10 text-primary';
                                                break;
                                            case 'pronunciation':
                                                echo 'bg-danger bg-opacity-10 text-danger';
                                                break;
                                            case 'practical':
                                                echo 'bg-success bg-opacity-10 text-success';
                                                break;
                                            default:
                                                echo 'bg-primary bg-opacity-10 text-primary';
                                        }
                                    } else {
                                        echo 'bg-primary bg-opacity-10 text-primary';
                                    }
                                    ?>">
                                        <i class="fas <?php 
                                            if(!empty($categories)) {
                                                switch($categories[0]->slug) {
                                                    case 'beginner':
                                                        echo 'fa-graduation-cap';
                                                        break;
                                                    case 'pronunciation':
                                                        echo 'fa-microphone';
                                                        break;
                                                    case 'practical':
                                                        echo 'fa-comments';
                                                        break;
                                                    default:
                                                        echo 'fa-book';
                                                }
                                            } else {
                                                echo 'fa-book';
                                            }
                                        ?>"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="card-title fw-bold mb-2 text-dark"><?php the_title(); ?></h4>
                                        <p class="text-secondary mb-0"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center text-secondary">
                                    <?php
                                    if(!empty($categories)) {
                                        $category = $categories[0];
                                        $badge_class = '';
                                        switch($category->slug) {
                                            case 'beginner':
                                                $badge_class = 'bg-primary bg-opacity-10 text-primary';
                                                break;
                                            case 'pronunciation':
                                                $badge_class = 'bg-danger bg-opacity-10 text-danger';
                                                break;
                                            case 'practical':
                                                $badge_class = 'bg-success bg-opacity-10 text-success';
                                                break;
                                            default:
                                                $badge_class = 'bg-primary bg-opacity-10 text-primary';
                                        }
                                        echo '<span class="badge ' . esc_attr($badge_class) . ' me-2">' . esc_html($category->name) . '</span>';
                                    }
                                    ?>
                                    <i class="fas fa-clock me-2"></i>
                                    <small><?php echo esc_html(get_the_date()); ?></small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $delay += 100;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            
            <?php if ($recent_posts->have_posts()) : ?>
            <div class="text-center" data-aos="fade-up">
                <?php
                // Dapatkan ID halaman Lessons yang sudah dibuat di WordPress admin
                $lessons_page = get_page_by_path('lessons');
                if ($lessons_page) {
                    $lessons_url = get_permalink($lessons_page->ID);
                } else {
                    // Fallback jika halaman tidak ditemukan
                    $lessons_url = home_url();
                }
                ?>
                <a href="<?php echo esc_url($lessons_url); ?>" class="btn btn-primary btn-lg rounded-pill px-5 hover-shadow-primary">
                    <i class="fas fa-book-open me-2"></i>Explore All Lessons
                </a>
            </div>
            <?php endif; ?>
            
        </div>
    </section>

    <style>
    .icon-wrapper-lg {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
    }
    
    .blog-card {
        transition: all 0.3s ease;
    }
    
    .blog-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }
    
    .blog-card:hover .icon-wrapper-lg {
        transform: scale(1.1);
    }
    
    .badge {
        font-size: 0.8rem;
        padding: 0.5em 1em;
    }
    </style>

    <!-- YouTube Channel Section -->
    <section class="position-relative py-5" id="youtube">
        <!-- Subtle Background -->
        <div class="position-absolute top-0 start-0 w-100 h-100" 
             style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);"></div>
             
        <!-- Single Accent Element -->
        <div class="position-absolute" style="top: 0; right: 0; height: 100%; width: 35%; background: linear-gradient(135deg, transparent, rgba(13, 110, 253, 0.03));"></div>

        <div class="container position-relative py-5">
            <div class="text-center mb-5">
                <div class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill mb-3" data-aos="fade-up">
                    Video Lessons
                </div>
                <h2 class="display-4 fw-bold mb-4" data-aos="fade-up">Watch & Learn on <span class="text-danger">YouTube</span></h2>
                <p class="lead text-secondary mb-5" data-aos="fade-up">
                    Learn on the go with our YouTube channel — real conversations, real-life Spanish,<br>and relaxed explanations.
                </p>
            </div>

            <div class="row g-4">
                <!-- Featured Video 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100 video-card rounded-4 overflow-hidden">
                        <div class="ratio ratio-16x9">
                            <img src="<?php echo esc_url(get_theme_file_uri('assets/video-thumbnail-1.jpg')); ?>" 
                                 alt="Spanish Greetings" class="object-fit-cover w-100">
                            <div class="video-overlay d-flex align-items-center justify-content-center">
                                <div class="play-button-wrapper">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-danger bg-opacity-10 text-danger">Beginner</span>
                                <span class="ms-2 text-secondary"><i class="fas fa-clock me-1"></i>10:25</span>
                            </div>
                            <h5 class="fw-bold mb-2">Spanish Greetings You Should Actually Use</h5>
                            <p class="text-secondary mb-0">Learn authentic Spanish greetings used by native speakers</p>
                        </div>
                    </div>
                </div>

                <!-- Featured Video 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100 video-card">
                        <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                            <img src="<?php echo esc_url(get_theme_file_uri('assets/video-thumbnail-2.jpg')); ?>" 
                                 alt="Common Phrases" class="object-fit-cover w-100">
                            <div class="video-overlay d-flex align-items-center justify-content-center">
                                <i class="fas fa-play-circle fa-3x text-white"></i>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">5 Common Phrases in Real Conversations</h5>
                            <p class="text-muted">Essential expressions for natural Spanish conversations</p>
                        </div>
                    </div>
                </div>

                <!-- Featured Video 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100 video-card">
                        <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                            <img src="<?php echo esc_url(get_theme_file_uri('assets/video-thumbnail-3.jpg')); ?>" 
                                 alt="Listening Practice" class="object-fit-cover w-100">
                            <div class="video-overlay d-flex align-items-center justify-content-center">
                                <i class="fas fa-play-circle fa-3x text-white"></i>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">Beginner Spanish Listening Practice</h5>
                            <p class="text-muted">Improve your Spanish listening skills with these exercises</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="https://youtube.com" target="_blank" class="btn btn-danger btn-lg rounded-pill px-5">
                    <i class="fab fa-youtube me-2"></i>Watch More Videos on YouTube
                </a>
            </div>
        </div>
    </section>
            

    <!-- Newsletter Section -->
    <section class="py-5 bg-primary bg-opacity-10 position-relative" id="newsletter">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="display-4 fw-bold mb-4">Want Weekly Spanish Tips?</h2>
                    <p class="lead mb-5">Join our email list and get short, useful Spanish lessons directly in your inbox.</p>
                    <form class="newsletter-form">
                        <div class="input-group input-group-lg mb-3">
                            <input type="email" class="form-control rounded-pill-start newsletter-input" placeholder="Enter your email address" style="background-color: #e9ecef; color: #212529; box-shadow: 0 4px 16px rgba(0,0,0,0.12); font-weight: 500;">
                            <button class="btn btn-primary rounded-pill-end px-4" type="submit" style="box-shadow: 0 4px 16px rgba(13,110,253,0.15);">Subscribe</button>
                        </div>
                        <style>
                        .newsletter-input::placeholder {
                            color: #343a40 !important;
                            opacity: 1;
                            font-weight: 500;
                        }
                        </style>
                        <small class="text-dark">By subscribing, you agree to receive our newsletter. No spam, ever.</small>
                    </form>
                </div>
            </div>
        </div>
        <!-- Background SVG Wave -->
        <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="transform: translateY(1px);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" style="width: 100%; height: 60px;">
                <path fill="#ffffff" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,208C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 position-relative">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); opacity: 0.8;"></div>
        <div class="container py-5 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3" data-aos="fade-up">
                        Contact Us
                    </span>
                    <h2 class="display-4 fw-bold mb-4" data-aos="fade-up">Get in Touch</h2>
                    <p class="lead text-dark mb-0" data-aos="fade-up">Have questions about our Spanish lessons? We're here to help!</p>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg rounded-4 p-4" data-aos="fade-up">
                        <div class="card-body">
                            <form id="contactForm" class="needs-validation" novalidate>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                                            <label for="name">Your Name</label>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Email Address" required>
                                            <label for="email">Email Address</label>
                                            <div class="invalid-feedback">Please enter a valid email.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="subject" required>
                                                <option value="" selected disabled>Select a subject</option>
                                                <option value="course-inquiry">Course Inquiry</option>
                                                <option value="private-tutoring">Private Tutoring</option>
                                                <option value="general-question">General Question</option>
                                                <option value="other">Other</option>
                                            </select>
                                            
                                            <div class="invalid-feedback">Please select a subject.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="message" style="height: 150px" placeholder="Your Message" required></textarea>
                                            <label for="message">Your Message</label>
                                            <div class="invalid-feedback">Please enter your message.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill w-100">
                                            Send Message <i class="fas fa-paper-plane ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Contact Information Cards -->
                    <div class="row g-4 mt-5">
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card h-100 border-0 shadow-sm text-center p-4">
                                <div class="card-body">
                                    <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <h5 class="fw-bold">Email</h5>
                                    <p class="text-dark mb-0">info@spanishtalking.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="card h-100 border-0 shadow-sm text-center p-4">
                                <div class="card-body">
                                    <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <h5 class="fw-bold">Phone</h5>
                                    <p class="text-dark mb-0">+62 812-3456-7890</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="card h-100 border-0 shadow-sm text-center p-4">
                                <div class="card-body">
                                    <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h5 class="fw-bold">Location</h5>
                                    <p class="text-dark mb-0">Jakarta, Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    /* Contact Section Styles */
    #contact {
        overflow: hidden;
    }

    #contact .card {
        transition: all 0.3s ease;
    }

    #contact .card:hover {
        transform: translateY(-5px);
    }

    .form-floating > .form-control,
    .form-floating > .form-select {
        height: calc(3.5rem + 2px);
        padding: 1rem 0.75rem;
    }

    .form-floating > textarea.form-control {
        height: 150px;
        resize: none;
    }

    .form-floating > label {
        padding: 1rem 0.75rem;
    }

    .icon-wrapper {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .btn-primary {
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(var(--primary-rgb), 0.2);
    }
    </style>

    <script>
    // Form Validation
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contactForm');
        
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
    </script>

    <style>
    /* Additional Footer Styles */
    footer .btn-outline-light {
        width: 40px;
        height: 40px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    footer .btn-outline-light:hover {
        transform: translateY(-3px);
    }

    /* Newsletter Form Styles */
    .newsletter-form .form-control {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .newsletter-form .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .rounded-pill-start {
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    .rounded-pill-end {
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
    }

    /* Video Card Styles */
    .video-card {
        transition: all 0.3s ease;
    }

    .video-card:hover {
        transform: translateY(-10px);
    }

    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.3);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .video-card:hover .video-overlay {
        opacity: 1;
    }

    .video-overlay .fa-play-circle {
        transform: scale(0.8);
        transition: all 0.3s ease;
    }

    .video-card:hover .video-overlay .fa-play-circle {
        transform: scale(1);
    }
    </style>

    <?php get_footer(); ?>
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

<?php 
get_template_part('template-parts/footer/footer');
get_footer(); 
?>
