<?php

$tabs_divs = '';

function tabs_group($atts, $content = null ) {
    global $tabs_divs;

    $tabs_divs = '';

    // Obtener el título de la publicación actual
    $post_title = get_the_title();

    $output = '<div class="content_wp_nav">';
    $output .= '<div class="nav_navegation tabs">' . do_shortcode($content) . '</div>';
    $output .= '<div class="panel-container">' . $tabs_divs . '</div>';
    $output .= '</div>';

    return $output;  
}  
function limpia_espacios($cadena){
    $cadena = str_replace(' ', '_', $cadena);
   
    return ($cadena);

}
///////////content
function tab($atts, $content = null) {
    global $tabs_divs;
    ob_start();
    extract(shortcode_atts(array(
        'id' => '',
        'title' => '',
        'icon' => '',
        'active' => ''
    ), $atts));

    if (empty($id))
        $id = 'side-tab' . rand(100, 999);

    $title_lowercase = str_replace(' ', '-', strtolower($title));

    $title_cleaned = strtolower(str_replace(' ', '_', $title));

    $icon_mapping = array(
        'itinerary' => 'calendar-week',
        'overview' => 'info-circle',
        'inclusions' => 'card-checklist',
        'Included' => 'card-checklist',
        'price' => 'currency-exchange',
        'prices' => 'currency-exchange',
        'addons' => 'star',
        'whysam' => 'people',
        'important-info' => 'book',
        'packinglist' => 'bookmark-heart',
        'recommendations' => 'info-circle',
        'info' => 'info-circle',
        'importantinfo' => 'info-circle',
        'priceampavailability' => 'currency-exchange',
        'whysamcorporations' => 'people',
        'availability' => 'tag'
    );

    $cleaned_icon_mapping = array_map(function ($class) {
        return str_replace('&', '', $class);
    }, $icon_mapping);

    $cleaned_title_lowercase = preg_replace('/[^\w\s]/', '', $title_lowercase);
    $selected_icon = isset($cleaned_icon_mapping[$cleaned_title_lowercase]) ? $cleaned_icon_mapping[$cleaned_title_lowercase] : 'tag';

    $output = '
        <li class="tab '.$active.'" data-tab-target="#'.$id.'">
            <i class="bi bi-' . $selected_icon . '"></i>
            <span>
                ' . $title . '
            </span>
        </li>
    ';

    $tabs_divs .= '<div class="panel_tab '.$title_cleaned.' '.$active.'" id="'.$id.'" data-tab-content>'.$content.'</div>';

    return $output;
}


add_shortcode('tabs', 'tabs_group');
add_shortcode('tab', 'tab');
add_shortcode('navs', 'tabs_group');
add_shortcode('nav', 'tab');
?>