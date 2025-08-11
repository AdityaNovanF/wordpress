<?php
/**
 * Template Name: Lessons Page
 * Template Post Type: page
 * Description: Template for displaying all lessons in blog style
 */

// Add theme support for post thumbnails
add_theme_support('post-thumbnails');

// Handle image uploads in post content
function handle_image_upload($attachment_id) {
    $post_id = get_post($attachment_id)->post_parent;
    
    // Only proceed if this is an image and attached to a post
    if ($post_id && wp_attachment_is_image($attachment_id)) {
        // If post doesn't have a featured image, set this as featured
        if (!has_post_thumbnail($post_id)) {
            set_post_thumbnail($post_id, $attachment_id);
        }
    }
}
add_action('add_attachment', 'handle_image_upload');

// Automatically set featured image from first image in post if not set
function auto_set_featured_image() {
    // If there is no featured image
    if (!has_post_thumbnail()) {
        // Get the post content
        $post = get_post();
        $content = $post->post_content;
        
        // Search for the first image in the post
        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
        
        if (!empty($matches[1][0])) {
            $first_img = $matches[1][0];
            
            // Get the image ID from URL
            $image_id = attachment_url_to_postid($first_img);
            
            if ($image_id) {
                // Set as featured image
                set_post_thumbnail($post->ID, $image_id);
            } else {
                // If image is external, download it first
                $upload = media_sideload_image($first_img, $post->ID);
                if (!is_wp_error($upload)) {
                    $image_id = attachment_url_to_postid($upload);
                    if ($image_id) {
                        set_post_thumbnail($post->ID, $image_id);
                    }
                }
            }
        }
    }
}

