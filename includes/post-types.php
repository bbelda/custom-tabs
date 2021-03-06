<?php 

function service_post_type() {
    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Services' ),
        'parent_item_colon'   => __( 'Parent Service' ),
        'all_items'           => __( 'All Services' ),
        'view_item'           => __( 'View Service' ),
        'add_new_item'        => __( 'Add New Service' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Service' ),
        'update_item'         => __( 'Update Service' ),
        'search_items'        => __( 'Search Service' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
    $args = array(
        'label'               => __( 'services' ),
        'description'         => __( 'Service Description' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'metabox'),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'menu_icon'			  => 'dashicons-admin-generic',
    );
    register_post_type( 'services', $args );
}
add_action( 'init', 'service_post_type');

