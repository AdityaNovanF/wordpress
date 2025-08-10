<?php
/**
 * Template Name: Lessons Page
 * Template Post Type: page
 * Description: Template for displaying all lessons in blog style
 */

// Enqueue necessary assets
function enqueue_lessons_assets() {
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
add_action('wp_enqueue_scripts', 'enqueue_lessons_assets');

get_header();
?>

<div class="lessons-page-container">
    <?php get_template_part('template-parts/header/navbar'); ?>

    <!-- Hero Section -->
    <section class="page-header position-relative py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3">
                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Online Schooling & Education Blog</li>
                        </ol>
                    </nav>
                    <h1 class="display-4 fw-bold mb-4">Online Schooling & Education Blog: Tips, Trends & How-To Guides</h1>
                    
                    <!-- Search Form -->
                    <div class="search-box mb-4">
                        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                            <div class="input-group">
                                <input type="search" class="form-control rounded-start"
                                       placeholder="Search for articles..."
                                       value="<?php echo get_search_query(); ?>"
                                       name="s">
                                <button type="submit" class="btn btn-warning rounded-end px-4">
                                    SEARCH
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filters-section py-4 bg-light border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <h5 class="mb-lg-0">Filter By:</h5>
                </div>
                <div class="col-lg-9">
                    <div class="d-flex flex-wrap gap-2">
                        <?php
                        $categories = get_categories();
                        foreach($categories as $category) :
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
                        ?>
                            <a href="<?php echo get_category_link($category->term_id); ?>" 
                               class="badge <?php echo esc_attr($badge_class); ?> text-decoration-none">
                                <?php echo esc_html($category->name); ?>
                                <span class="ms-1">(<?php echo esc_html($category->count); ?>)</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lessons Grid -->
    <section class="lessons-grid py-5">
        <div class="container">
            <div class="row g-4">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1, // Menampilkan semua post
                    'orderby' => 'date',    // Urutkan berdasarkan tanggal
                    'order' => 'DESC'       // Dari yang terbaru
                );
                
                $lessons_query = new WP_Query($args);
                
                if ($lessons_query->have_posts()) :
                    while ($lessons_query->have_posts()) : $lessons_query->the_post();
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <article class="card blog-card h-100 border-0 shadow-sm">
                            <a href="<?php the_permalink(); ?>" class="card-link text-decoration-none">
                                <div class="card-img-wrapper">
                                    <?php 
                                    if (has_post_thumbnail()) {
                                        $full_image_url = get_the_post_thumbnail_url(null, 'full');
                                        echo '<img src="' . esc_url($full_image_url) . '" class="card-img-top" alt="' . esc_attr(get_the_title()) . '">';
                                    } else {
                                        echo '<div class="default-img"><i class="fas fa-book-open"></i></div>';
                                    }
                                    ?> 
                                </div>
                                
                                <div class="card-body p-4">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) :
                                        $category = $categories[0];
                                    ?>
                                        <div class="category-tag mb-3">
                                            <i class="fas fa-tag me-2"></i>
                                            <?php echo esc_html($category->name); ?>
                                        </div>
                                    <?php endif; ?>
                                
                                    <h3 class="card-title h5 fw-bold mb-3">
                                        <?php the_title(); ?>
                                    </h3>
                                    
                                    <p class="card-text text-secondary mb-3">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                    </p>
                                    
                                    <div class="d-flex align-items-center text-secondary small">
                                        <i class="far fa-clock me-1"></i>
                                        <span><?php echo get_the_date(); ?></span>
                                        <span class="mx-2">•</span>
                                        <i class="far fa-comment me-1"></i>
                                        <span><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                <?php
                    endwhile;
                ?>
                <!-- Post Count -->
                <div class="col-12 text-center mt-4">
                    <p class="text-secondary">
                        Showing <?php echo $lessons_query->found_posts; ?> articles
                    </p>
                </div>
                <?php
                    wp_reset_postdata();
                else :
                ?>
                    <div class="col-12 text-center">
                        <p class="text-secondary">No lessons found.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<style>
/* Lessons Page Styles */
:root {
    --primary: #0D47A1;
    --warning: #FFC107;
    --navbar-height: 56px;
}

.lessons-page-container {
    padding-top: var(--navbar-height);
    background-color: #f8f9fa;
}

.page-header {
    padding-top: calc(2rem + var(--navbar-height));
    padding-bottom: 2rem;
    background-color: #fff;
}

.breadcrumb {
    font-size: 0.9rem;
}

.breadcrumb-item a {
    color: var(--primary);
    text-decoration: none;
}

.breadcrumb-item.active {
    color: #6c757d;
}

/* Search Box Styles */
.search-box .form-control {
    padding: 1rem 1.5rem;
    font-size: 1rem;
    border: 1px solid rgba(0,0,0,0.1);
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}

.search-box .form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 0.25rem rgba(var(--primary-rgb), 0.25);
}

.rounded-pill-start {
    border-top-left-radius: 50rem !important;
    border-bottom-left-radius: 50rem !important;
}

.rounded-pill-end {
    border-top-right-radius: 50rem !important;
    border-bottom-right-radius: 50rem !important;
}

/* Filter Badges */
.badge {
    font-weight: 500;
    padding: 0.75em 1.5em;
    transition: all 0.3s ease;
}

.badge:hover {
    transform: translateY(-2px);
}

/* Card Styles */
.blog-card {
    transition: all 0.3s ease;
    background: #ffffff;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.card-link {
    color: inherit;
}

.card-link:hover {
    color: inherit;
}

.card-img-wrapper {
    position: relative;
    width: 100%;
    height: 220px;
    overflow: hidden;
    border-radius: 8px 8px 0 0;
    background-color: #f8f9fa;
}

.card-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: all 0.3s ease;
}

.card-img-wrapper:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.02);
    pointer-events: none;
}

.blog-card:hover .card-img-wrapper img {
    transform: scale(1.1);
}

.default-img {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
}

.default-img i {
    font-size: 3rem;
    color: #dee2e6;
}

.blog-card:hover .card-img-top {
    transform: scale(1.1);
}

.category-tag {
    color: #0066cc;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 1rem;
    color: #1a1a1a;
}

.card-text {
    color: #666666;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.blog-card:hover .card-img-top {
    transform: scale(1.05);
}

/* Pagination Styles */
.page-numbers {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    list-style: none;
    padding: 0;
}

.page-numbers li {
    display: inline-block;
}

.page-numbers a,
.page-numbers span {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: white;
    border: 1px solid rgba(0,0,0,0.1);
    color: #6c757d;
    text-decoration: none;
    transition: all 0.3s ease;
}

.page-numbers a:hover {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

.page-numbers .current {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .lessons-hero {
        padding-top: calc(3rem + var(--navbar-height));
        padding-bottom: 3rem;
    }
    
    .display-4 {
        font-size: calc(1.6rem + 2vw);
    }
    
    .lead {
        font-size: 1.1rem;
    }
    
    .filters-section h5 {
        margin-bottom: 1rem;
    }
}
</style>

<?php
get_template_part('template-parts/footer/footer');
get_footer();
?>
