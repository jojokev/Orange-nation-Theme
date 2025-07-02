<?php
// ****************
//encabezado
//********************** */
get_header();
?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
        if (in_category('blog-sacred-valley')) {
            get_template_part('template-parts/template-blog');
        } elseif (in_category('social-projects')) {
            get_template_part('template-parts/template-single');
        } else {
            get_template_part('template-parts/template-tours');
        }
    ?>
    <?php endwhile; endif; ?>
<?php
// ****************
//foooter
//********************** */
get_footer();
?>