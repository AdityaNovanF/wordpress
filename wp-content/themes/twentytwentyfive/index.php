<?php
get_header();
?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', get_post_format());
                endwhile;
                
                the_posts_pagination(array(
                    'prev_text' => '&laquo; Sebelumnya',
                    'next_text' => 'Selanjutnya &raquo;'
                ));
            else :
                echo '<p>Tidak ada konten yang ditemukan.</p>';
            endif;
            ?>
        </div>
        <div class="col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
