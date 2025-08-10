<?php
// Enqueue assets
function enqueue_single_post_assets() {
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
add_action('wp_enqueue_scripts', 'enqueue_single_post_assets');

get_header();
?>

<?php get_template_part('template-parts/header/navbar'); ?>

<main class="article-detail">
    <?php while (have_posts()) : the_post(); ?>
        <!-- Hero Section -->
        <section class="article-hero position-relative py-5">
            <div class="container-fluid px-4 px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <!-- Kategori -->
                        <div class="mb-3">
                            <?php
                            $categories = get_the_category();
                            if ($categories) {
                                foreach ($categories as $category) {
                                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="badge bg-primary text-decoration-none me-2">' . 
                                          esc_html($category->name) . 
                                          '</a>';
                                }
                            }
                            ?>
                        </div>

                        <!-- Judul -->
                        <h1 class="display-4 fw-bold mb-4"><?php the_title(); ?></h1>

                        <!-- Meta Info -->
                        <div class="d-flex align-items-center text-muted mb-4">
                            <!-- Penulis -->
                            <div class="d-flex align-items-center me-4">
                                <?php echo get_avatar(get_the_author_meta('ID'), 40, '', '', array('class' => 'rounded-circle me-2')); ?>
                                <div>
                                    <small class="d-block text-dark">Written by</small>
                                    <span class="fw-medium text-dark"><?php the_author(); ?></span>
                                </div>
                            </div>
                            <!-- Date -->
                            <div class="me-4">
                                <small class="d-block text-dark">Published on</small>
                                <span class="fw-medium text-dark"><?php echo get_the_date('j F Y'); ?></span>
                            </div>
                            <!-- Reading Time -->
                            <div>
                                <small class="d-block text-dark">Reading Time</small>
                                <span class="fw-medium text-dark">
                                    <?php
                                    $content = get_post_field('post_content', get_the_ID());
                                    $word_count = str_word_count(strip_tags($content));
                                    $reading_time = ceil($word_count / 200); // Assuming 200 words per minute
                                    echo $reading_time . ' min read';
                                    ?>
                                </span>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="featured-image-wrapper rounded-4 overflow-hidden mb-5">
                                <?php
                                the_post_thumbnail('large', array(
                                    'class' => 'w-100 h-auto',
                                    'style' => 'max-height: 500px; object-fit: cover;'
                                ));
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Konten Artikel -->
        <section class="article-content py-5">
            <div class="container-fluid px-4 px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="content-wrapper">
                            <?php the_content(); ?>
                        </div>

                        <!-- Tags -->
                        <?php
                        $tags = get_the_tags();
                        if ($tags) : ?>
                            <div class="tags-section mt-5">
                                <h5 class="mb-3">Tags:</h5>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php foreach ($tags as $tag) : ?>
                                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" 
                                           class="btn btn-light btn-sm rounded-pill">
                                            #<?php echo esc_html($tag->name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Share Buttons -->
                        <div class="share-section mt-5">
                            <h5 class="mb-3">Share Article:</h5>
                            <div class="d-flex gap-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                                   class="btn btn-primary" 
                                   target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                                   class="btn btn-info text-white" 
                                   target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" 
                                   class="btn btn-success" 
                                   target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" 
                                   class="btn btn-primary" 
                                   target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Author Box -->
                        <div class="author-box bg-light p-4 rounded-4 mt-5">
                            <div class="d-flex">
                                <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'rounded-circle')); ?>
                                <div class="ms-3">
                                    <h5 class="mb-1"><?php the_author(); ?></h5>
                                    <?php if (get_the_author_meta('description')) : ?>
                                        <p class="mb-3"><?php echo get_the_author_meta('description'); ?></p>
                                    <?php endif; ?>
                                    <div class="social-links">
                                        <?php
                                        $social_links = array(
                                            'twitter' => get_the_author_meta('twitter'),
                                            'facebook' => get_the_author_meta('facebook'),
                                            'instagram' => get_the_author_meta('instagram'),
                                            'linkedin' => get_the_author_meta('linkedin')
                                        );

                                        foreach ($social_links as $platform => $link) {
                                            if ($link) {
                                                echo '<a href="' . esc_url($link) . '" class="text-primary me-2" target="_blank">';
                                                echo '<i class="fab fa-' . $platform . '"></i>';
                                                echo '</a>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Articles -->
        <section class="related-articles py-5 bg-light">
            <div class="container-fluid px-4 px-lg-5">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-4 text-center">Related Articles</h3>
                        <div class="row g-4">
                            <?php
                            $categories = get_the_category();
                            if ($categories) {
                                $category_ids = array();
                                foreach ($categories as $category) {
                                    $category_ids[] = $category->term_id;
                                }

                                $related_args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'post__not_in' => array(get_the_ID()),
                                    'category__in' => $category_ids,
                                    'orderby' => 'rand'
                                );

                                $related_posts = new WP_Query($related_args);

                                if ($related_posts->have_posts()) :
                                    while ($related_posts->have_posts()) : $related_posts->the_post();
                            ?>
                                        <div class="col-md-4" data-aos="fade-up">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none card-link">
                                                <div class="card h-100 border-0 bg-white rounded-4 shadow-sm position-relative overflow-hidden">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <div class="card-img-wrapper overflow-hidden position-relative">
                                                            <?php the_post_thumbnail('medium', array(
                                                                'class' => 'card-img-top',
                                                                'style' => 'height: 200px; object-fit: cover;'
                                                            )); ?>
                                                            <div class="overlay-gradient"></div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="card-body p-4">
                                                        <?php
                                                        $categories = get_the_category();
                                                        if ($categories) : ?>
                                                            <div class="mb-2">
                                                                <?php
                                                                $category = $categories[0]; // Get the first category
                                                                echo '<span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 small">' . 
                                                                    esc_html($category->name) . 
                                                                    '</span>';
                                                                ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <h5 class="card-title text-dark fw-bold mb-3 line-clamp-2">
                                                            <?php the_title(); ?>
                                                        </h5>
                                                        <p class="card-text text-secondary mb-3 line-clamp-3 small">
                                                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                                        </p>
                                                        <div class="d-flex align-items-center text-secondary small">
                                                            <i class="far fa-clock me-1"></i>
                                                            <span><?php echo get_the_date('j M Y'); ?></span>
                                                            <span class="mx-2">•</span>
                                                            <i class="far fa-eye me-1"></i>
                                                            <span><?php echo ceil(str_word_count(strip_tags(get_the_content())) / 200); ?> min read</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                            <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Comments Section -->
        <section class="comments-section py-5">
            <div class="container-fluid px-4 px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm rounded-4 p-4">
                            <h3 class="mb-4">Comments</h3>
                            
                            <?php
                            // If comments are open or we have at least one comment
                            if (comments_open() || get_comments_number()) :
                            ?>
                                <!-- Comment Form -->
                                <div class="comment-form-wrapper mb-5">
                                    <?php
                                    $commenter = wp_get_current_commenter();
                                    $req = get_option('require_name_email');
                                    $aria_req = ($req ? " aria-required='true'" : '');

                                    $comments_args = array(
                                        'class_form' => 'comment-form',
                                        'title_reply' => 'Leave a Comment',
                                        'title_reply_before' => '<h5 class="mb-4">',
                                        'title_reply_after' => '</h5>',
                                        'comment_notes_before' => '<p class="comment-notes text-muted small mb-4">Your email address will not be published.</p>',
                                        'comment_field' => '<div class="mb-3">
                                                            <label for="comment" class="form-label">Comment</label>
                                                            <textarea id="comment" name="comment" class="form-control" rows="5" required></textarea>
                                                        </div>',
                                        'fields' => array(
                                            'author' => '<div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="author" class="form-label">Name' . ($req ? ' <span class="text-danger">*</span>' : '') . '</label>
                                                            <input id="author" name="author" type="text" class="form-control" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . '>
                                                        </div>',
                                            'email' => '<div class="col-md-6 mb-3">
                                                        <label for="email" class="form-label">Email' . ($req ? ' <span class="text-danger">*</span>' : '') . '</label>
                                                        <input id="email" name="email" type="email" class="form-control" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . '>
                                                        </div>
                                                    </div>',
                                        ),
                                        'class_submit' => 'btn btn-primary rounded-pill px-4',
                                        'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s"><i class="fas fa-paper-plane me-2"></i>Submit Comment</button>',
                                        'submit_field' => '<div class="form-submit mt-4">%1$s %2$s</div>',
                                    );
                                    comment_form($comments_args);
                                    ?>
                                </div>

                                <!-- Comments List -->
                                <div class="comments-list">
                                    <?php
                                    wp_list_comments(array(
                                        'style' => 'div',
                                        'callback' => function($comment, $args, $depth) {
                                            ?>
                                            <div class="comment-item mb-4 <?php echo $depth > 1 ? 'ms-4' : ''; ?>">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <?php echo get_avatar($comment, 50, '', '', array('class' => 'rounded-circle')); ?>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <div class="comment-meta mb-2">
                                                            <h6 class="mb-0 fw-bold"><?php echo get_comment_author(); ?></h6>
                                                            <small class="text-muted">
                                                                <?php echo get_comment_date('j F Y'); ?> at <?php echo get_comment_time(); ?>
                                                            </small>
                                                        </div>
                                                        <div class="comment-content mb-2">
                                                            <?php comment_text(); ?>
                                                        </div>
                                                        <?php
                                                        comment_reply_link(array_merge($args, array(
                                                            'depth' => $depth,
                                                            'max_depth' => $args['max_depth'],
                                                            'reply_text' => '<i class="fas fa-reply me-1"></i>Reply',
                                                            'before' => '<div class="reply">',
                                                            'after' => '</div>',
                                                            'class' => 'btn btn-sm btn-light'
                                                        )));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    ));
                                    ?>

                                    <?php
                                    // If comments are closed
                                    if (!comments_open() && get_comments_number()) :
                                    ?>
                                        <p class="no-comments alert alert-info">Comments are closed.</p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
</main>

<style>
/* Article Styles */
:root {
    --primary: #4461F2;
    --primary-rgb: 68, 97, 242;
    --navbar-height: 56px;
    --gradient-1: linear-gradient(135deg, #4461F2 0%, #6C63FF 100%);
    --gradient-2: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
    --dark: #2B2B2B;
    --light: #F8F9FD;
    --transition: all 0.3s ease;
    --card-shadow: 0 8px 30px rgba(0,0,0,0.05);
    --hover-shadow: 0 15px 40px rgba(68,97,242,0.1);
}

.article-hero {
    padding-top: calc(var(--navbar-height) + var(--wp-admin--admin-bar--height, 0px));
    background: linear-gradient(135deg, 
        #2D31FA 0%, 
        #5D69FF 35%, 
        #7C4DFF 65%, 
        #AB4DFF 100%
    );
    position: relative;
    overflow: hidden;
    color: white;
    min-height: 60vh;
    display: flex;
    align-items: center;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
}

.article-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg,
        rgba(255, 255, 255, 0.1) 0%,
        rgba(255, 255, 255, 0.05) 50%,
        rgba(255, 255, 255, 0) 100%
    );
}

.article-hero::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    right: -50%;
    bottom: -50%;
    background: radial-gradient(circle, 
        rgba(255, 255, 255, 0.08) 0%, 
        rgba(255, 255, 255, 0) 70%
    );
    pointer-events: none;
    mix-blend-mode: overlay;
}

.article-hero .badge {
    background: rgba(255,255,255,0.2);
    color: white;
    border: none;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    padding: 0.8em 1.5em;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.3s ease;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
}

.article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--dark);
    background: white;
    border-radius: 2rem;
    padding: 3.5rem;
    box-shadow: 0 15px 50px rgba(68, 97, 242, 0.08);
    position: relative;
    margin-top: -4rem;
    transition: all 0.3s ease;
    max-width: 1200px;
    width: 90%;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid rgba(68, 97, 242, 0.1);
}

