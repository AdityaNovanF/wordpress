<?php
/**
 * Template Name: Lessons
 * Description: Template for displaying all lessons in blog style
 */

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
                            <li class="breadcrumb-item active">All Lessons</li>
                        </ol>
                    </nav>
                    <h1 class="display-4 fw-bold mb-4">All Spanish Lessons</h1>
                    
                    <!-- Search Form -->
                    <div class="search-box mb-4">
                        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                            <div class="input-group">
                                <input type="search" class="form-control rounded-start"
                                       placeholder="Search lessons..."
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

    <!-- Lessons Grid -->
    <section class="lessons-grid py-5">
        <div class="container">
            <div class="row g-4">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                
                $lessons_query = new WP_Query($args);
                
                if ($lessons_query->have_posts()) :
                    while ($lessons_query->have_posts()) : $lessons_query->the_post();
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <article class="card blog-card h-100 border-0">
                            <a href="<?php the_permalink(); ?>" class="card-link text-decoration-none">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="card-img-wrapper">
                                        <?php 
                                        $thumbnail_id = get_post_thumbnail_id();
                                        $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'medium_large')[0];
                                        ?>
                                        <img src="<?php echo esc_url($thumbnail_url); ?>" 
                                             class="card-img-top w-100 h-100 object-fit-cover" 
                                             alt="<?php echo esc_attr(get_the_title()); ?>">
                                    </div>
                                <?php else: ?>
                                    <div class="card-img-wrapper default-img">
                                        <i class="fas fa-image"></i>
                                    </div>
                                <?php endif; ?>
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
.card-img-wrapper {
    height: 200px;
    overflow: hidden;
    position: relative;
    border-radius: 8px 8px 0 0;
}

.card-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.default-img {
    background-color: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
}

.default-img i {
    font-size: 3rem;
    color: #dee2e6;
}

.blog-card:hover .card-img-wrapper img {
    transform: scale(1.05);
}
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

/* Card Styles */
.blog-card {
    transition: all 0.3s ease;
    background: #ffffff;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.card-hover {
    position: relative;
    overflow: hidden;
}

.card-hover::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.03);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.card-hover:hover::after {
    opacity: 1;
}

.card-img-wrapper {
    height: 200px;
    overflow: hidden;
}

.card-img-wrapper {
    height: 200px;
    overflow: hidden;
    position: relative;
}

.card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
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
    color: #1a1a1a;
}

.card-text {
    color: #666666;
    font-size: 0.95rem;
    line-height: 1.6;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .page-header {
        padding-top: calc(2rem + var(--navbar-height));
    }
    
    .display-4 {
        font-size: calc(1.6rem + 2vw);
    }
}
</style>

<?php
get_template_part('template-parts/footer/footer');
get_footer();
?>
