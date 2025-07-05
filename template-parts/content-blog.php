<div class="container-xl">
    <section class="banner__blog_category">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/machupicchu-guia.webp" alt="Guia en machupicchu">
        <div class="text_banner_blog_category">
            <h1>Our Blogs</h1>
            <p>Discover articles full of useful tips, travel recommendations, detailed guides and authentic experiences to make your visit to Cusco, Inca trail, Machu Picchu and other destinations in Peru unforgettable.</p>
            <form method="GET" action="<?php echo site_url('/peru-machu-picchu-travel-guide/'); ?>" id="form_blog_category">
                <input type="text" name="key" placeholder="Search...">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
            <span>Want more inspiration for your next trip?</span>
            <span>Follow us on our social networks to stay up to date with new blogs, travel tips and special promotions.</span>
        </div>
    </section>
</div>
<section class="container-xl ">
    <div class="columns_blogs_category">
        <div class="wrapper_items_blogs">
            <div class="title_items_blog">
                <?php 
                    $termino = isset($_GET['key']) ? sanitize_text_field($_GET['key']) : '';
                    if($termino){ 
                ?>
                    <h2>Results of: <strong><?php echo $termino; ?></strong></h2>
                <?php }else{?>
                    <h2>Explore Stories and Travel Guides</h2>
                <?php }?>
            </div>
            <div id="content_blogs">
                <?php
                    if($termino){
                        $args = array(
                            'posts_per_page' => '8',
                            'post_status' => 'publish',
                            'category_name' => 'blog-sacred-valley',
                            's' => $termino,
                        );
                    }
                    else{
                        $args = array(
                            'posts_per_page' => '8',
                            'post_status' => 'publish',
                            'category_name' => 'blog-sacred-valley',
                        );
                    }
                    
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
            <button id="more_blogs" search="<?php echo $termino?$termino:''; ?>" ajax-url="<?php echo admin_url("admin-ajax.php"); ?>">More Blogs</button>
            <span id="load-file" style="display: none;"><img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/gif/loading-7528_512.gif" alt="load blogs"></span>
        </div>
        <div class="col_information_blogs_category">
            <?php echo do_shortcode('[hoteles item_column=1]'); ?>
            <div class="sticky_page">
                <div class="aparment_blogs_page">
                    <img src="https://samapartmentsperu.com/wp-content/uploads/2024/11/slider-header-1-samapartmentsperu-1536x1025.jpg" alt="Sam Apartments Cusco">
                    <div class="texto_aparment_blogs_page">
                        <h3>Modern Apartments in Cusco</h3>
                        <a href="https://samapartmentsperu.com/" target="_blank" class="btn btn-light">More Information</a>
                    </div>
                </div>
                <div class="tags_blogs_page">
                    <h2>Travel Through Our Blogs</h2>
                    <a href="<?php echo get_permalink(11013); ?>">All blogs</a>
                    <?php
                        $all_tags = get_tags();

                        if ($all_tags) {
                            foreach ($all_tags as $tag) {
                                echo '<a href="' . get_tag_link($tag->term_id) . '" class="tag">';
                                echo esc_html($tag->name);
                                echo '</a> ';
                            }
                        } else {
                            echo 'No hay etiquetas disponibles.';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container-xl">
    <div class="py-4">
        <?php get_template_part('template-parts/reviews') ?>
    </div>
    <div class="py-4">
        <?php get_template_part('template-parts/certificados') ?>
    </div>
</section>