.article-content:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 50px rgba(0,0,0,0.05);
}

.article-content p {
    margin-bottom: 1.8rem;
    color: #4a5568;
    font-size: 1.15rem;
    line-height: 1.9;
}

.article-content h2,
.article-content h3,
.article-content h4 {
    margin-top: 3rem;
    margin-bottom: 1.5rem;
    font-weight: 700;
    position: relative;
    padding-bottom: 1rem;
    color: #2d3748;
}

.article-content h2::after,
.article-content h3::after,
.article-content h4::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 4px;
    background: linear-gradient(to right, var(--primary), transparent);
    border-radius: 2px;
}

.article-content img {
    max-width: 100%;
    height: auto;
    border-radius: 1rem;
    margin: 2.5rem 0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.article-content img:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.article-content blockquote {
    border-left: none;
    padding: 2rem 3rem;
    margin: 2.5rem 0;
    font-style: italic;
    background: linear-gradient(to right, rgba(var(--primary-rgb), 0.03), transparent);
    border-radius: 1rem;
    position: relative;
}

.article-content blockquote::before {
    content: '"';
    position: absolute;
    top: 1rem;
    left: 1rem;
    font-size: 4rem;
    color: rgba(var(--primary-rgb), 0.2);
    font-family: Georgia, serif;
}

.article-content code {
    background: linear-gradient(to right, rgba(var(--primary-rgb), 0.05), rgba(var(--primary-rgb), 0.02));
    padding: 0.3rem 0.8rem;
    border-radius: 0.5rem;
    font-size: 0.9em;
    color: var(--primary);
    font-weight: 500;
}

.article-content pre {
    background: #2d3748;
    color: #ffffff;
    padding: 2rem;
    border-radius: 1rem;
    overflow-x: auto;
    margin: 2.5rem 0;
    box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    border: 1px solid rgba(255,255,255,0.1);
}

.article-content ul,
.article-content ol {
    margin: 2rem 0;
    padding-left: 2.5rem;
    color: #4a5568;
}

.article-content li {
    margin-bottom: 1rem;
    position: relative;
    padding-left: 0.5rem;
}

.article-content ul li::before {
    content: '';
    position: absolute;
    left: -1.5rem;
    top: 0.75rem;
    width: 6px;
    height: 6px;
    background: var(--primary);
    border-radius: 50%;
    transform: scale(0.8);
    transition: all 0.3s ease;
}

.article-content ul li:hover::before {
    transform: scale(1.2);
    box-shadow: 0 0 10px rgba(var(--primary-rgb), 0.3);
}

/* Tambahan untuk variabel RGB */
:root {
    --primary-rgb: 68, 97, 242;
}

/* Related Articles */
.related-articles {
    position: relative;
    z-index: 1;
    background: #F8F9FD;
    overflow: hidden;
}

.related-articles::before {
    content: '';
    position: absolute;
    width: 800px;
    height: 800px;
    background: rgba(68, 97, 242, 0.15);
    border-radius: 50%;
    top: -400px;
    right: -200px;
    filter: blur(60px);
    z-index: 0;
}

.related-articles .card-link {
    display: block;
    text-decoration: none;
    color: inherit;
}

.related-articles .card {
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    background: linear-gradient(to bottom, #ffffff, #f8f9fa);
}

.related-articles .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 1rem 2rem rgba(0,0,0,0.1) !important;
}

.related-articles .card-img-wrapper {
    height: 200px;
    overflow: hidden;
}

.related-articles .card-img-top {
    transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.related-articles .card:hover .card-img-top {
    transform: scale(1.08);
}

.related-articles .overlay-gradient {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.02) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.related-articles .card:hover .overlay-gradient {
    opacity: 1;
}

.related-articles .line-clamp-2 {
    display: -webkit-box;
    display: -moz-box;
    display: box;
    -webkit-line-clamp: 2;
    -moz-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    -moz-box-orient: vertical;
    box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    max-height: 2.8em; /* Fallback for non-webkit */
}

.related-articles .line-clamp-3 {
    display: -webkit-box;
    display: -moz-box;
    display: box;
    -webkit-line-clamp: 3;
    -moz-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    -moz-box-orient: vertical;
    box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.related-articles .badge {
    font-weight: 500;
    letter-spacing: 0.5px;
}

.related-articles .card-title {
    font-size: 1.1rem;
    line-height: 1.5;
}

/* Custom Animation for AOS */
[data-aos="fade-up"] {
    transform: translateY(30px);
    opacity: 0;
    transition-property: transform, opacity;
}

[data-aos="fade-up"].aos-animate {
    transform: translateY(0);
    opacity: 1;
}

/* Share Buttons */
.share-section .btn {
    width: 40px;
    height: 40px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

/* Author Box */
.author-box {
    background: linear-gradient(to right, rgba(var(--primary-rgb), 0.03), rgba(var(--primary-rgb), 0.01));
    border-radius: 1.5rem;
    padding: 2rem !important;
    border: 1px solid rgba(var(--primary-rgb), 0.08);
    transition: all 0.3s ease;
}

.author-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(var(--primary-rgb), 0.05);
}

.author-box .rounded-circle {
    width: 80px;
    height: 80px;
    border: 3px solid white;
    box-shadow: 0 5px 15px rgba(var(--primary-rgb), 0.1);
    transition: all 0.3s ease;
}

.author-box .ms-3 {
    margin-left: 1.5rem !important;
}

.author-box h5 {
    color: var(--dark);
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
    position: relative;
    display: inline-block;
}

.author-box h5::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(to right, var(--primary), transparent);
    border-radius: 2px;
}

.author-box p {
    color: #64748b;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.social-links {
    display: flex;
    gap: 0.75rem;
}

.social-links a {
    font-size: 1rem;
    color: var(--primary);
    background: rgba(var(--primary-rgb), 0.1);
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .article-hero {
        text-align: center;
    }
    
    .article-content {
        font-size: 1rem;
    }
    
    .meta-info {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .meta-info > div {
        margin-bottom: 1rem;
    }
}

/* Navbar styles moved to navbar.php */

/* General Styles */
body {
    font-family: 'Inter', sans-serif;
    padding-top: var(--navbar-height);
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

/* Custom Variables */
:root {
    --primary: #4461F2;
    --secondary: #6c757d;
    --accent: #FF6B6B;
    --gradient-1: linear-gradient(135deg, #4461F2 0%, #6C63FF 100%);
    --gradient-2: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
    --dark: #2B2B2B;
    --light: #F8F9FD;
    --author-online: #22c55e;
    --transition: all 0.3s ease;
    --card-shadow: 0 8px 30px rgba(0,0,0,0.05);
    --hover-shadow: 0 15px 40px rgba(68,97,242,0.1);
}

/* Modern Theme Styles */
body {
    background: var(--light);
}

.article-hero {
    position: relative;
    color: #2D3748;
    overflow: hidden;
    padding: 8rem 0 6rem;
    background: #F8F9FD;
    min-height: 70vh;
}

.article-hero::before {
    content: '';
    position: absolute;
    width: 600px;
    height: 600px;
    background: rgba(68, 97, 242, 0.15);
    border-radius: 50%;
    top: -200px;
    right: -200px;
    animation: float 15s ease-in-out infinite;
    filter: blur(60px);
    z-index: 0;
}

.article-hero::after {
    content: '';
    position: absolute;
    width: 500px;
    height: 500px;
    background: rgba(108, 99, 255, 0.15);
    border-radius: 50%;
    bottom: -200px;
    left: -100px;
    animation: float 20s ease-in-out infinite reverse;
    filter: blur(60px);
    z-index: 0;
}

@keyframes float {
    0% { transform: translate(0, 0); }
    25% { transform: translate(40px, -40px); }
    50% { transform: translate(80px, 0); }
    75% { transform: translate(40px, 40px); }
    100% { transform: translate(0, 0); }
}

@keyframes heroGlow {
    0% { filter: brightness(1) saturate(1); }
    50% { filter: brightness(1.1) saturate(1.2); }
    100% { filter: brightness(1) saturate(1); }
}

@keyframes glowPulse {
    0% { opacity: 0.5; }
    50% { opacity: 0.8; }
    100% { opacity: 0.5; }
}

.article-hero .badge {
    background: rgba(68, 97, 242, 0.1);
    color: var(--primary);
    border: none;
    padding: 0.8em 1.5em;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 100px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(68, 97, 242, 0.1);
}

.article-hero .badge:hover {
    background: rgba(255,255,255,0.3);
    transform: translateY(-2px);
}

.article-hero h1 {
    font-size: 3.5rem;
    line-height: 1.2;
    margin-bottom: 1.5rem;
    position: relative;
    color: #2D3748;
    font-weight: 700;
    letter-spacing: -0.02em;
}

.article-hero h1::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 0;
    width: 120px;
    height: 4px;
    background: var(--gradient-2);
    border-radius: 2px;
    animation: glow 2s ease-in-out infinite;
}

.article-hero .text-muted {
    color: rgba(255,255,255,0.8) !important;
}

.article-hero .meta-info {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 1rem;
    padding: 1.5rem;
    border: 1px solid rgba(68, 97, 242, 0.1);
    margin-top: 2rem;
    box-shadow: 0 8px 32px rgba(68, 97, 242, 0.08);
    transform: translateY(0);
    transition: all 0.3s ease;
    color: #2D3748;
}

/* Author Meta Info */
.article-hero .meta-info {
    margin-bottom: 2rem;
}

.article-hero .meta-info .rounded-circle {
    width: 40px;
    height: 40px;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.article-hero .meta-info small {
    color: #4A5568;
    font-size: 0.85rem;
    font-weight: 500;
}

.article-hero .meta-info .fw-medium {
    color: #2D3748;
    font-weight: 600;
}

.article-hero .meta-info:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.15);
    background: rgba(255,255,255,0.2);
}

@keyframes glow {
    0% { box-shadow: 0 0 5px rgba(255,107,107,0.5); }
    50% { box-shadow: 0 0 20px rgba(255,107,107,0.3); }
    100% { box-shadow: 0 0 5px rgba(255,107,107,0.5); }
}

.article-hero .badge {
    background: rgba(255,255,255,0.2);
    color: white;
    border: none;
}

.related-articles {
    background: white;
    position: relative;
    overflow: hidden;
}

.related-articles::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 300px;
    background: var(--gradient-1);
    transform: skewY(-6deg);
    transform-origin: top right;
    z-index: 0;
}

.related-articles .container-fluid {
    position: relative;
    z-index: 1;
}

.related-articles .card {
    background: white;
    box-shadow: var(--card-shadow);
    border: none;
}

.related-articles .card:hover {
    box-shadow: var(--hover-shadow);
}

.related-articles .badge.bg-primary-subtle {
    background: rgba(68,97,242,0.1) !important;
    color: var(--primary) !important;
}

.comments-section {
    background: white;
}

.comments-section .card {
    background: var(--light);
}

.btn-primary {
    background: var(--gradient-1);
    border: none;
}

.btn-primary:hover {
    background: var(--gradient-2);
}

.text-primary {
    color: var(--primary) !important;
}

/* Remove unwanted spacing */
.site-wrapper {
    margin: 0;
    padding: 0;
}

.site-header,
.entry-header {
    display: none;
}

.wp-site-blocks > * {
    margin: 0;
    padding: 0;
}

.wp-block-group {
    margin: 0;
    padding: 0;
}

/* Animations */
@keyframes float {
    0% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0); }
}