// Hook the function to run when a post is saved or updated
add_action('save_post', 'auto_set_featured_image');
add_action('post_updated', 'auto_set_featured_image');

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
                        <div class="position-relative">
                            <form id="search-form" class="search-form" method="GET">
                                <div class="input-group">
                                    <input type="search" 
                                           id="live-search" 
                                           name="search"
                                           class="form-control rounded-start"
                                           placeholder="Search for articles..."
                                           autocomplete="off"
                                           value="<?php echo isset($_GET['search']) ? esc_attr($_GET['search']) : ''; ?>">
                                    <button type="submit" id="search-button" class="btn btn-warning rounded-end px-4">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <!-- Live Search Results -->
                            <div id="search-results" class="live-search-results d-none">
                                <div class="loading-spinner d-none">
                                    <div class="spinner-border spinner-border-sm text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="results-container"></div>
                            </div>
                        </div>
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
                        $current_category = isset($_GET['category']) ? intval($_GET['category']) : 0;
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
                            // Add active class if this is the current category
                            if ($current_category === $category->term_id) {
                                $badge_class .= ' active';
                            }
                        ?>
                            <a href="<?php echo add_query_arg('category', $category->term_id); ?>" 
                               class="badge <?php echo esc_attr($badge_class); ?> text-decoration-none">
                                <?php echo esc_html($category->name); ?>
                                <span class="ms-1">(<?php echo esc_html($category->count); ?>)</span>
                            </a>
                        <?php endforeach; ?>
                        <?php if ($current_category > 0) : ?>
                            <a href="<?php echo remove_query_arg('category'); ?>" 
                               class="badge bg-secondary bg-opacity-10 text-secondary text-decoration-none">
                                <i class="fas fa-times me-1"></i>Clear Filter
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lessons Grid -->
    <section class="lessons-grid py-5">
        <div class="container">
            <?php if (!empty($search_query)) : ?>
                <div class="search-status mb-4">
                    <h4 class="mb-3">Search Results for: "<?php echo esc_html($search_query); ?>"</h4>
                    <p class="text-muted">
                        Click the search box and delete the text to show all articles again
                    </p>
                </div>
            <?php endif; ?>
            <div class="row g-4">
                <?php
                // Check if search query or category filter exists
                $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
                $category_id = isset($_GET['category']) ? intval($_GET['category']) : 0;
                
                // Get current page number
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                
                // Base query arguments
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'paged' => $paged
                );

                // Add category filter if selected
                if ($category_id > 0) {
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => $category_id,
                        ),
                    );
                }

                // Add search parameters if search query is not empty
                if (!empty($search_query)) {
                    // First, check if the search term matches any category name
                    $category = get_term_by('name', $search_query, 'category');
                    
                    if ($category) {
                        // If a matching category is found, show posts from that category
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'term_id',
                                'terms'    => $category->term_id,
                            ),
                        );
                    } else {
                        // If no matching category, do a regular search
                        $args['s'] = $search_query;
                    }
                }
                
                $lessons_query = new WP_Query($args);
                
                if ($lessons_query->have_posts()) :
                    while ($lessons_query->have_posts()) : $lessons_query->the_post();
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <article class="card blog-card h-100 border-0 shadow-sm">
                            <a href="<?php the_permalink(); ?>" class="card-link text-decoration-none">
                                <div class="card-img-wrapper">
                                    <?php 
                                    $has_image = false;
                                    
                                    // Cek featured image terlebih dahulu
                                    if (has_post_thumbnail()) {
                                        $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                        if ($full_image_url) {
                                            $has_image = true;
                                            ?>
                                            <div class="post-thumbnail">
                                                <img src="<?php echo esc_url($full_image_url[0]); ?>" 
                                                     class="card-img-top img-fluid" 
                                                     alt="<?php echo esc_attr(get_the_title()); ?>"
                                                     loading="lazy">
                                                <div class="img-overlay"></div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    
                                    // Jika tidak ada featured image, cari gambar dari konten
                                    if (!$has_image) {
                                        $post = get_post();
                                        $content = $post->post_content;
                                        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
                                        
                                        if (!empty($matches[1][0])) {
                                            $has_image = true;
                                            $content_image = $matches[1][0];
                                            ?>
                                            <div class="post-thumbnail">
                                                <img src="<?php echo esc_url($content_image); ?>" 
                                                     class="card-img-top img-fluid" 
                                                     alt="<?php echo esc_attr(get_the_title()); ?>"
                                                     loading="lazy">
                                                <div class="img-overlay"></div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    
                                    // Jika sama sekali tidak ada gambar
                                    if (!$has_image) {
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
                <!-- Pagination -->
                <div class="col-12">
                    <div class="pagination-wrapper mt-5">
                        <?php
                        $big = 999999999; // need an unlikely integer
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '?paged=%#%',
                            'current' => max(1, $paged),
                            'total' => $lessons_query->max_num_pages,
                            'prev_text' => '<i class="fas fa-chevron-left"></i>',
                            'next_text' => '<i class="fas fa-chevron-right"></i>',
                            'type' => 'list'
                        ));
                        ?>
                    </div>
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
    --primary: #DE0000;
    --primary-hover: #AA151B;
    --secondary: #FFB200;
    --warning: #FFB200;
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
.search-box {
    position: relative;
    z-index: 1000;
}

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

.live-search-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 0.5rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    max-height: 400px;
    overflow-y: auto;
    margin-top: 0.5rem;
    border: 1px solid rgba(0,0,0,0.1);
}

.live-search-results .loading-spinner {
    padding: 2rem;
    text-align: center;
}

.search-result-item {
    padding: 1rem;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    transition: all 0.2s ease;
}

.search-result-item:hover {
    background: rgba(var(--primary-rgb), 0.05);
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-item .title {
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 0.25rem;
}

.search-result-item .excerpt {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 0;
}

.search-result-item .category {
    font-size: 0.8rem;
    color: var(--primary);
    font-weight: 500;
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
    background: rgba(255, 178, 0, 0.1);
    color: #DE0000;
    border: 1px solid rgba(222, 0, 0, 0.1);
}

.badge:hover {
    transform: translateY(-2px);
    background: rgba(255, 178, 0, 0.2);
}

.badge.active {
    background-color: #DE0000 !important;
    color: white !important;
    border: 1px solid #DE0000;
}

/* Card Styles */
.blog-card {
    position: relative;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    background: #ffffff;
    box-shadow: 0 4px 20px rgba(222, 0, 0, 0.1);
    border-radius: 16px;
    overflow: hidden;
    transform: translateY(0);
    border: 1px solid rgba(255, 178, 0, 0.1);
}

.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
}

.card-link {
    position: relative;
    color: inherit;
    text-decoration: none;
    display: block;
    height: 100%;
    z-index: 1;
}

.card-link:hover {
    color: inherit;
}

.card-link::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(800px circle at var(--mouse-x) var(--mouse-y), 
                rgba(255, 255, 255, 0.1),
                transparent 40%);
    opacity: 0;
    transition: opacity 0.5s;
    pointer-events: none;
    z-index: 2;
}

.blog-card:hover .card-link::after {
    opacity: 1;
}

.card-img-wrapper {
    position: relative;
    width: 100%;
    padding-top: 66.67%; /* 3:2 aspect ratio */
    overflow: hidden;
    background-color: #f8f9fa;
}

.card-img-wrapper .post-thumbnail {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    transform: scale(1.01); /* Prevent edge gap during animation */
}

.card-img-wrapper img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.card-img-wrapper .img-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        180deg, 
        rgba(0,0,0,0) 0%, 
        rgba(0,0,0,0.02) 50%,
        rgba(0,0,0,0.1) 100%
    );
    opacity: 0;
    transition: opacity 0.5s ease;
}

