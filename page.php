<?php
// ****************
//encabezado
//********************** */
get_header();
?>

<?php
$pageSlug = get_post_field('ID');

// selecciona la plantilla de acuerdo ala pagina
switch ($pageSlug) {
    case '16194':
        // mostrar el indice o entrada del blog
        get_template_part('template-parts/content', 'booking');
        break;
    case '11982':
        // mostrar el indice o entrada del blog
        get_template_part('template-parts/content', 'huayna');
        break;
    case '11013':
        // mostrar el indice o entrada del blog
        get_template_part('template-parts/content', 'blog');
        break;
    case '99':
        // mostrar el indice o entrada del blog
        get_template_part('template-parts/content', 'contact');
        break;
    case '3104':
        // mostrar el indice o entrada del blog
        get_template_part('template-parts/content', 'payment');
        break;
    case '5940':
        // mostrar el indice o entrada del blog
        get_template_part('template-parts/content', 'about');
        break;
    case '16840':
        // mostrar el indice o entrada del blog
        get_template_part('template-parts/content', 'create-package');
        break;
    default:
        // plantilla de pagina por defecto
        while (have_posts()) : the_post();
            // carga la pantilla
            get_template_part('template-parts/content', 'plantilla');
        endwhile;
        break;
}
?>

<?php
// ****************
//foooter
//********************** */
get_footer();
?>