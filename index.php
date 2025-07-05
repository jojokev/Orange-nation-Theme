<?php
// ****************
//encabezado polygon(0% 0%, 100% 0%, 100% 175%, 0% 0%)
//********************** */
get_header();
?>


<section class="banner-home-page">
    <div class="banner-home-text">
        <span>The best way to get to the 7th wonder of the world</span>
            <h1><strong>Inca Trail</strong> Treks to Machu Picchu 2026</h1>
        <p>Discover the incredible Inca ruins, flora, fauna and magnificent landscapes along our incredible Inca Trail to Machu Piucchu tour.</p>
        <a href="<?php echo get_permalink(2695); ?>" class="btn btn-primary w-content text-light">Explore more <i class="bi bi-arrow-right-short"></i></a>
    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/travelers-choise-orange.png" alt="Tripadvisor" class="tripadvisor-home-banner">
    <div class="banner-home-img">
        <img src="https://www.orange-nation.com/wp-content/uploads/2018/07/inca-trail-to-machupicchu-1-day-1.jpg">
    </div>
    <!-- background: url(https://www.orange-nation.com/wp-content/uploads/2025/07/img-persona-machu-picchu.webp -->
    <div class="banner-home-background" style="background: url(https://www.orange-nation.com/wp-content/uploads/2025/07/banner-fondo-machu-picchu.webp) left top no-repeat fixed;">
        <span id="span-banner-background-home-1"></span>
        <span id="span-banner-background-home-2"></span>
        <span id="span-banner-background-home-3"></span>
        <span id="span-banner-background-home-4"></span>
    </div>
</section>
<div class="py-5">
    <div class="container-xl">
        <div class="col-about-home">
            <div class="col-about-home-img">
                <?php  echo wp_get_attachment_image(16546,'full-size') ?>
                <!-- <?php  echo wp_get_attachment_image(16551,'full-size') ?> -->
            </div>
            <div class="col-about-home-text">
                <span class="bg-img">
                    WELCOME
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/svg/fondo.svg" alt="">
                </span>
                <h2>Join Orange Nation <span>Peru</span></h2>
                <h3>Unforgettable Once in a Lifetime Experience</h3>
                <p>
                    <strong>Orange Nation Peru</strong> is a family-owned Travel Company and Tour Operator located in the heart of the Inca Empire, Cusco Peru. We pride ourselves in creating individual customized tours and treks to all the famous Peruvian attractions as well as specializing in untouched wilderness, off the beaten track locations high in Andes Mountains of Peru.
                </p>
                <div class="features-about-home-text">
                    <div class="items-features-about-home">
                        <ul>
                            <li>Excellent quality at the best price</li>
                            <li>Proud of our roots</li>
                            <li>Unique and little explored routes</li>
                            <li>Experience the culture up close.</li>
                        </ul>
                        <a href="<?php echo get_permalink(5940); ?>" class="btn btn-primary text-light">About us <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                    <div class="button-features-about-home">
                        <a data-fslightbox href="https://www.youtube.com/watch?v=mnR1EuhJvX8">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/fondo-video.png" alt="video">
                            <i class="bi bi-play-circle"></i>
                            <p>Watch video</p>
                        </a>
                    </div>
                </div>
                <a href="https://www.tripadvisor.com/Attraction_Review-g294314-d15026178-Reviews-Orange_Nation_Peru-Cusco_Cusco_Region.html" target="_blank" class="info-reviews-button">
                    <div class="title-info-reviews-button">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/iconos/tripadvisor-icon.png" alt="Tripadvisor">
                        <p>
                            <strong>Tripadvisor</strong>
                            <span>Reviewed by</span>
                        </p>
                    </div>
                    <div class="text-info-reviews-button">
                        <p>
                            <strong>5.0</strong>
                            <i class="bi bi-circle-fill"></i>
                            <i class="bi bi-circle-fill"></i>
                            <i class="bi bi-circle-fill"></i>
                            <i class="bi bi-circle-fill"></i>
                            <i class="bi bi-circle-fill"></i>
                        </p>
                        <span>645 reviews</span>
                    </div>
                    <a href="#"></a>
                </a>
            </div>
        </div>
        <div class="highlights-home-page">
            <div class="item-highlight-home">
                <i class="bi bi-sliders"></i>
                <h2>Authentic and personalized experiences</h2>
                <p><strong>Customization</strong></p>
                <span>We design unique tours through Peru, tailored just for you.</span>
            </div>
            <div class="item-highlight-home">
                <i class="bi bi-star-fill"></i>
                <h2>Leadership with real-world experience</h2>
                <p><strong>Track Record</strong></p>
                <span>Our team understands service from the ground up to excellence.</span>
            </div>
            <div class="item-highlight-home">
                <i class="bi bi-people-fill"></i>
                <h2>Small groups, deeper connection</h2>
                <p><strong>Connection</strong></p>
                <span>Small groups for closer and safer attention.</span>
            </div>
            <div class="item-highlight-home">
                <i class="bi bi-headset"></i>
                <h2>Personalized attention at all times</h2>
                <p><strong>Commitment</strong></p>
                <span>We take care of every detail before, during, and after your trip.</span>
            </div>
        </div>
    </div>
</div>
<div class="bg-1">
    <div class="container-xl">
        <div class="text_h2">
            <span class="bg-img m-auto mb-2">
                Discover
                <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/svg/fondo.svg" alt="">
            </span>
            <h2>Inca Trail to Machu Picchu <span>2026</span></h2>
        </div>
        <div class="content_inca_trail">
            <div class="item_inca_trail">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'post__in' => array(1536,1535,1534)
                    );
                    $toursofperu_query = new WP_Query($args);
                    
                    if ($toursofperu_query->have_posts()) :
                        while ($toursofperu_query->have_posts()) : $toursofperu_query->the_post();
                ?>
                <div class="inca-trail-card-tour">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('medium_large');
                    } ?>
                    <div class="text-inca-trail">
                        <div class="col-text-inca-trail">
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
                                <?php }  ?>
                            </span>
                            <span><?php echo get_field('description'); ?></span>
                        </div>
                        <div class="price-inca-trail">
                            <span>From</span>
                            <strong>$<?php echo the_field('from'); ?></strong>
                            <span>per person</span>
                            <a class="btn btn-primary text-light" href="<?php the_permalink(); ?>">See more</a>
                        </div>
                        <span class="recommended">Recommended<i class="bi bi-heart-fill"></i></span>
                    </div>
                </div>
                <?php
                        endwhile;
                    wp_reset_postdata();
                endif;
                ?>
                <div class="buttons-inca-trail">
                    <a href="<?php echo esc_url( get_permalink(2695) ); ?>" class="btn btn-primary text-light mb-2">Explore all tours <i class="bi bi-arrow-right-short"></i></a>
                    <a href="<?php echo esc_url( get_permalink(7325) ); ?>" class="btn btn-secondary text-light mb-2">Check availability <i class="bi bi-calendar2-check-fill"></i></a>
                </div>
            </div>
            <div class="item-text-inca-trail">
                <img src="https://www.orange-nation.com/wp-content/uploads/2018/07/classic-inca-trail-1.jpg" alt="Inca Trail Trek">
                <h3>Inca Experience: A Journey in Time</h3>
                <p>
                    The Inca Trail is often known simply by its name: "The Inca Trail." It is a famous trekking route in Peru that leads to the ancient Inca city of Machu Picchu. This trail is famous for its stunning natural beauty, archaeological sites and historical importance. While there is no specific title or alternative name for the Inca Trail itself, it is sometimes described as the "Inca Trail to Machu Picchu" to emphasize its destination.
                </p>
            </div>
        </div>
    </div> 