.blog-card:hover .img-overlay {
    opacity: 1;
}

.blog-card:hover .card-img-wrapper img {
    transform: scale(1.1);
}

.default-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(45deg, #f8f9fa, #ffffff);
}

.default-img i {
    font-size: 3rem;
    color: #dee2e6;
    transform: scale(1);
    transition: transform 0.3s ease;
}

.blog-card:hover .default-img i {
    transform: scale(1.1);
}

.category-tag {
    display: inline-block;
    color: var(--primary);
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 0.5rem 0;
    margin-bottom: 0.5rem;
    position: relative;
    overflow: hidden;
}

.category-tag::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: var(--primary);
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.3s ease;
}

.blog-card:hover .category-tag::after {
    transform: scaleX(1);
    transform-origin: left;
}

.card-body {
    padding: 2rem;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 1.4;
    margin: 0.5rem 0 1rem;
    color: #1a1a1a;
    transition: color 0.3s ease;
}

.blog-card:hover .card-title {
    color: var(--primary);
}

.card-text {
    color: #666666;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    opacity: 0.9;
}

.card-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 0.85rem;
    color: #888;
    margin-top: auto;
}

.card-meta i {
    font-size: 0.8rem;
    transition: transform 0.3s ease;
}

.blog-card:hover .card-meta i {
    transform: translateY(-2px);
}

.blog-card:hover .card-img-top {
    transform: scale(1.05);
}

/* Pagination Styles */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 4rem;
    padding: 2rem 0;
}

.page-numbers {
    display: flex;
    justify-content: center;
    gap: 0.75rem;
    list-style: none;
    padding: 0;
    margin: 0;
}

.page-numbers li {
    display: inline-block;
}

.page-numbers a,
.page-numbers span {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    border-radius: 12px;
    background: white;
    border: 2px solid transparent;
    color: #6c757d;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    font-size: 1rem;
    font-weight: 500;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    position: relative;
    overflow: hidden;
}

.page-numbers a::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: var(--primary);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.4s ease, height 0.4s ease;
    z-index: -1;
}

.page-numbers a:hover {
    color: white;
    border-color: var(--primary);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(var(--primary-rgb), 0.2);
}

.page-numbers a:hover::before {
    width: 150%;
    height: 150%;
}

.page-numbers .current {
    background: var(--primary);
    color: white;
    font-weight: 600;
    box-shadow: 0 8px 25px rgba(var(--primary-rgb), 0.2);
}

.page-numbers .prev,
.page-numbers .next {
    font-size: 1.1rem;
    width: 50px;
}

/* Add responsive adjustments */
@media (max-width: 768px) {
    .page-numbers {
        gap: 0.5rem;
    }

    .page-numbers a,
    .page-numbers span {
        width: 40px;
        height: 40px;
        font-size: 0.9rem;
    }

    .page-numbers .prev,
    .page-numbers .next {
        width: 45px;
    }
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
// Add AJAX endpoint for live search
add_action('wp_ajax_live_search', 'live_search_callback');
add_action('wp_ajax_nopriv_live_search', 'live_search_callback');

function live_search_callback() {
    $search_query = sanitize_text_field($_POST['search']);
    
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
    );

    // Check if search term matches a category name
    $category = get_term_by('name', $search_query, 'category');
    
    if ($category) {
        // If a matching category is found, show posts from that category
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $category->term_id,
            ),
        );
    } else {
        // If no matching category, do a regular search
        $args['s'] = $search_query;
    }
    
    $search_query = new WP_Query($args);
    $results = array();
    
    if ($search_query->have_posts()) {
        while ($search_query->have_posts()) {
            $search_query->the_post();
            $categories = get_the_category();
            $category_name = !empty($categories) ? esc_html($categories[0]->name) : '';
            
            $results[] = array(
                'title' => get_the_title(),
                'excerpt' => wp_trim_words(get_the_excerpt(), 15),
                'link' => get_permalink(),
                'category' => $category_name
            );
        }
        wp_reset_postdata();
    }
    
    wp_send_json($results);
}

