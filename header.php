<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#f7520a">
    <meta name="author" content="Juan carlos Serrano">
    <meta name="twitter:site" content="<?php echo get_bloginfo('url') . '/' ?>" />
    <meta name="twitter:title" content="<?php wp_title('&laquo;', true, 'right'); ?>" />
    <meta name="twitter:image" content="<?php echo (get_the_post_thumbnail_url(get_the_ID())); ?>" />
    <meta name="twitter:description" content="<?php echo get_the_excerpt() ?>" >
    <meta name="google-site-verification" content="XpEF5ogx91RuQrnPAF_dVGgWoKfy1nffyqluq1YpdOo" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> -->

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
    
</head>
<body style="background: url(<?php echo get_template_directory_uri(); ?>/assets/imagenes/fondos/fondo-section-page.webp) center center fixed;">
    <section class="header_principal">
        <div class="header_1">
            <div class="content_header_1">
                <div>
                    <!-- 
                    <a href="https://www.google.com/maps/place/Orange+Nation+Peru/@-13.5176143,-71.9830881,17z/data=!3m1!4b1!4m6!3m5!1s0x916dd7915e83af1b:0xc022743fb971005f!8m2!3d-13.5176195!4d-71.9805132!16s%2Fg%2F11gmjzds1_?entry=ttu" target="_black">
                        Garcilaso Street 210
                    </a> -->
                    <a href="mailto:orangenationperu@gmail.com">
                        <i class=" bi bi-envelope"></i>
                        orangenationperu@gmail.com
                    </a>
                </div>
                <div>
                    <ul>
                        <li>
                            <a href="<?php echo esc_url( get_permalink(3104) ); ?>">Payment</a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( get_permalink(11013) ); ?>">Our Travel Blog</a>
                        </li>
                        <li>
                            <a href="https://www.tripadvisor.com/Attraction_Review-g294314-d15026178-Reviews-Orange_Nation_Peru-Cusco_Cusco_Region.html" target="_black">Reviews</a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( get_permalink(7325) ); ?>">
                                 Inca Trail availability
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="info_header">
            <?php 
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                }   
            ?>
            <div class="item_header">
                <div>
                    <a href="tel:992126224"><strong>Call us</strong> +51 992 126 224 </a>
                    <a href="mailto:orangenationperu@gmail.com"><i class="bi bi-envelope"></i>orangenationperu@gmail.com</a>
                    <a href="tel:+51992126224"><i class="bi bi-whatsapp"></i>+51 992 126 224</a>
                </div>
            </div>
        </div>
        <header class="menu_content">
            <div clasS="header_resp">
                <?php 
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }   
                ?>
                <button class="btn_menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'principal',
                        'menu_class'      => 'menu-wrapper',
                        'container'			=> "",
                        'items_wrap'      => '<nav><ul class="menu">%3$s</ul></nav>',
                        'fallback_cb'     => false,
                    )
                );
            ?>
            <div class="menu_item">
                <a href="<?php echo esc_url( get_permalink(16840) ); ?>">
                    Create Packages <i class=" bi bi-arrow-right"></i>
                </a>
            </div>
        </header>
    </section>
    <div class="menu_details">
        <div class="item_detalis">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem optio corporis eius! Corporis enim dolor, unde mollitia accusamus eaque voluptatibus ducimus quae expedita debitis deserunt qui consequatur dolores, numquam voluptate?
            </p>
        </div>
    </div>
    <div class="content_whatsap">
        <div class="header_whatsap">
            <i class="bi bi-whatsapp"></i>
            <div>
                <h4>Start a conversation</h4>
                <p>
                    Hello! Click on one of our members below to chat on Whatsapp  
                </p>
            </div>
        </div>
        <div class="text_whatsap">
            <span>The team usually responds within a few minutes.</span>
            <a href="https://wa.link/m3lijw" target="_black">
                <i class="bi bi-whatsapp"></i>
                +51 939 320 227
            </a>
            <a href="https://wa.link/tszhgv" target="_black">
                <i class="bi bi-whatsapp"></i>
                +51 992 126 224
            </a>
        </div>
    </div>
    <div class="btn_whatsap">
        <span>Need help? <strong> Speak with us</strong></span>
        <button type="button"><i class="bi bi-whatsapp"></i></button>
    </div>
    <script>
        const btnWhatsap = document.querySelector('.btn_whatsap');
        const contentWhatsap = document.querySelector('.content_whatsap');
        const modalMenu = document.querySelector('.menu_details');
        btnWhatsap.addEventListener("click", function() {
            contentWhatsap.classList.toggle('active');
            btnWhatsap.classList.toggle('active');
        });
    </script>