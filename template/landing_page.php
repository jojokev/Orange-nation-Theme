<?php 
/*
 * Template Name: Landing Page
 * Template Post Type: page
 */
get_header();
 
?>
<section class="">
    <div class="banner_single">
        <?php echo the_post_thumbnail('full-size') ?>
    </div>
    <div class="container-xl">
        <div class="text_h2">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="page_content">
            <?php the_content();?>
        </div>
    </div>
</section>
<br>
<div class="container-xl">
    <?php get_template_part('template-parts/reviews') ?>
    <?php get_template_part('template-parts/certificados') ?>
</div>
<?php get_footer();?>