</div>
<div class="py-5">
    <div class="container-xl">
        <div class="content-title-section">
            <div class="title-section">
                <span>Machu Picchu</span>
                <h2>Travel to Machu Picchu from Cusco</h2>
            </div>
            <div class="description-title-section">
                <p>Explore Machu Picchu through our unforgettable tours and hikes, including the Classic Inca Trail and the adventurous Salkantay Trek. Each trip offers a unique opportunity to immerse yourself in Inca history and culture, culminating with the stunning view of Machu Picchu, one of the wonders of the world.</p>
            </div>
        </div>
        <div class="swiper mySwiper swiperTour">
            <div class="swiper-wrapper">
                <?php
                    $toursofperu = get_posts([
                        'post_type' => 'post',
                        'numberposts' => 6, //cantidad de entradas
                        'order' => 'DESC',
                        'ignore_sticky_posts' => 0,
                        'cat' => 976
                    ]);

                    foreach ($toursofperu as $post) :
                ?>
                    <?php get_template_part('template-parts/cards-tour-1'); ?>
                <?php  endforeach;
                 wp_reset_postdata();
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<div class="bg-2">
    <div class="container-xl">
        <div class="text_h2">
            <h2 class="text-light">Creating trips for every travel style</h2>
            <p>Immerse yourself in the rich history and culture of Peru. Tour the ancient ruins of Machu Picchu, stroll through the colonial streets of Cusco, enjoy an unforgettable family vacation.</p>
        </div>
        <div class="swiper destination">
            <div class="swiper-wrapper">
                <?php
                    $args = array(
                        'post_type' => 'page',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'post__in' => array(7325, 2696, 11686, 11949, 2694, 11282)
                    );
                    $toursofperu_query = new WP_Query($args);
                    
                    if ($toursofperu_query->have_posts()) :
                        $counter = 0; 
                        while ($toursofperu_query->have_posts()) : $toursofperu_query->the_post();
                            $counter++;
                            if ($counter == 1) {
                                $price = '327$';
                                $tour = '10';
                            } elseif ($counter == 2) {
                                $price = '477$';
                                $tour = '4';
                            }elseif ($counter == 3) {
                                $price = '45$';
                                $tour = '5';
                            }elseif ($counter == 4) {
                                $price = '45$';
                                $tour = '9';
                            }
                            else {
                                $price = '537$';
                                $tour = '4';
                            }
                ?>
                        <div class="swiper-slide">
                            <div class="item_destination">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="destination_img">
                                        <?php 
                                            $image = get_field('imagen_de_categoria');
                                            if($image){
                                                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
                                            } else{
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail('list_articles_thumbs');
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="destination_text">
                                        <h3>
                                            <?php the_title(); ?> 
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                    endif;
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>  
</div>
<div class="py-5">
    <div class="container-xl">
        <div class="content-title-section">
            <div class="title-section">
                <span>Cusco</span>
                <h2>Classic Tours in Cusco</h2>
            </div>
            <div class="description-title-section">
                <p>Discover the magic of Cusco through our classic tours, featuring iconic experiences like the Sacred Valley, the Classic Inca Trail, and guided visits to ancient Inca sites. Each journey offers a deep connection to Peru’s rich history and culture, leading you to unforgettable moments in the heart of the Andes.</p>
            </div>
        </div>
        <div class="swiper mySwiper swiperTour">
            <div class="swiper-wrapper">
                <?php
                    $toursofperu = get_posts([
                        'post_type' => 'post',
                        'numberposts' => 6, //cantidad de entradas
                        'order' => 'desc',
                        'ignore_sticky_posts' => 0,
                        'cat' => 978
                    ]);

                    foreach ($toursofperu as $post) :
                ?>
                    <?php get_template_part('template-parts/cards-tour-2'); ?>
                <?php  endforeach;
                wp_reset_postdata();
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<div class="py-5 bg-1">
   <div class="container-xl">
        <div class="fill-home">
            <div class="fill-col-home">
                <div class="title-fill-home">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/iconos/cook.png" alt="Cook Icon">
                    <h2>Food On The Trek With Orange Nation</h2>
                </div>
                <p>
                    The primary ingredients found in nearly every Peruvian dish is rice, potatoes, chicken, pork, lamb and fish. For lunch and dinner, condiments on the table almost always include a small dish of “aji,” Peruvian hot pepper.
                </p>
                <p>
                    Ají can vary in color, being yellow, red or green. Color is not always indicative of how spicy an individual pepper is! Today more than 2,000 varieties of potatoes can be found in the Cusco region.
                </p>
                <a href="<?php echo esc_url( get_permalink(3713) ); ?>" class="btn1">More information</a>
            </div>
            <div class="fill-col-home">
                <img src="<?php echo IMGS_URL?>Food-on-the-trek-with-orange-nation.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container-xl">
        <div class="text_h2">
            <h2>Our Travel Blogs</h2>
        </div>
        <div id="content_blogs">
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

    </div>
</div>
<div class="py-5 bg-1">
    <div class="social_project">
        <div class="container-xl">
            <div class="fill-home">
                <div class="fill-col-home">
                    <div class="title-fill-home">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/iconos/social-icon.png" alt="Cook Icon">
                        <h2>Our Social Responsibility</h2>
                    </div>
                    <h3>20 % of our Profit goes to our Social Projects</h3>
                    <p>
                        Orange Nation Peru is a company that has a social responsibility to contribute to the well-being of society and the environment in which it operates. As a socially responsible organization, Orange Nation Peru strives to create a positive impact on the communities it serves and the environment in which it operates.
                    </p>
                    <p>
                        This commitment to social responsibility is reflected in the company’s actions and policies, including:
                    </p>
                    <a href="<?php echo esc_url( get_permalink(2576) ); ?>" class="btn1">More information <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="fill-col-home">
                    <div class="galeria_social">
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => -1,
                                'order' => 'ASC',
                                'post__in' => array(5522,2607,2609)
                            );
                            $toursofperu_query = new WP_Query($args);
                            
                            if ($toursofperu_query->have_posts()) :
                                $counter = 0; 
                                while ($toursofperu_query->have_posts()) : $toursofperu_query->the_post();
                                ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium_large');
                                } ?>
                                <h4><?php the_title(); ?></h4>
                            </a>
                        <?php
                            endwhile;
                                wp_reset_postdata();
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <?php get_template_part('template-parts/reviews') ?>
</div>
<div class="py-5">
    <?php get_template_part('template-parts/certificados') ?>
</div>
<?php
// ****************
//foooter
//********************** */
get_footer();
?>