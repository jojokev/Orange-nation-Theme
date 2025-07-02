<div class="banner_create">
    <?php echo the_post_thumbnail('full-size') ?>
    <h1><?php the_title(); ?></h1>
</div>
<div class="container">
    <div class="package_peru">
        <div>
            <?php the_content(); ?>
        </div>
        <div class="">
            <div class="content_package">
                <?php
                    $categoria = "packages";
                    $toursofperu = get_posts([
                        'post_type' => 'post',
                        'numberposts' => 4, //cantidad de entradas
                        'order' => 'ASC',
                        'ignore_sticky_posts' => 0,
                        'category_name' => $categoria
                    ]);

                    foreach ($toursofperu as $post) :
                ?>
                <div class="item_package">
                    <div class="package_img">
                        <?php echo the_post_thumbnail('large') ?>
                    </div>
                    <div class="package_text">
                        <div>
                            <div>
                                <span>family</span>
                                <span>Adventure</span>
                                <span>Explorer</span>
                            </div>
                            <h3>
                                <a href="<?php the_permalink()?>"><?php the_title(); ?></a>
                            </h3>
                            <ul>
                                <span>4.8</span>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </ul>
                            <div>
                                <?php echo get_field('description'); ?>
                            </div>
                            <p>
                                <strong>Destinations:</strong>
                                <span><?php echo get_field('destinos'); ?></span>
                            </p>
                            <p>
                                <strong>Age Range:</strong>
                                <span>10 to 79 year olds</span>
                            </p>
                            <p>
                                <strong>Operated in:</strong>
                                <span>English, Spanish</span>
                            </p>
                            <p>
                                <strong>Operated in:</strong>
                                <span>English, Spanish</span>
                            </p>
                        </div>
                        <div>
                            <div>
                                <p>Duration:</p>
                                <strong>
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
                                </strong>
                            </div>
                            <div>
                                <p>From:</p>
                                <strong><?php echo the_field('from'); ?><sup>USD</sup></strong>
                            </div>
                            <a href="<?php the_permalink(); ?>">View Itinerary</a>
                            <button type="button" data-title="<?php the_title(); ?>" class="btn_reservar">Book Now</button>
                        </div>
                    </div>
                </div>
                <?php  endforeach;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
        <h2>Personalize your Trip</h2>
        <div id="package"></div>
    </div>
</div>