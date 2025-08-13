<?php
/**
 * Template Name: Landing Page
 * Description: A clean HTML landing page template for Spanish Learning Platform
 */

// Enqueue assets
function enqueue_landing_page_assets() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    
    // Bootstrap JS
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    
    // AOS animation
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);
    
    // Theme styles
    wp_enqueue_style('spanish-theme', get_template_directory_uri() . '/assets/css/spanish-theme.css');
    wp_enqueue_style('landing-page', get_template_directory_uri() . '/assets/css/landing-page.css');
    
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
add_action('wp_enqueue_scripts', 'enqueue_landing_page_assets');

get_header();
?>

<?php get_template_part('template-parts/header/navbar'); ?>

<main>
    <!-- Hero Section -->
    <section class="hero-section position-relative overflow-hidden bg-light py-6" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-up">
                    <h1 class="display-3 fw-bold mb-4 text-dark">Ready to Speak <span style="color: #FF0000;">Spanish</span></h1>
                    <p class="lead mb-4 text-secondary">Join thousands of learners following our simple, friendly, and practical Spanish lessons — no pressure, just progress.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#get-started" class="btn btn-danger btn-lg rounded-pill" style="background-color: #FF0000;">
                            <i class="fas fa-play-circle me-2"></i>Start Learning Now
                        </a>
                        <a href="https://youtube.com" target="_blank" class="btn btn-outline-danger btn-lg rounded-pill" style="border-color: #FF0000; color: #FF0000;">
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
            <div class="position-absolute top-0 end-0 rounded-circle" 
                 style="width: 300px; height: 300px; filter: blur(40px); transform: translate(20%, -20%); background-color: rgba(255, 0, 0, 0.1);"></div>
            <div class="position-absolute bottom-0 start-0 rounded-circle" 
                 style="width: 200px; height: 200px; filter: blur(40px); transform: translate(-20%, 20%); background-color: rgba(255, 196, 0, 0.1);"></div>
        </div>                        
                        
                        <!-- Modern Floating Cards with Spanish Flag Colors -->
                        <div class="position-absolute w-100 h-100" style="pointer-events: none;">
                            <!-- Interactive Stories Card - Left -->
                            <div class="modern-floating-card card-1 shadow-lg border-0 rounded-4 bg-white px-4 py-3 position-absolute"
                                 data-aos="fade-right" data-aos-delay="200"
                                 style="min-width: 260px; max-width: 320px; pointer-events: auto; box-shadow: 0 8px 32px rgba(220,53,69,0.08); left: 5%; top: -5%; z-index: 3;">
                                <div class="spanish-flag-accent"></div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10" style="width:48px;height:48px;">
                                        <i class="fas fa-book text-danger fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-semibold">Interactive Stories</h6>
                                        <small class="text-secondary">Learn naturally</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Certified Teachers Card - Right -->
                            <div class="modern-floating-card card-2 shadow-lg border-0 rounded-4 bg-white px-4 py-3 position-absolute"
                                 data-aos="fade-left" data-aos-delay="400"
                                 style="min-width: 260px; max-width: 320px; pointer-events: auto; box-shadow: 0 8px 32px rgba(255,196,0,0.10); right: -15%; top: 80%; z-index: 2;">
                                <div class="spanish-flag-accent"></div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10" style="width:48px;height:48px;">
                                        <i class="fas fa-graduation-cap text-warning fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-semibold">Certified Teachers</h6>
                                        <small class="text-secondary">Native speakers</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                        .modern-floating-card {
                            transition: transform 0.35s cubic-bezier(.4,2,.6,1), box-shadow 0.3s;
                            will-change: transform;
                            overflow: hidden;
                        }
                        .modern-floating-card:hover {
                            transform: translateY(-8px) scale(1.03);
                            box-shadow: 0 16px 48px rgba(220,53,69,0.12), 0 2px 8px rgba(0,0,0,0.04);
                            z-index: 3;
                        }
                        .spanish-flag-accent {
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            height: 3px;
                            background: linear-gradient(to right, 
                                #AA151B 0%, #AA151B 45%, 
                                #F1BF00 45%, #F1BF00 55%, 
                                #AA151B 55%, #AA151B 100%);
                        }
                        .card-1 {
                            animation: floatAnimation1 6s ease-in-out infinite;
                        }
                        .card-2 {
                            animation: floatAnimation2 8s ease-in-out infinite;
                        }
                        @keyframes floatAnimation1 {
                            0%, 100% { transform: translateY(0); }
                            50% { transform: translateY(-30px); }
                        }
                        @keyframes floatAnimation2 {
                            0%, 100% { transform: translateY(0); }
                            50% { transform: translateY(30px); }
                        }
                        @media (max-width: 991.98px) {
                            .modern-floating-card {
                                position: static !important;
                                width: 100% !important;
                                max-width: 100% !important;
                                margin-top: 1rem;
                                margin-bottom: 1rem;
                                animation: none !important;
                            }
                        }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Add Hero Section Styles -->
    

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-6 bg-light position-relative">
        <div class="container">
            <div class="text-center mb-5">
                <div class="badge px-3 py-2 rounded-pill mb-3" data-aos="fade-up" 
                     style="background-color: rgba(255, 196, 0, 0.1); color: #FFC400;">
                    Testimonials
                </div>
                <h2 class="display-4 fw-bold mb-4" data-aos="fade-up">What Our <span style="color: #FF0000;">Viewers</span> Say</h2>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Testimonial 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card testimonial-card border-0 bg-white shadow-sm hover-float rounded-4 p-4 h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://randomuser.me/api/portraits/men/1.jpg" class="rounded-circle" width="60" height="60" alt="Liam">
                                <div class="ms-3">
                                    <h5 class="mb-1 fw-bold">Liam</h5>
                                    <p class="mb-0 text-secondary">from UK</p>
                                </div>
                            </div>
                            <p class="mb-0 lead">"SpanishTalking helped me speak basic Spanish in just a few weeks!"</p>
                            <div class="mt-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card testimonial-card border-0 bg-white shadow-sm hover-float rounded-4 p-4 h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://randomuser.me/api/portraits/women/1.jpg" class="rounded-circle" width="60" height="60" alt="Ana">
                                <div class="ms-3">
                                    <h5 class="mb-1 fw-bold">Ana</h5>
                                    <p class="mb-0 text-secondary">from Brazil</p>
                                </div>
                            </div>
                            <p class="mb-0 lead">"I love how casual and real the videos are. Not boring like school."</p>
                            <div class="mt-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card testimonial-card border-0 bg-white shadow-sm hover-float rounded-4 p-4 h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://randomuser.me/api/portraits/men/2.jpg" class="rounded-circle" width="60" height="60" alt="James">
                                <div class="ms-3">
                                    <h5 class="mb-1 fw-bold">James</h5>
                                    <p class="mb-0 text-secondary">from Australia</p>
                                </div>
                            </div>
                            <p class="mb-0 lead">"The blog posts are simple and straight to the point. Perfect for beginners."</p>
                            <div class="mt-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Elements -->
        <div class="position-absolute top-0 end-0">
            <div class="rounded-circle" style="width: 300px; height: 300px; background: linear-gradient(45deg, rgba(255,0,0,0.1), rgba(255,196,0,0.1)); filter: blur(60px);"></div>
        </div>
        <div class="position-absolute bottom-0 start-0">
            <div class="rounded-circle" style="width: 250px; height: 250px; background: linear-gradient(45deg, rgba(255,196,0,0.1), rgba(255,0,0,0.1)); filter: blur(60px);"></div>
        </div>

        <!-- Decorative Elements -->
        <div class="position-absolute" style="top: 15%; left: 10%;">
            <i class="fas fa-quote-right text-primary opacity-10" style="font-size: 80px;"></i>
        </div>
        <div class="position-absolute" style="bottom: 15%; right: 10%;">
            <i class="fas fa-comment-dots text-warning opacity-10" style="font-size: 70px;"></i>
        </div>

        
    </section>
    

    <!-- What is SpanishTalking.com Section -->
    <section class="position-relative py-6" id="about">
        <!-- Background Design Elements -->
        <div class="position-absolute top-0 start-0 w-100 h-100" 
             style="background: linear-gradient(135deg, rgba(255,0,0,0.05) 0%, rgba(255,196,0,0.05) 100%);"></div>
        <div class="position-absolute top-0 end-0 translate-middle-y">
            <div class="rounded-circle" 
                 style="width: 400px; height: 400px; background: linear-gradient(45deg, rgba(255,0,0,0.1), rgba(255,196,0,0.1)); filter: blur(80px);"></div>
        </div>
        <div class="position-absolute bottom-0 start-0">
            <div class="rounded-circle" 
                 style="width: 300px; height: 300px; background: linear-gradient(45deg, rgba(255,196,0,0.1), rgba(255,0,0,0.1)); filter: blur(60px);"></div>
        </div>
        
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="badge px-3 py-2 rounded-pill mb-3" data-aos="fade-up" 
                         style="background-color: rgba(255, 0, 0, 0.1); color: #FF0000;">
                        About Us
                    </div>
                    <h2 class="display-4 fw-bold mb-5" data-aos="fade-up">
                        So... What is <span style="color: #FF0000;">SpanishTalking.com</span>?
                    </h2>
                    
                    <!-- Feature Cards -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 hover-float">
                                <div class="card-body">
                                    <div class="icon-wrapper mb-4">
                                        <i class="fas fa-graduation-cap fa-2x" style="color: #FF0000;"></i>
                                    </div>
                                    <h4 class="fw-bold mb-3">Natural Learning</h4>
                                    <p class="text-secondary mb-0">We use everyday Spanish stories and situations to help you learn naturally and effectively.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 hover-float">
                                <div class="card-body">
                                    <div class="icon-wrapper mb-4">
                                        <i class="fas fa-video fa-2x" style="color: #FFC400;"></i>
                                    </div>
                                    <h4 class="fw-bold mb-3">Rich Content</h4>
                                    <p class="text-secondary mb-0">Access our growing library of video lessons, blog posts, and interactive exercises.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <p class="lead text-dark mb-4" data-aos="fade-up">
                        Whether you're a total beginner or someone brushing up, we've got you covered with simple explanations, 
                        vocabulary lists, grammar tips, and helpful videos.
                    </p>
                    <p class="lead fw-bold mb-5" data-aos="fade-up" style="color: #FF0000;">
                        👉 We don't overcomplicate things. We focus on helping you speak and understand Spanish, naturally.
                    </p>
                    
                    <div class="d-flex justify-content-center gap-3" data-aos="fade-up">
                        <a href="#blog" class="btn btn-lg rounded-pill px-4 hover-float" 
                           style="background-color: #FF0000; color: white;">
                            <i class="fas fa-book-open me-2"></i>Explore the Blog
                        </a>
                        <a href="https://youtube.com" target="_blank" 
                           class="btn btn-lg rounded-pill px-4 hover-float"
                           style="background-color: #FFC400; color: white;">
                            <i class="fab fa-youtube me-2"></i>Subscribe on YouTube
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Add decorative elements -->
        <div class="position-absolute" style="bottom: 50px; left: 5%;">
            <i class="fas fa-comment text-primary opacity-10" style="font-size: 70px;"></i>
        </div>
        <div class="position-absolute" style="top: 80px; right: 10%;">
            <i class="fas fa-graduation-cap text-warning opacity-10" style="font-size: 70px;"></i>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="position-relative overflow-hidden" id="blog">
        <!-- Section Separator -->
        <div class="section-separator-top d-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,144C384,128,480,64,576,48C672,32,768,64,864,80C960,96,1056,96,1152,80C1248,64,1344,32,1392,16L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        
        <div class="section-separator-bottom d-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#ffffff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,208C384,192,480,128,576,112C672,96,768,128,864,144C960,160,1056,160,1152,144C1248,128,1344,96,1392,80L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            </svg>
        </div>

        <div class="container position-relative pt-4">
            <div class="text-center mb-5">
                <div class="badge px-3 py-2 rounded-pill mb-3" data-aos="fade-up" style="background-color: rgba(255, 196, 0, 0.1); color: #FFC400;">
                    Featured Content
                </div>
                <h2 class="display-4 fw-bold mb-4" data-aos="fade-up">
                    Popular <span style="color: #FF0000;">Spanish Lessons</span>
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
                <a href="<?php echo esc_url($lessons_url); ?>" class="btn btn-danger btn-lg rounded-pill px-5 hover-shadow-primary">
                    <i class="fas fa-book-open me-2"></i>Explore All Lessons
                </a>
            </div>
            <?php endif; ?>
            
        </div>
    </section>

    

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white" id="videoModalLabel"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe id="youtubeVideo" 
                                src="" 
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen 
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: #000;">
                        </iframe>
                    </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <p class="text-white mb-0" id="videoDescription"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- YouTube Channel Section -->
    <section id="youtube" class="py-6 position-relative overflow-hidden">
        <!-- Background Elements -->
        <div class="position-absolute top-0 end-0">
            <div class="rounded-circle" style="width: 400px; height: 400px; background: linear-gradient(45deg, rgba(255,0,0,0.1), rgba(255,196,0,0.1)); filter: blur(80px);"></div>
        </div>
        <div class="position-absolute bottom-0 start-0">
            <div class="rounded-circle" style="width: 300px; height: 300px; background: linear-gradient(45deg, rgba(255,196,0,0.1), rgba(255,0,0,0.1)); filter: blur(60px);"></div>
        </div>

        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <div class="badge px-3 py-2 rounded-pill mb-3" data-aos="fade-up" 
                     style="background-color: rgba(255, 0, 0, 0.1); color: #FF0000;">
                    YouTube Channel
                </div>
                <h2 class="display-4 fw-bold mb-4" data-aos="fade-up">Watch & Learn on <span style="color: #FF0000;">YouTube</span></h2>
                <p class="lead text-secondary col-lg-8 mx-auto" data-aos="fade-up">
                    Learn on the go with our YouTube channel — real conversations, real-life Spanish, and relaxed explanations
                </p>
            </div>

            <!-- Featured Videos Grid -->
            <div class="row g-4">
                <!-- Featured Video 1 - Large -->
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="card border-0 shadow-lg hover-float rounded-4 overflow-hidden cursor-pointer" data-video-id="J_BwA2YUIso">
                        <div class="position-relative" style="padding-bottom: 56.25%;">
                            <img src="https://i3.ytimg.com/vi/J_BwA2YUIso/hqdefault.jpg" 
                                 alt="Featured Spanish Lesson" 
                                 class="position-absolute w-100 h-100 object-fit-cover"
                                 style="top: 0; left: 0;"
                                 onerror="this.src='https://i3.ytimg.com/vi/J_BwA2YUIso/sddefault.jpg'">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center video-hover-effect bg-dark bg-opacity-50">
                                <div class="play-button bg-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                                    <i class="fas fa-play text-white fs-3"></i>
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-75">
                                <span class="badge bg-danger">Featured</span>
                                <h5 class="text-white mt-2 mb-0">Spanish Conversation For Beginners | Spanish Conversation: At The Market</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side Videos -->
                <div class="col-lg-4">
                    <div class="row g-4">
                        <!-- Video 2 -->
                        <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 shadow-sm hover-float rounded-4 overflow-hidden cursor-pointer video-card" data-video-id="znh2FjprL8E">
                                <div class="position-relative">
                                    <img src="https://img.youtube.com/vi/znh2FjprL8E/maxresdefault.jpg" 
                                         alt="Spanish Numbers" 
                                         class="img-fluid w-100"
                                         onerror="this.src='https://img.youtube.com/vi/znh2FjprL8E/hqdefault.jpg'">
                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center video-hover-effect bg-dark bg-opacity-50">
                                        <div class="play-button bg-danger rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-play text-white"></i>
                                        </div>
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-75">
                                        <h6 class="text-white mb-0">Spanish Lessons for Beginners: Master Days & Daily Routine with this Conversation</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Video 3 -->
                        <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                            <div class="card border-0 shadow-sm hover-float rounded-4 overflow-hidden cursor-pointer video-card" data-video-id="5SzS35aFCuI">
                                <div class="position-relative">
                                    <div class="ratio ratio-16x9">
                                        <img src="https://img.youtube.com/vi/5SzS35aFCuI/maxresdefault.jpg" 
                                             alt="Common Phrases" 
                                             class="img-fluid w-100"
                                             onerror="this.src='https://img.youtube.com/vi/5SzS35aFCuI/hqdefault.jpg'">
                                    </div>
                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center video-hover-effect bg-dark bg-opacity-50">
                                        <div class="play-button bg-danger rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-play text-white"></i>
                                        </div>
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-75">
                                        <h6 class="text-white mb-0">Learn Spanish for Beginners | Easy Spanish Conversation in the Elevator</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- YouTube Channel Link -->
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="https://youtube.com" target="_blank" 
                   class="btn btn-danger btn-lg rounded-pill px-5 hover-float-lg">
                    <i class="fab fa-youtube me-2"></i>Subscribe to Our YouTube Channel
                </a>
                <p class="text-secondary mt-3">
                    Join <strong>50,000+</strong> subscribers learning Spanish with us!
                </p>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="position-absolute" style="bottom: 50px; left: 5%;">
            <i class="fas fa-video text-danger opacity-10" style="font-size: 60px;"></i>
        </div>
        <div class="position-absolute" style="top: 80px; right: 10%;">
            <i class="fas fa-closed-captioning text-warning opacity-10" style="font-size: 70px;"></i>
        </div>
    </section>

    <style>
    /* Video Modal Styles */
    #videoModal .modal-content {
        background-color: #000;
        border: none;
    }
    
    #videoModal .modal-body {
        padding: 0;
        background-color: #000;
        position: relative;
        overflow: hidden;
    }
    
    #videoModal .ratio {
        background: #000;
    }
    
    #videoModal iframe {
        position: relative;
        z-index: 2;
        background: #000;
        width: 100%;
        height: 100%;
        border: none;
    }
    
    /* Contact Form Styles */
    .contact-form .form-control,
    .contact-form .form-select {
        border: 2px solid #dee2e6;
        padding: 1rem;
        height: calc(3.5rem + 2px);
        transition: all 0.3s ease;
    }
    
    .contact-form .form-control:focus,
    .contact-form .form-select:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25rem rgba(220,53,69,.25);
    }
    
    .contact-form textarea.form-control {
        height: 150px;
        resize: none;
    }
    
    .hover-float {
        transition: all 0.3s ease;
    }
    
    .hover-float:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    }
    
    .contact-form .btn {
        transition: all 0.3s ease;
    }
    
    .contact-form .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(220,53,69,.15);
    }

    /* Newsletter Styles */
    .newsletter-box {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .newsletter-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    }
    
    .subscribe-form .form-control {
        border-color: #dee2e6;
        padding: 1rem;
        height: 3.5rem;
        transition: all 0.3s ease;
    }
    
    .subscribe-form .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25rem rgba(220,53,69,.25);
    }
    
    .subscribe-form .btn {
        transition: all 0.3s ease;
    }
    
    .subscribe-form .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(220,53,69,.15);
    }

    /* YouTube Section Specific Styles */
    .video-hover-effect {
        opacity: 0;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .card:hover .video-hover-effect {
        opacity: 1;
    }
    .play-button {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }
    .card:hover .play-button {
        transform: scale(1.1);
    }
    .hover-float-lg {
        transition: all 0.3s ease;
    }
    .hover-float-lg:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175);
    }
    .cursor-pointer {
        cursor: pointer;
    }
    #videoModal .modal-content {
        border: none;
        border-radius: 1rem;
        overflow: hidden;
    }
    #videoModal .modal-header,
    #videoModal .modal-footer {
        background-color: rgba(0, 0, 0, 0.8);
    }
    #videoModal .btn-close {
        z-index: 1;
    }
    #videoModal .modal-body {
        padding: 0;
    }
    #videoModal .modal-title {
        font-size: 1.25rem;
        font-weight: 600;
    }
    #videoModal #thumbnailContainer {
        transition: opacity 0.3s ease;
    }
    #videoModal .play-button {
        width: 80px;
        height: 80px;
        transition: all 0.3s ease;
    }
    #videoModal .play-button:hover {
        transform: scale(1.1);
        box-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
    }
    #videoModal #videoDescription {
        font-size: 0.9rem;
        opacity: 0.8;
    }
    </style>
            

    <!-- Newsletter Section -->
    <section id="newsletter" class="py-6 position-relative" style="background: linear-gradient(135deg, rgba(255,0,0,0.05) 0%, rgba(255,196,0,0.05) 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="newsletter-box bg-white p-5 rounded-4 shadow-lg text-center position-relative overflow-hidden" data-aos="fade-up">
                        <!-- Decorative elements -->
                        <div class="position-absolute top-0 end-0">
                            <i class="fas fa-envelope-open-text text-danger opacity-10" style="font-size: 80px; transform: rotate(15deg); margin-top: -20px; margin-right: -20px;"></i>
                        </div>
                        <div class="position-absolute bottom-0 start-0">
                            <i class="fas fa-paper-plane text-warning opacity-10" style="font-size: 70px; transform: rotate(-15deg); margin-bottom: -20px; margin-left: -20px;"></i>
                        </div>
                        
                        <!-- Newsletter content -->
                        <div class="position-relative">
                            <div class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill mb-3">
                                Newsletter
                            </div>
                            <h2 class="display-5 fw-bold mb-4">Get Weekly Spanish Tips!</h2>
                            <p class="lead text-secondary mb-4">
                                Join our community and receive free Spanish lessons, tips, and cultural insights directly in your inbox.
                            </p>
                            
                            <!-- Subscribe form -->
                            <form id="subscribeForm" class="subscribe-form" onsubmit="return handleSubscribe(event)">
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-2" id="emailSubscribe" placeholder="Enter your email" required>
                                            <label for="emailSubscribe">Enter your email address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-danger w-100 h-100 fw-bold">
                                            Subscribe Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                            <!-- Success message (hidden by default) -->
                            <div id="subscribeSuccess" class="alert alert-success mt-3 d-none">
                                <i class="fas fa-check-circle me-2"></i>
                                Thank you for subscribing! Please check your email to confirm.
                            </div>
                            
                            <p class="text-secondary small mt-3">
                                <i class="fas fa-shield-alt me-1"></i>
                                We respect your privacy. Unsubscribe at any time.
                            </p>
                        </div>
                    </div>
                        Join our email list and get short, useful Spanish lessons directly in your inbox.
                    </p>
                </div>
            </div>
        </div>

        <!-- Background Elements -->
        <div class="position-absolute top-0 end-0">
            <div class="rounded-circle" style="width: 300px; height: 300px; background: linear-gradient(45deg, rgba(255,0,0,0.1), rgba(255,196,0,0.1)); filter: blur(60px);"></div>
        </div>
        <div class="position-absolute bottom-0 start-0">
            <div class="rounded-circle" style="width: 250px; height: 250px; background: linear-gradient(45deg, rgba(255,196,0,0.1), rgba(255,0,0,0.1)); filter: blur(60px);"></div>
        </div>

        <!-- Background SVG Wave -->
        <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="transform: translateY(1px);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" style="width: 100%; height: 60px;">
                <path fill="#ffffff" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,208C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Contact Section -->