get_template_part('template-parts/footer/footer');
get_footer();
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('live-search');
    const searchButton = document.getElementById('search-button');
    const searchResults = document.getElementById('search-results');
    const resultsContainer = searchResults.querySelector('.results-container');
    const loadingSpinner = searchResults.querySelector('.loading-spinner');
    const cards = document.querySelectorAll('.blog-card');
    let searchTimeout;

    // Add dynamic hover effect to cards
    cards.forEach(card => {
        const cardLink = card.querySelector('.card-link');
        
        cardLink.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
        
        cardLink.addEventListener('mouseleave', () => {
            card.style.removeProperty('--mouse-x');
            card.style.removeProperty('--mouse-y');
        });
    });

    // Add animation on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        observer.observe(card);
    });
    let currentSearchTerm = searchInput.value;

    // Fungsi untuk menampilkan loading spinner
    function showLoading() {
        loadingSpinner.classList.remove('d-none');
    }

    // Fungsi untuk menyembunyikan loading spinner
    function hideLoading() {
        loadingSpinner.classList.add('d-none');
    }

    // Fungsi untuk menampilkan hasil pencarian
    function showResults() {
        searchResults.classList.remove('d-none');
    }

    // Fungsi untuk menyembunyikan hasil pencarian
    function hideResults() {
        searchResults.classList.add('d-none');
    }

    // Fungsi untuk melakukan pencarian
    function filterByCategory(categoryId, categoryName) {
        categorySelect.value = categoryId;
        if (searchInput.value.trim() === '') {
            searchInput.value = categoryName;
        }
        performSearch(searchInput.value.trim());
    }

    async function performSearch(searchTerm) {
        showLoading();
        showResults();

        try {
            const formData = new FormData();
            formData.append('action', 'live_search');
            formData.append('search', searchTerm);

            const response = await fetch(ajaxurl, {
                method: 'POST',
                body: formData
            });

            const results = await response.json();
            
            resultsContainer.innerHTML = '';
            
            if (results.length > 0) {
                results.forEach(result => {
                    resultsContainer.innerHTML += `
                        <a href="${result.link}" class="text-decoration-none">
                            <div class="search-result-item">
                                ${result.category ? `<div class="category">${result.category}</div>` : ''}
                                <div class="title">${result.title}</div>
                                <p class="excerpt mb-0">${result.excerpt}</p>
                            </div>
                        </a>
                    `;
                });
            } else {
                resultsContainer.innerHTML = `
                    <div class="search-result-item">
                        <p class="mb-0 text-center text-muted">No results found</p>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Search error:', error);
            resultsContainer.innerHTML = `
                <div class="search-result-item">
                    <p class="mb-0 text-center text-secondary">Press enter or click the search button to view your search results</p>
                </div>
            `;
        } finally {
            hideLoading();
        }
    }

    // Event listener untuk form submit
    searchForm.addEventListener('submit', function(e) {
        const searchTerm = searchInput.value.trim();
        if (searchTerm.length < 1) {
            e.preventDefault();
        }
    });

    // Event listener untuk input pencarian
    const handleSearch = function() {
        const searchTerm = searchInput.value.trim();
        currentSearchTerm = searchTerm;

        clearTimeout(searchTimeout);

        // Jika search box kosong
        if (searchTerm.length === 0) {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.delete('search');
            window.location.href = currentUrl.toString();
            return;
        }

        // Jika ada teks pencarian
        if (searchTerm.length > 2) {
            searchTimeout = setTimeout(() => {
                performSearch(searchTerm);
            }, 300);
        } else {
            hideResults();
        }
    };

    searchInput.addEventListener('input', handleSearch);

    // Event listener untuk tombol search
    searchButton.addEventListener('click', function(e) {
        const searchTerm = searchInput.value.trim();
        if (searchTerm.length > 0) {
            searchForm.submit();
        }
    });

    // Sembunyikan hasil pencarian saat klik di luar
    document.addEventListener('click', function(e) {
        if (!searchResults.contains(e.target) && !searchInput.contains(e.target)) {
            hideResults();
        }
    });
});
</script>
