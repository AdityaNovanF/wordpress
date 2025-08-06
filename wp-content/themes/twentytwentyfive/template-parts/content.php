<?php
/**
 * Template part for displaying posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail mb-4">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
            </a>
        </div>
    <?php endif; ?>

    <header class="entry-header mb-4">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>

        <div class="entry-meta text-muted">
            <small>
                <?php
                echo 'Dipublikasi pada ' . get_the_date('j F Y');
                echo ' oleh ' . get_the_author();
                ?>
            </small>
        </div>
    </header>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
        else :
            the_excerpt();
            ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                Baca Selengkapnya
            </a>
        <?php endif; ?>
    </div>
</article>
