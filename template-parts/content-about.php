<div class="">
    <div class="about_single">
        <?php echo the_post_thumbnail('full-size') ?>
    </div>
    <div class="text_h2">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="style_about">
        <?php the_content(); ?>
    </div>
    <div class="container-xl">
        <?php get_template_part('template-parts/reviews') ?>
        <?php get_template_part('template-parts/certificados') ?>
    </div>
</div>