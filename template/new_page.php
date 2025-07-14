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
        <div class="text_h2 pt-4">
            <h1><?php the_title(); ?></h1>
        </div>
		<div class="new_page_style py-4">
			<?php if ( have_posts() ): while ( have_posts() ):the_post();?>
				<?php the_content();?>
			<?php endwhile;?>
			<?php else: ?>
			<?php endif;?>
		</div>
        <div class="text_h2">
            <h2>Travel blog 2025</h2>
        </div>
        <div id="content_blogs" class="py-4">
            <div class="content_blogs_single">
                <?php
                    $args = array(
                        'posts_per_page' => '3',
                        'post_status' => 'publish',
                        'category_name' => 'blog-sacred-valley',
                    );
                    
                    $blogs = new WP_Query($args);
                    if($blogs->have_posts()) {
                        while($blogs->have_posts()) {
                            $blogs->the_post();
                ?>
                            <div class="item_blog animacionEntrada">
                                <a class="item_blog_img" href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium-large');
                                    } ?>
                                </a>
                                <div class="item_blog_text">
                                    <span class="read_blog"><i class="bi bi-clock-history"></i> <?php echo get_field("duracion_de_lectura")?get_field("duracion_de_lectura"):"6 min."; ?> <span> reading</span></span>
                                    <?php
                                        $tags = get_the_tags();

                                        if ($tags) {
                                            foreach ($tags as $tag) {
                                                echo '<span class="read_blog"><i class="bi bi-geo-alt"></i> ';
                                                echo esc_html($tag->name);
                                                echo '</span>';
                                            }
                                        }
                                    ?>
                                    <h3>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <?php the_excerpt(); ?>
                                    <div class="autor_item_blog row justify-content-start">
                                        <div class="col-auto"><i class="bi bi-calendar-event"></i> <?php echo get_the_date(); ?></div>
                                        <div class="col-auto"><i class="bi bi-person-circle"></i> <?php the_author(); ?></div>
                                    </div>
                                    
                                </div>
                            </div>
                <?php
                        }
                    }
                    else {
                        echo '<p class="not_found">No blogs found.</p>';
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="py-4">
            <?php get_template_part('template-parts/reviews') ?>
        </div>
        <div class="py-4">
            <?php get_template_part('template-parts/certificados') ?>
        </div>
    </div>
<?php
// ****************
//foooter
//********************** */
get_footer();
?>