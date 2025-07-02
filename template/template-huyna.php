<?php
/* 
 * Template Name: Nueva Plantilla
 * Template Post Type: post
*/
get_header();
?>
<section class="">
    <?php if (has_post_thumbnail()): ?>
        <div class="banner_single">
            <?php the_post_thumbnail('full-size'); ?>
        </div>
        <div class="text_h2">
            <h1><?php the_title(); ?></h1>
        </div>
    <?php else: ?>
        <div class="text_h2">
            <h1><?php the_title(); ?></h1>
        </div>
    <?php endif; ?>
</section>
<div class="container">
    <div class="page_plantilla">
        <?php the_content(); ?>
    </div>
    <?php get_template_part('template-parts/certificados') ?>
</div>
<?php
get_footer();
?>