/* Comments Section Styles */
.comments-section {
    background: linear-gradient(to bottom, #ffffff, #f8f9fa);
    position: relative;
}

.comments-section .comment-card {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(68, 97, 242, 0.1);
    transition: all 0.3s ease;
}

.comments-section .section-title {
    color: #2D3748;
    font-weight: 700;
    position: relative;
    padding-bottom: 1rem;
    margin-bottom: 2rem;
}

.comments-section .section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 4px;
    background: linear-gradient(to right, var(--primary), transparent);
    border-radius: 2px;
}

.comments-section .comment-item {
    transition: all 0.3s ease;
    border-radius: 1rem;
    padding: 1.5rem;
    background: rgba(248, 249, 253, 0.5);
    border: 1px solid rgba(68, 97, 242, 0.08);
}

.comments-section .comment-item:hover {
    transform: translateY(-2px);
    background: rgba(248, 249, 253, 0.8);
    box-shadow: 0 8px 24px rgba(68, 97, 242, 0.08);
}

.comments-section .comment-meta h6 {
    color: #2D3748;
}

.comments-section .comment-content {
    color: #4A5568;
    line-height: 1.7;
}

.comment-form textarea.form-control,
.comment-form input.form-control {
    border: 1px solid rgba(68, 97, 242, 0.1);
    padding: 1rem;
    transition: all 0.3s ease;
    background: rgba(248, 249, 253, 0.5);
    border-radius: 0.75rem;
}

