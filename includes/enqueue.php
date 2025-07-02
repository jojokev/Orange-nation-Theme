<?php

/**
 * Registra stilos y scripts
 */
function enqueueAssets() {

    removeUnnecessaryAssets();
    registerStyles();
    registerScripts();

    // ---------------------------------------
    // Registra estilos

    wp_enqueue_style('main');
    // ---------------------------------------
    // resgistra scripts

    wp_enqueue_script('main');
}

/**
 * registra hojas de estilos
 */
function registerStyles() {

    wp_register_style(
        'main',
        get_template_directory_uri() .'/assets/css/main.css',
        false,
        '4.2.1'
    );
}

/**
 * Registra scripts de javascript
 */
function registerScripts() {

    wp_register_script(
        'main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '4.3.1',
        true
    );
    /*
    wp_register_script(
        'app',
        get_template_directory_uri() . '/assets/js/app.js',
        [],
        '4.3.1',
        true
    );*/
}

/**
 * quita recursos inecesarios de la cola (styles , scripts)
 */
function removeUnnecessaryAssets() {

    // quita embed.js
    wp_deregister_script('wp-embed');

    // quita el jquery
    wp_deregister_script('jquery');

    // quita hoja de styles libreria
    // wp_dequeue_style('wp-block-library');
}
