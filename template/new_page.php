<?php 
/*
 * Template Name: new page
 * Template Post Type: page
 */
get_header();?>
    <section class="new_page_content">
        <?php echo the_post_thumbnail('full-size') ?>
    </section>
    <div class="container-xl">
        <div class="text_h2">
            <h1><?php the_title(); ?></h1>
        </div>
		<div class="new_page_style">
			<?php if ( have_posts() ): while ( have_posts() ):the_post();?>
				<?php the_content();?>
			<?php endwhile;?>
			<?php else: ?>
			<?php endif;?>
		</div>
        <div class="text_h2">
            <h2>Travel blog 2024</h2>
        </div>
        <div class="content_blog">
            <?php
                $categoria = "blog-sacred-valley";
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3, // cantidad de entradas
                    'order' => 'DESC',
                    'ignore_sticky_posts' => 1,
                    'category_name' => $categoria,
                    'paged' => $paged
                );

                $toursofperu = new WP_Query($args);

                if ($toursofperu->have_posts()) :
                    while ($toursofperu->have_posts()) : $toursofperu->the_post();
            ?>
            <article class="new_blog_item">
                <figure class="item_blog_img">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('medium-large');
                        } ?>
                    </a>
                </figure>
                <div class="item_blog_text">
                    <?php if (get_field('blog_categoria')) : ?>
                        <span>
                            <?php the_field('blog_categoria') ?>
                        </span>
                    <?php endif; ?>
                    <h3>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
        <?php get_template_part('template-parts/reviews') ?>
        <?php get_template_part('template-parts/certificados') ?>
    </div>
<?php
// ****************
//foooter
//********************** */
get_footer();
?>