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
    <div class="text_h2 py-5">
        <h1><?php the_title(); ?></h1>
        <?php echo get_field("descripcion_de_la_categoria");?>
    </div>
</section>
<section class="bg-4">
    <div class="container-xl">
        <div class="text_h2">
            <h2>Why are we your best option?</h2>
            <p>Discover the difference of traveling with experts who care about every detail of your experience.</p>
        </div>
        <div class="swiper mySwiper swiper-about-us">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="item-highlight-home">
                        <i class="bi bi-sliders"></i>
                        <h2>Authentic and personalized experiences</h2>
                        <p><strong>Customization</strong></p>
                        <span>We design unique tours through Peru, tailored just for you.</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item-highlight-home">
                        <i class="bi bi-star-fill"></i>
                        <h2>Leadership with real-world experience</h2>
                        <p><strong>Track Record</strong></p>
                        <span>Our team understands service from the ground up to excellence.</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item-highlight-home">
                        <i class="bi bi-people-fill"></i>
                        <h2>Small groups, deeper connection</h2>
                        <p><strong>Connection</strong></p>
                        <span>Small groups for closer and safer attention.</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item-highlight-home">
                        <i class="bi bi-headset"></i>
                        <h2>Personalized attention at all times</h2>
                        <p><strong>Commitment</strong></p>
                        <span>We take care of every detail before, during, and after your trip.</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item-highlight-home">
                        <i class="bi bi-tags"></i>
                        <h2>Excellent quality at the best price</h2>
                        <p><strong>Value</strong></p>
                        <span>We offer exceptional service and unforgettable experiences without overpaying. </span>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
<?php if(get_the_ID()!=2698){ ?>
    <section class="bg-2">
        <div class="container-xl">
            <div class="text_h2 ">
                <h2>Top-Rated Experience</h2>
                <p>Chosen by travelers for its perfect mix of adventure, culture, and scenery.</p>
            </div>
            <div class="featured-tour-category">
                <?php
                    $toursofperu = get_posts([
                        'post_type' => 'post',
                        'p' => get_field("id_de_tour_destacado"), 
                    ]);
                    foreach ($toursofperu as $post) :
                ?>
                    <div class="col-text-featured-tour">
                        <h3><?php the_title(); ?></h3>
                        <div class="description-text">
                            <p><?php echo get_field("description"); ?></p>
                        </div>
                        <div class="price-text-tour">
                            <span>Price from</span>
                            <strong><i class="bi bi-currency-dollar"></i><?php echo the_field('from'); ?></strong>
                                / por person
                        </div>
                        <a href="<?php the_permalink(); ?>">View Itinerary <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="col-img-featured-tour">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('medium_large');
                        } ?>
                    </div>
                <?php  endforeach;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