<section id="contact" class="py-6 bg-light"> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <div class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill mb-3" data-aos="fade-up">
                        Contact Us
                    </div>
                    <h2 class="display-5 fw-bold mb-4" data-aos="fade-up">Get in Touch</h2>
                    <p class="lead text-secondary" data-aos="fade-up">
                        Have questions about our Spanish lessons? We're here to help!
                    </p>
                </div>

                <div class="card border-0 shadow-lg rounded-4 p-4" data-aos="fade-up">
                    <!-- Contact Form -->
                    <form id="contactForm" class="contact-form needs-validation" novalidate onsubmit="return handleContact(event)">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                    <div class="invalid-feedback">
                                        Please enter your name
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" id="subject" name="subject" required>
                                        <option value="" selected disabled>Select a subject</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="lessons">Spanish Lessons</option>
                                        <option value="collaboration">Collaboration</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <label for="subject"></label>
                                    <div class="invalid-feedback">
                                        Please select a subject
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Your Message" style="height: 150px" required></textarea>
                                    <label for="message">Your Message</label>
                                    <div class="invalid-feedback">
                                        Please enter your message
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-danger btn-lg rounded-pill px-5">
                                    <i class="fas fa-paper-plane me-2"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Success message (hidden by default) -->
                    <div id="contactSuccess" class="alert alert-success mt-4 d-none">
                        <i class="fas fa-check-circle me-2"></i>
                        Thank you for your message! We'll get back to you soon.
                    </div>
                </div>
                
                <!-- Contact Information Cards -->
                <div class="row g-4 mt-5">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card border-0 bg-white shadow-sm rounded-4 p-4 text-center hover-float">
                            <div class="text-danger mb-3">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <h5 class="fw-bold">Email</h5>
                            <p class="text-secondary mb-0">info@spanishtalking.com</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card border-0 bg-white shadow-sm rounded-4 p-4 text-center hover-float">
                            <div class="text-danger mb-3">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <h5 class="fw-bold">Location</h5>
                            <p class="text-secondary mb-0">Malang, Indonesia</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card border-0 bg-white shadow-sm rounded-4 p-4 text-center hover-float">
                            <div class="text-danger mb-3">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                            <h5 class="fw-bold">Business Hours</h5>
                            <p class="text-secondary mb-0">Mon - Fri, 9AM - 5PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    

    <script>
    // Video Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const videoModal = document.getElementById('videoModal');
        const youtubeVideo = document.getElementById('youtubeVideo');
        
        // Handle video card clicks
        document.querySelectorAll('[data-video-id]').forEach(function(card) {
            card.addEventListener('click', function() {
                const videoId = this.dataset.videoId;
                if (videoModal && youtubeVideo) {
                    // Set autoplay=1 to start playing immediately
                    youtubeVideo.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&showinfo=0`;
                    const modal = new bootstrap.Modal(videoModal);
                    modal.show();
                }
            });
        });

        // Reset video when modal is closed
        if (videoModal) {
            videoModal.addEventListener('hidden.bs.modal', function () {
                if (youtubeVideo) {
                    youtubeVideo.src = '';
                }
            });
        }
    });

    // Contact Form Handler
    function handleContact(event) {
        event.preventDefault();
        
        // Get form data
        const form = document.getElementById('contactForm');
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;
        
        // Check form validity
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            return false;
        }
        
        // Basic validation
        if (!name || !email || !subject || !message) {
            form.classList.add('was-validated');
            return false;
        }
        
        // Here you would typically send this to your server
        // For now, we'll just show the success message
        form.classList.remove('was-validated');
        form.reset();
        const successMsg = document.getElementById('contactSuccess');
        successMsg.classList.remove('d-none');
        
        // Hide success message after 5 seconds
        setTimeout(() => {
            successMsg.classList.add('d-none');
        }, 5000);
        
        return false;
    }

    // Newsletter Subscribe Function
    function handleSubscribe(event) {
        event.preventDefault();
        const email = document.getElementById('emailSubscribe').value;
        
        // Here you would typically send this to your server
        // For now, we'll just show the success message
        document.getElementById('subscribeForm').reset();
        const successMsg = document.getElementById('subscribeSuccess');
        successMsg.classList.remove('d-none');
        
        // Hide success message after 5 seconds
        setTimeout(() => {
            successMsg.classList.add('d-none');
        }, 5000);
        
        return false;
    }

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

        // Video Modal Functionality
        const videoModal = document.getElementById('videoModal');
        const youtubeVideo = document.getElementById('youtubeVideo');
        
        // Video information
        const videos = {
            'video1': {
                id: '_FH3K4QGJP0',
                title: 'Spanish Greetings You Should Actually Use',
                description: 'Learn authentic Spanish greetings used by native speakers in real conversations',
                level: 'Beginner',
                duration: '10:25'
            },
            'video2': {
                id: 'lf7hHxYs_KU',
                title: '5 Common Phrases in Real Conversations',
                description: 'Essential expressions for natural Spanish conversations',
                level: 'Intermediate',
                duration: '8:15'
            },
            'video3': {
                id: 'vJG698U2Mvo',
                title: 'Beginner Spanish Listening Practice',
                description: 'Improve your Spanish listening skills with these exercises',
                level: 'Practice',
                duration: '15:30'
            }
        };

        function playVideo() {
            const thumbnailContainer = document.getElementById('thumbnailContainer');
            const youtubeVideo = document.getElementById('youtubeVideo');
            thumbnailContainer.style.display = 'none';
            youtubeVideo.classList.remove('d-none');
        }

        // Handle video card clicks
        document.querySelectorAll('.video-hover-effect').forEach(function(card) {
            card.addEventListener('click', function(e) {
                const videoId = this.closest('.card').dataset.videoId;
                const video = videos[videoId];
                
                // Set modal content
                document.getElementById('videoModalLabel').textContent = video.title;
                document.getElementById('videoDescription').textContent = video.description;
                document.getElementById('videoThumbnail').src = `https://img.youtube.com/vi/${video.id}/maxresdefault.jpg`;
                document.getElementById('youtubeVideo').src = `https://www.youtube.com/embed/${video.id}?autoplay=0`;
                
                // Reset video state
                const thumbnailContainer = document.getElementById('thumbnailContainer');
                const youtubeVideo = document.getElementById('youtubeVideo');
                thumbnailContainer.style.display = 'block';
                youtubeVideo.classList.add('d-none');
                
                const videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
                videoModal.show();
            });
        });

        // Reset iframe src when modal is closed
        videoModal.addEventListener('hidden.bs.modal', function () {
            document.getElementById('youtubeVideo').src = '';
            const thumbnailContainer = document.getElementById('thumbnailContainer');
            const youtubeVideo = document.getElementById('youtubeVideo');
            thumbnailContainer.style.display = 'block';
            youtubeVideo.classList.add('d-none');
        });
    });
    </script>

    

</style>
</main>

<!-- Footer -->
<?php
get_template_part('template-parts/footer/footer');
?>