<?php 
// CSS and JS Files Enqueue
function custom_tabs_enqueue_scripts() {
    wp_enqueue_style( 'tabs-main-css', plugin_dir_url( __DIR__ ) . 'assets/css/main.css'  );
    wp_enqueue_style( 'tabs-grid', plugin_dir_url( __DIR__ ) . 'assets/css/grid.min.css'  );
  
    wp_enqueue_script( 'tabs-jquery-js', plugin_dir_url( __DIR__ ) . 'assets/js/jquery.min.js', false);
    wp_enqueue_script( 'tabs-main-js', plugin_dir_url( __DIR__ ) . 'assets/js/main.js', false);
}
add_action( 'wp_enqueue_scripts', 'custom_tabs_enqueue_scripts', 11);