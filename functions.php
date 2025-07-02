<?php
 require_once(get_template_directory() . "/class/navegation.php");
 require_once(get_template_directory() . "/class/gallery.php");
 require_once(get_template_directory() . "/class/shortcode.php");
 require_once(get_template_directory() . "/class/acf.php");
// require_once(get_template_directory() . "/inc/src/pear-template.php");
// require_once(get_template_directory() . "/inc/src/pear-email.php");

//obtiene el idioma actual
if (!defined('APP_LANG'))
    define('APP_LANG', substr(get_bloginfo('language'), 0, 2));
//declaramos una constante con la ruta con la carpeta delas imagenes
if (!defined('IMGS_URL'))
    define('IMGS_URL', get_template_directory_uri() . '/assets/imagenes/');
//declaramos una constante con la ruta con la carpeta delas videos
if (!defined('videos_URL'))
    define('videos_URL', get_template_directory_uri() . '/videos/');
// Includes
include( get_template_directory() . '/includes/enqueue.php') ;

// Hooks
add_action('wp_enqueue_scripts', 'enqueueAssets');
add_theme_support( 'post-thumbnails' ); //a単ade la imagen por defecto
// carga el aarchivo de idioma
load_theme_textdomain(
    'incaterra',
    get_template_directory() . '/languages'
);
//registrar menus
register_nav_menus(
    array(
        'principal' => __( 'Menu Principal', 'mytheme' )
    )
);

function incatrailspecialist_setup(){
    //soporte de umagenes destacadas
    add_theme_support('title-tag');
    add_theme_support( 'automatic-feed-links' );
}

add_action('after_setup_theme','incatrailspecialist_setup');
add_filter('the_content','do_shortcode');

// Activando el soporte para los sidebar
if (function_exists('register_sidebar')) {
    /**
     * Creates a sidebar
     * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
     */

    register_sidebar(array(
        'id' => 1,
        'name'=>'blog_widge'
    ));

}
add_theme_support( 'custom-logo' );
function Calendar (){
// [SamCalendarAlternative rtu="1" package="IT18" lang="en"] plugin Alternative	
    return '<iframe style="border:0; padding:0; height:500px;width: 100%;" src="https://disponibilidad.net.pe/integ/20/en/0?agrupar=160"></iframe>';

}
add_shortcode('Calendar','Calendar');

function custom_register_rest_field() {
    register_rest_field(
        ['post', 'page'],
        'feature_media_urls',
        array(
            'get_callback' => function ($object, $field_name, $request) {
                $featured_media_id = get_post_thumbnail_id($object['id']);
                if (!$featured_media_id) {
                    return null;
                }

                $sizes = get_intermediate_image_sizes();
                $urls = [];
                
                foreach ($sizes as $size) {
                    $image = wp_get_attachment_image_src($featured_media_id, $size);
                    if ($image) {
                        $urls[$size] = $image[0];
                    }
                }

                // Add the full size image
                $full_image = wp_get_attachment_image_src($featured_media_id, 'full');
                if ($full_image) {
                    $urls['full'] = $full_image[0];
                }

                return $urls;
            },
        )
    );
}

add_action('rest_api_init', 'custom_register_rest_field');


function wpb_posts_nav(){
    $next_post = get_next_post();
    $prev_post = get_previous_post();
     
    if ( $next_post || $prev_post ) : ?>
     
        <div class="wpb-posts-nav pt-4 mt-md-4">
            <div>
                <?php if ( ! empty( $prev_post ) ) : ?>
                    <a href="<?php echo get_permalink( $prev_post ); ?>">
                        <div class="content__blog__np">
                            <?php echo get_the_post_thumbnail( $prev_post, [ 100, 100 ] ); ?>
                            <div>
                                <i class="bi bi-arrow-left"></i>
                                <span>PREVIOUS POST</span>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
            <div>
                <?php if ( ! empty( $next_post ) ) : ?>
                    <a href="<?php echo get_permalink( $next_post ); ?>">
                        <div class="content__blog__np">
                            <div> 
                                <span>NEXT POST</span>
                                <i class="bi bi-arrow-right"></i>
                            </div>
                            <?php echo get_the_post_thumbnail( $next_post, [ 100, 100 ] ); ?>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div> <!-- .wpb-posts-nav -->
     
    <?php endif;
}
function get_category_names_and_slugs_for_api( $object ) {
    $categories = get_the_category( $object['id'] );
    $categories_data = array();
    foreach ( $categories as $category ) {
        $categories_data[] = array(
            'name' => $category->name,
            'slug' => $category->slug
        );
    }

    return $categories_data;
}