<?php }?>
<section class="py-5">
    <div class="container-xl">
        <div class="article-itinerary">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php if(true){ ?><!-- get_the_ID()===2698 -->
    <section class="py-5">
        <div class="container-xl">
            <div class="item-category-tour">
                <div class="gal-item-category-tour">
                    <?php 
                        $image_ids = [17165, 12752, 16862, 12261, 17169];
                        foreach ($image_ids as $image_id) {
                            $image_url = wp_get_attachment_image_src($image_id, 'full');
                            if ($image_url) {
                                echo '<a href="' . esc_url($image_url[0]) . '" alt="Salkantay Trek" data-fslightbox="gallery-1">
                                        <img src="' . esc_url($image_url[0]) . '" alt="Imagen" class="mi-clase-img">
                                    </a>';
                            }
                        }
                    ?>
                </div>
                <div class="text-item-category-tour">
                    <h3>Salkantay Treks</h3>
                    <p>Discover one of the most stunning routes to Machu Picchu. The Salkantay Trek takes you through majestic Andean landscapes, subtropical forests, and breathtaking views of Mount Salkantay before reaching the legendary Inca citadel. Perfect for adventurers seeking a less crowded alternative to the Inca Trail.</p>
                    <div class="features-text-item-category">
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 20h.01M7 20v-4m5 4v-8m5 8V8"/></svg>
                            <h4>Difucultad:</h4>
                            <p>Moderado</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g fill="currentColor"><path d="M16 32c8.822 0 16-7.178 16-16S24.822 0 16 0S0 7.178 0 16s7.178 16 16 16m0-31c8.271 0 15 6.729 15 15s-6.729 15-15 15S1 24.271 1 16S7.729 1 16 1"/><path d="M20.061 21.768a.5.5 0 0 0 .708 0a.5.5 0 0 0 0-.707L16 16.293V9.319a.5.5 0 0 0-1 0V16.5c0 .133.053.26.146.354z"/><circle cx="4" cy="16" r="1"/><circle cx="28" cy="16" r="1"/><circle cx="16" cy="4" r="1"/><circle cx="16" cy="28" r="1"/><circle cx="8" cy="8" r="1"/><circle cx="24" cy="24" r="1"/><circle cx="25" cy="8" r="1"/><circle cx="8" cy="24" r="1"/></g></svg>
                            <h4>Duration:</h4>
                            <p>desde 2 dias</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"><path d="M1 20v-1a7 7 0 0 1 7-7v0a7 7 0 0 1 7 7v1"/><path d="M13 14v0a5 5 0 0 1 5-5v0a5 5 0 0 1 5 5v.5"/><path stroke-linejoin="round" d="M8 12a4 4 0 1 0 0-8a4 4 0 0 0 0 8m10-3a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></g></svg>
                            <h4>Group Size:</h4>
                            <p>max. 8 personas</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="m18 10l-3 1.5l-4-3l-1 5.5l3.5 3l.5 4.5m4-13v13M10 17l-2 4.5m.5-13C7 9.5 6 12 6 12l2 1m4-6.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4"/></svg>
                            <h4>Type:</h4>
                            <p>Trekking</p>
                        </div>
                    </div>
                    <p class="price-tour"><strong>Precio:</strong> desde <span><i class="bi bi-currency-dollar"></i>45</span> / por persona</p>
                    <a href="#" class="btn-1">See all Inca Trail tours</a>
                </div>
            </div>
            <div class="item-category-tour">
                <div class="gal-item-category-tour">
                    <?php 
                        $image_ids = [17165, 12752, 16862, 12261, 17169];
                        foreach ($image_ids as $image_id) {
                            $image_url = wp_get_attachment_image_src($image_id, 'full');
                            if ($image_url) {
                                echo '<a href="' . esc_url($image_url[0]) . '" alt="Salkantay Trek" data-fslightbox="gallery-1">
                                        <img src="' . esc_url($image_url[0]) . '" alt="Imagen" class="mi-clase-img">
                                    </a>';
                            }
                        }
                    ?>  
                </div>
                <div class="text-item-category-tour">
                    <h3>Lares Treks</h3>
                    <p>Experience an authentic Andean journey away from the crowds. The Lares Trek combines scenic hikes, encounters with traditional communities, and unique views of the Andes before reaching Machu Picchu. Perfect for travelers seeking both living culture and natural beauty in one unforgettable adventure.</p>
                    <div class="features-text-item-category">
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 20h.01M7 20v-4m5 4v-8m5 8V8"/></svg>
                            <h4>Difucultad:</h4>
                            <p>Moderado</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g fill="currentColor"><path d="M16 32c8.822 0 16-7.178 16-16S24.822 0 16 0S0 7.178 0 16s7.178 16 16 16m0-31c8.271 0 15 6.729 15 15s-6.729 15-15 15S1 24.271 1 16S7.729 1 16 1"/><path d="M20.061 21.768a.5.5 0 0 0 .708 0a.5.5 0 0 0 0-.707L16 16.293V9.319a.5.5 0 0 0-1 0V16.5c0 .133.053.26.146.354z"/><circle cx="4" cy="16" r="1"/><circle cx="28" cy="16" r="1"/><circle cx="16" cy="4" r="1"/><circle cx="16" cy="28" r="1"/><circle cx="8" cy="8" r="1"/><circle cx="24" cy="24" r="1"/><circle cx="25" cy="8" r="1"/><circle cx="8" cy="24" r="1"/></g></svg>
                            <h4>Duration:</h4>
                            <p>desde 2 dias</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"><path d="M1 20v-1a7 7 0 0 1 7-7v0a7 7 0 0 1 7 7v1"/><path d="M13 14v0a5 5 0 0 1 5-5v0a5 5 0 0 1 5 5v.5"/><path stroke-linejoin="round" d="M8 12a4 4 0 1 0 0-8a4 4 0 0 0 0 8m10-3a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></g></svg>
                            <h4>Group Size:</h4>
                            <p>max. 8 personas</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="m18 10l-3 1.5l-4-3l-1 5.5l3.5 3l.5 4.5m4-13v13M10 17l-2 4.5m.5-13C7 9.5 6 12 6 12l2 1m4-6.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4"/></svg>
                            <h4>Type:</h4>
                            <p>Trekking</p>
                        </div>
                    </div>
                    <p class="price-tour"><strong>Precio:</strong> desde <span><i class="bi bi-currency-dollar"></i>45</span> / por persona</p>
                    <a href="#" class="btn-1">See all Inca Trail tours</a>
                </div>
            </div>
            <div class="item-category-tour">
                <div class="gal-item-category-tour">
                    <?php 
                        $image_ids = [17165, 12752, 16862, 12261, 17169];
                        foreach ($image_ids as $image_id) {
                            $image_url = wp_get_attachment_image_src($image_id, 'full');
                            if ($image_url) {
                                echo '<a href="' . esc_url($image_url[0]) . '" alt="Salkantay Trek" data-fslightbox="gallery-1">
                                        <img src="' . esc_url($image_url[0]) . '" alt="Imagen" class="mi-clase-img">
                                    </a>';
                            }
                        }
                    ?> 
                </div>
                <div class="text-item-category-tour">
                    <h3>Rainbow Mountain treks</h3>
                    <p>Embark on a breathtaking hike through the high Andes to one of Peru’s most iconic natural wonders. The Rainbow Mountain trek offers stunning views of colorful striped hills, snow-capped peaks, and native wildlife. A must-do for nature lovers and adventure seekers.</p>
                    <div class="features-text-item-category">
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 20h.01M7 20v-4m5 4v-8m5 8V8"/></svg>
                            <h4>Difucultad:</h4>
                            <p>Moderado</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g fill="currentColor"><path d="M16 32c8.822 0 16-7.178 16-16S24.822 0 16 0S0 7.178 0 16s7.178 16 16 16m0-31c8.271 0 15 6.729 15 15s-6.729 15-15 15S1 24.271 1 16S7.729 1 16 1"/><path d="M20.061 21.768a.5.5 0 0 0 .708 0a.5.5 0 0 0 0-.707L16 16.293V9.319a.5.5 0 0 0-1 0V16.5c0 .133.053.26.146.354z"/><circle cx="4" cy="16" r="1"/><circle cx="28" cy="16" r="1"/><circle cx="16" cy="4" r="1"/><circle cx="16" cy="28" r="1"/><circle cx="8" cy="8" r="1"/><circle cx="24" cy="24" r="1"/><circle cx="25" cy="8" r="1"/><circle cx="8" cy="24" r="1"/></g></svg>
                            <h4>Duration:</h4>
                            <p>desde 2 dias</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"><path d="M1 20v-1a7 7 0 0 1 7-7v0a7 7 0 0 1 7 7v1"/><path d="M13 14v0a5 5 0 0 1 5-5v0a5 5 0 0 1 5 5v.5"/><path stroke-linejoin="round" d="M8 12a4 4 0 1 0 0-8a4 4 0 0 0 0 8m10-3a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></g></svg>
                            <h4>Group Size:</h4>
                            <p>max. 8 personas</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="m18 10l-3 1.5l-4-3l-1 5.5l3.5 3l.5 4.5m4-13v13M10 17l-2 4.5m.5-13C7 9.5 6 12 6 12l2 1m4-6.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4"/></svg>
                            <h4>Type:</h4>
                            <p>Trekking</p>
                        </div>
                    </div>
                    <p class="price-tour"><strong>Precio:</strong> desde <span><i class="bi bi-currency-dollar"></i>45</span> / por persona</p>
                    <a href="#" class="btn-1">See all Inca Trail tours</a>
                </div>
            </div>
            <div class="item-category-tour">
                <div class="gal-item-category-tour">
                    <?php 
                        $image_ids = [17165, 12752, 16862, 12261, 17169];
                        foreach ($image_ids as $image_id) {
                            $image_url = wp_get_attachment_image_src($image_id, 'full');
                            if ($image_url) {
                                echo '<a href="' . esc_url($image_url[0]) . '" alt="Salkantay Trek" data-fslightbox="gallery-1">
                                        <img src="' . esc_url($image_url[0]) . '" alt="Imagen" class="mi-clase-img">
                                    </a>';
                            }
                        }
                    ?>   
                </div>
                <div class="text-item-category-tour">
                    <h3>Choquequirao Treks</h3>
                    <p>Discover the “sacred sister of Machu Picchu.” These treks take you to one of the most remote and mysterious Inca cities, surrounded by breathtaking Andean landscapes. Perfect for adventurous travelers seeking challenging trails and off-the-beaten-path archaeological wonders.</p>
                    <div class="features-text-item-category">
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 20h.01M7 20v-4m5 4v-8m5 8V8"/></svg>
                            <h4>Difucultad:</h4>
                            <p>Moderado</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g fill="currentColor"><path d="M16 32c8.822 0 16-7.178 16-16S24.822 0 16 0S0 7.178 0 16s7.178 16 16 16m0-31c8.271 0 15 6.729 15 15s-6.729 15-15 15S1 24.271 1 16S7.729 1 16 1"/><path d="M20.061 21.768a.5.5 0 0 0 .708 0a.5.5 0 0 0 0-.707L16 16.293V9.319a.5.5 0 0 0-1 0V16.5c0 .133.053.26.146.354z"/><circle cx="4" cy="16" r="1"/><circle cx="28" cy="16" r="1"/><circle cx="16" cy="4" r="1"/><circle cx="16" cy="28" r="1"/><circle cx="8" cy="8" r="1"/><circle cx="24" cy="24" r="1"/><circle cx="25" cy="8" r="1"/><circle cx="8" cy="24" r="1"/></g></svg>
                            <h4>Duration:</h4>
                            <p>desde 2 dias</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"><path d="M1 20v-1a7 7 0 0 1 7-7v0a7 7 0 0 1 7 7v1"/><path d="M13 14v0a5 5 0 0 1 5-5v0a5 5 0 0 1 5 5v.5"/><path stroke-linejoin="round" d="M8 12a4 4 0 1 0 0-8a4 4 0 0 0 0 8m10-3a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></g></svg>
                            <h4>Group Size:</h4>
                            <p>max. 8 personas</p>
                        </div>
                        <div class="featured-text-item-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="m18 10l-3 1.5l-4-3l-1 5.5l3.5 3l.5 4.5m4-13v13M10 17l-2 4.5m.5-13C7 9.5 6 12 6 12l2 1m4-6.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4"/></svg>
                            <h4>Type:</h4>
                            <p>Trekking</p>
                        </div>
                    </div>
                    <p class="price-tour"><strong>Precio:</strong> desde <span><i class="bi bi-currency-dollar"></i>45</span> / por persona</p>
                    <a href="#" class="btn-1">See all Inca Trail tours</a>
                </div>
            </div>
        </div>
    </section>
<?php }?>
<section class="bg-4">
    <div class="container-xl">
        <div class="text_h2 ">
            <h2>Choose Your Next Adventure</h2>
            <p>Be inspired by our tours designed to connect you with the culture, nature and excitement of each destination.</p>
        </div>
        <div class="swiper mySwiper swiperTour">
            <div class="swiper-wrapper">
                <?php
                    $toursofperu = get_posts([
                        'post_type' => 'post',
                        'numberposts' => 11, 
                        'order' => 'DESC',
                        'ignore_sticky_posts' => 0,
                        'cat' => get_field("id_categoria"),
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
</section>
<?php if(get_field('texto_de_hightlights')){ ?>
    <section class="py-5">
        <div class="container-xl">
            <div class="text_h2 ">
                <h2>Trip Highlights</h2>
                <p>Essential stops, breathtaking views, and meaningful cultural encounters.</p>
            </div>
            <?php 
                echo get_field('texto_de_hightlights');
            ?>                                  
        </div>
    </section>
<?php }?>
<?php if(get_field('preguntas_frecuentes')){ ?>
    <section class="bg-4">
        <div class="container-xl">
            <div class="text_h2 ">
                <h2>Frequently Asked Questions</h2>
                <p>Everything you need to know before your adventure begins.</p>
            </div>
            <div class="faqs-category-tour">
                <?php 
                    echo get_field('preguntas_frecuentes');
                ?>
            </div>
        </div>
    </section>
<?php }?>
<div class="container-xl">
    <div class="py-5">
        <?php get_template_part('template-parts/reviews') ?>
    </div>
    <div class="py-4">
        <?php get_template_part('template-parts/certificados') ?>
    </div>
</div>


<?php
 get_footer();
?>