.comment-form textarea.form-control:focus,
.comment-form input.form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(68, 97, 242, 0.1);
    background: white;
}

.comment-form .form-label {
    font-weight: 600;
    color: #2D3748;
    margin-bottom: 0.75rem;
}

.comment-form .btn-primary {
    padding: 0.75rem 2rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.comment-form .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(68, 97, 242, 0.2);
}

.hover-primary:hover {
    background: var(--primary) !important;
    color: white !important;
    border-color: var(--primary) !important;
}

.form-check-input:checked {
    background-color: var(--primary);
    border-color: var(--primary);
}

.comment-respond {
    position: relative;
    padding: 2rem;
    background: rgba(248, 249, 253, 0.8);
    border-radius: 1rem;
    border: 1px solid rgba(68, 97, 242, 0.08);
    margin-top: 2rem;
}

/* Modal Styles */
.modal-content {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fd 100%);
}

#commentSuccessModal .modal-body {
    position: relative;
    overflow: hidden;
}

#commentSuccessModal .modal-body::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(68, 97, 242, 0.05) 0%, rgba(68, 97, 242, 0) 70%);
    animation: rotate 20s linear infinite;
}

#commentSuccessModal .fa-check-circle {
    color: #10B981;
    filter: drop-shadow(0 4px 12px rgba(16, 185, 129, 0.2));
    animation: scaleIn 0.5s ease-out;
}