function create_category_name_for_api() {
    register_rest_field(
        [ 'post', 'page' ],
        'categories_data',
        array(
            'get_callback'    => 'get_category_names_and_slugs_for_api',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action( 'rest_api_init', 'create_category_name_for_api' );

function get_category_names_for_api($object) {

    $data = [];

    foreach($object['categories'] as $index => $category_id) {
        $data[] = get_the_category_by_ID($category_id);
    }

    return $data;
};

// Desactivar comentarios globalmente
add_action('admin_init', function () {
    // Eliminar soporte para comentarios y trackbacks
    foreach (get_post_types() as $type) {
        if (post_type_supports($type, 'comments')) {
            remove_post_type_support($type, 'comments');
            remove_post_type_support($type, 'trackbacks');
        }
    }

    // Redirigir si acceden a la página de comentarios
    if (is_admin() && $_SERVER['REQUEST_URI'] === '/wp-admin/edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Eliminar el widget de comentarios recientes del escritorio
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
});

// Cerrar comentarios en el frontend
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Ocultar comentarios existentes
add_filter('comments_array', '__return_empty_array', 10, 2);

//
//
//

function cargar_mas_posts() {
    $count = isset($_GET['count']) ? intval($_GET['count']) : 0; 
    $tag = isset($_GET['tag']) ? intval($_GET['tag']) : 0;
    $key = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
    
    if($tag) {
        $args = array(
            'posts_per_page' => '8',
            'post_status' => 'publish',
            'offset' => $count, 
            'category_name' => 'blog-sacred-valley',
            'tag_id' => $tag,
        );
    } elseif ($key) {
        $args = array(
            'posts_per_page' => '8',
            'post_status' => 'publish',
            'offset' => $count, 
            'category_name' => 'blog-sacred-valley',
            's' => $key,
        );
    }
    else{
        $args = array(
            'posts_per_page' => '8',
            'post_status' => 'publish',
            'offset' => $count, 
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
                <h3>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php $tag ?></a>
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

    wp_reset_postdata();
    die();
}

add_action('wp_ajax_cargar_mas_posts', 'cargar_mas_posts');
add_action('wp_ajax_nopriv_cargar_mas_posts', 'cargar_mas_posts');


//
// Shortcode para hotel los andenes
//
function hotel_andenes_shortcode($atts) {
    // Atributos del shortcode
    $atts = shortcode_atts(
        array(
            'title' => 'Hotel Andenes del Inca',
            'column' => '1',
            'item_column' => '2',
        ),
        $atts,
        'hotelandenes'
    );

    ob_start(); ?>
    
    <div class="container-xxl">
        <div class="container-fluid p-0 ">
            <div class="row g-0 bg-dark text-white rounded-1 overflow-hidden">
                <!-- Texto -->
                <div class="<?php echo $atts["item_column"]==="1"?"col-12":"col-12 col-md-6"; ?> p-4 text-center text-md-start">
                    <img src="https://www.andenesdelinca.com/wp-content/uploads/2024/12/Ativo-13.png"
                         alt="Hotel Andenes del Inca" class="mb-3" style="width: 152px;">
                    <h2 class="fw-bold text-warning fs-4"><?php echo esc_html($atts['title']); ?></h2>
                    <p class="text-white">
                       Comfortable lodging near the ruins of Ollantaytambo, in the Sacred Valley of the Incas
                    </p>
                    <a href="https://www.andenesdelinca.com/" target="_blank" class="btn btn-primary text-white fw-semibold btn-sm letter-spacing-1 mb-2"> 
                         Learn More <i class="bi bi-arrow-right"></i>
                    </a>
                    <!-- <p class="fs-sm mb-0 badge pe-2">Perfect for beginning your adventure to the Inca Trail or Machu Picchu</p> -->
                </div>  
                <!-- Imágenes en columnas desde md -->
                <div class="<?php echo $atts["item_column"]==="1"?"col-12":"col-12 col-md-6"; ?>">
                    <div class="row gx-2 h-100">
                        <?php if ($atts['column'] == '1') : ?>
                            <div class="col-12">
                                <div class="position-relative h-100">
                                    <img src="https://www.andenesdelinca.com/wp-content/uploads/2024/12/matrimonail-rooms-Andenes.webp"
                                         alt="Ollantaytambo View" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                  
                                    
                                        <div class="position-absolute bottom-0 start-0 p-2">
                                            <span class="badge bg-warning text-dark fs-sm text-wrap">
                                              Perfect for beginning your adventure to the Inca Trail or Machu Picchu
                                            </span>
                                        </div>
                                   
                                </div>
                            </div>
                        <?php elseif ($atts['column'] == '2') : ?>
                            <div class="col-6">
                                <div class="position-relative h-100">
                                    <img src="https://www.andenesdelinca.com/wp-content/uploads/2024/12/matrimonail-rooms-Andenes.webp"
                                         alt="Hotel Room" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="position-relative h-100">
                                    <img src="https://www.andenesdelinca.com/wp-content/uploads/2024/12/hotel-andenes-del-inca.webp"
                                         alt="Ollantaytambo View" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                         <div class="position-absolute bottom-0 start-0 p-2">
                                            <span class="badge bg-warning text-dark fs-sm text-wrap">
                                             Perfect for beginning your adventure to the Inca Trail or Machu Picchu
                                            </span>
                                        </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode( 'hoteles', 'hotel_andenes_shortcode' );
?>