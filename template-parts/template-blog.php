<div>
    <div class="estilos__blog">
        <div class="breadcrumb">
            <a href="<?php echo site_url(); ?>">Home</a>
            <i class="bi bi-arrow-right-short"></i>
            <a href="<?php echo site_url('/peru-machu-picchu-travel-guide/'); ?>">Blog</a>
            <i class="bi bi-arrow-right-short"></i>
            <span><?php the_title(); ?></span>
        </div>
        <h1><?php  the_title(); ?></h1>
        <div class="banner_single">
            <?php echo the_post_thumbnail('full-size') ?>
        </div>
        <div class="columns_blogs_category">
            <div class="wrapper_items_blogs">
                <?php the_content(); ?>
                <?php wpb_posts_nav(); ?>
                                <?php
                // Obtener la URL actual de la página
                $current_url = urlencode( get_permalink( get_queried_object_id() ) );
                ?>
                <div class="share_buttons_blogs alert alert-light">
                    <p class=""><i class="bi bi-share me-2"></i> Share this article:</p>
                    <a href="https://wa.me/?text=<?php echo $current_url; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="WhatsApp">
                        <i class="bi bi-whatsapp"></i> 
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Facebook">
                        <i class="bi bi-facebook"></i> 
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo $current_url; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="X (Twitter)">
                        <i class="bi bi-twitter-x"></i> 
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_url; ?>&title=Tu+titulo+personalizado" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="LinkedIn">
                        <i class="bi bi-linkedin"></i> 
                    </a>
                    <a href="https://t.me/share/url?url=<?php echo $current_url; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Telegram">
                        <i class="bi bi-telegram"></i> 
                    </a>
                    <a href="mailto:?subject=Check this page&body=<?php echo $current_url; ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Email">
                        <i class="bi bi-envelope-fill"></i> 
                    </a>
                    <a href="https://pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pinterest">
                        <i class="bi bi-pinterest"></i> 
                    </a>
                </div>
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
    </div>
   <div class="container">
        <div class="text_h2">
            <h2>More Related Posts that may Interest You</h2>
        </div>
        <div class="content_blogs_single" id="content_blogs">
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
        <?php get_template_part('template-parts/reviews') ?>
        <?php get_template_part('template-parts/certificados') ?>
   </div> 
</div>  
<button id="top_button">
    <i class="bi bi-arrow-up-short"></i>
</button>
<script>

</script>