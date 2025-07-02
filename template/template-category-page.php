<?php
/*
    Template Name: Categoria Page 
    Template Post Type: page
*/
get_header();
?>

<section class="banner_title_page">
    <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail(); ?>
    <?php endif; ?>
    <div class="text_banner_page">
        <span>Discover</span>
        <h1 class="h1_banner_page"><?php the_title(); ?></h1>
    </div>
</section>

<div class="content_description_category">
    <div class="container-xl">
        <div class="article_category_page">
            <?php echo get_field("texto_complementario"); ?>
        </div>
    </div>
</div>
<div class="container-xl main_content_category_page">
    <div class="page_plantilla">
        <div class="text_h2"><h2><?php the_title(); ?></h2></div>
        <?php the_content(); ?>
    </div>
    <div id="tours_page">
        <?php
            // Make sure this runs inside WordPress and ACF is active for get_field()
            $categoria = function_exists('get_field') ? get_field('id_categoria') : '';
            $current_page = max(1, get_query_var('paged') ? get_query_var('paged') : get_query_var('page'));
            $args = [
                'post_type' => 'post',
                'order' => 'ASC',
                'ignore_sticky_posts' => 0,
                'cat' => $categoria,
                'paged' => $current_page, 
            ];
            $tour_query = new WP_Query($args);
            if ($tour_query->have_posts()) :
                while ($tour_query->have_posts()) : $tour_query->the_post();
            ?>
                <div class="item_tour_new">
                    <div class="img_tour">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('medium_large');
                            } ?>
                        </a>
                        <span class="duration-img-tour"><i class="bi bi-clock-history"></i>4 Days - 3 Nights</span>
                        <span class="group-img-tour"><i class="bi bi-people"></i> <?php echo get_field('group_size'); ?></span>
                    </div>
                    <div class="text_tour">
                        <span><i class="bi bi-geo-alt"></i> Cusco</span>
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <span>
                            <i class="bi bi-clock-history"></i>
                            <?php $dias	= get_field('num_days'); ?>
                                <?php if ( $dias ) { ?>
                                    <?php echo $dias ?>
                                    <?php
                                        $values = $dias;
                                        if($values == 1) {
                                            if(APP_LANG=='en'){
                                                echo 'day';
                                            }else{
                                                echo 'dia';
                                            }
                                        } else {
                                            $night = $values - 1; 
                                            if(APP_LANG=='en'){
                                                echo 'days' , ' - ' , ''.$night.'',' nights';
                                            }else{
                                                echo 'días' , ' - ' , ''.$night.'',' noches';
                                            }
                                        }
                                    ?>
                                    <?php } else { ?>
                                    <?php if(APP_LANG=='en'){
                                            echo 'Half day';
                                        }else{
                                            echo 'Medio día';
                                        } 
                                    ?>
                            <?php } ?>
                        </span>
                        <!-- 
                        <span><i class="bi bi-reception-4"></i> <?php echo get_field('max_altitude'); ?></span> -->
                        <div class="description-text-tour">
                            <p><?php echo get_field('description'); ?></p>
                        </div>
                        <p class="price-text-tour">
                            <span>Price from</span>
                            <strong><i class="bi bi-currency-dollar"></i><?php echo the_field('from'); ?></strong>
                            / por person
                        </p>
                        <a href="<?php the_permalink(); ?>" class="link-text-tour">View Itinerary <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            <?php
                endwhile;
            else :
                echo '<p>No tours found.</p>';
            endif;

            $total_pages = $tour_query->max_num_pages;
            $pagination = paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => 'page/%#%/',
                'current' => $current_page,
                'total' => $total_pages,
                'type' => 'array'
            ));

            if ($pagination) {
                echo '<nav class="content_navegation">';
                echo '<ul class="pagination">';

                foreach ($pagination as $page) {
                    $page = str_replace('page-numbers', '', $page);
                    $page = str_replace('current', 'current active', $page);
                    echo '<li>' . $page . '</li>';
                }

                echo '</ul>';
                echo '</nav>';
            }

            wp_reset_postdata();
        ?>

    </div>
    <?php get_template_part('template-parts/certificados') ?>
</div>


<?php
 get_footer();
?>