#commentSuccessModal .modal-title {
    color: #2D3748;
    font-weight: 700;
}

#commentSuccessModal .btn-primary {
    transition: all 0.3s ease;
}

#commentSuccessModal .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(68, 97, 242, 0.2);
}

@keyframes scaleIn {
    from {
        transform: scale(0);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

/* Loading Spinner */
.spinner-border-sm {
    width: 1rem;
    height: 1rem;
    border-width: 0.15em;
}

.comment-form textarea.form-control:focus,
.comment-form input.form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
}

.comment-form .form-label {
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.comments-list .comment-item {
    position: relative;
    transition: all 0.3s ease;
}

.comments-list .comment-item:not(:last-child)::after {
    content: '';
    position: absolute;
    bottom: -1rem;
    left: 25px;
    right: 0;
    height: 1px;
    background: linear-gradient(to right, #dee2e6 0%, transparent 100%);
}

.comments-list .reply .btn {
    font-size: 0.875rem;
    padding: 0.25rem 1rem;
    transition: all 0.3s ease;
}

.comments-list .reply .btn:hover {
    background-color: var(--primary);
    color: white;
}

/* Helper Classes */
.min-vh-75 {
    min-height: 75vh;
}

.filter-blur {
    filter: blur(40px);
}

.text-gradient {
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
}
</style>

<!-- Success Modal -->
<div class="modal fade" id="commentSuccessModal" tabindex="-1" aria-labelledby="commentSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-body p-5 text-center">
                <div class="mb-4">
                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                </div>
                <h4 class="modal-title mb-3" id="commentSuccessModalLabel">Thank You!</h4>
                <p class="text-muted mb-4">Your comment has been successfully submitted and is awaiting moderation.</p>
                <button type="button" class="btn btn-primary px-4 py-2 rounded-pill" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Navbar Scroll Effect -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 10) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Comment Form Submit Handler
    const commentForm = document.querySelector('.comment-form');
    if (commentForm) {
        commentForm.addEventListener('submit', function(e) {
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            
            // Store original button text
            const originalButtonText = submitButton.innerHTML;
            
            // Show loading state
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Sending...';
            submitButton.disabled = true;

            fetch(this.action, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            })
            .then(response => {
                if (response.ok) {
                    // Show success modal
                    const successModal = new bootstrap.Modal(document.getElementById('commentSuccessModal'));
                    successModal.show();
                    
                    // Set timer to automatically hide modal after 3 seconds
                    setTimeout(() => {
                        successModal.hide();
                    }, 3000);
                    
                    // Reset form
                    this.reset();
                } else {
                    throw new Error('Comment submission failed');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Sorry, there was an error submitting your comment. Please try again.');
            })
            .finally(() => {
                // Restore button state
                submitButton.innerHTML = originalButtonText;
                submitButton.disabled = false;
            });

            e.preventDefault();
        });
    }
});
</script>

<?php
get_template_part('template-parts/footer/footer');
get_footer();
?>
