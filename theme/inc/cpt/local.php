<?php

// Register Custom Post Type
function pl_register_local() {
    $labels = array(
        'name'                  => _x( 'Local', 'Post Type General Name', 'pl' ),
        'singular_name'         => _x( 'Local', 'Post Type Singular Name', 'pl' ),
        'menu_name'             => __( 'Local', 'pl' ),
        'name_admin_bar'        => __( 'Local', 'pl' ),
        'archives'              => __( 'Local Archives', 'pl' ),
        'attributes'            => __( 'Local Attributes', 'pl' ),
        'parent_item_colon'     => __( 'Parent Local:', 'pl' ),
        'all_items'             => __( 'All Local', 'pl' ),
        'add_new_item'          => __( 'Add New Local', 'pl' ),
        'add_new'               => __( 'Add New', 'pl' ),
        'new_item'              => __( 'New Local', 'pl' ),
        'edit_item'             => __( 'Edit Local', 'pl' ),
        'update_item'           => __( 'Update Local', 'pl' ),
        'view_item'             => __( 'View Local', 'pl' ),
        'view_items'            => __( 'View Local', 'pl' ),
        'search_items'          => __( 'Search Local', 'pl' ),
        'not_found'             => __( 'Not found', 'pl' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'pl' ),
        'featured_image'        => __( 'Featured Image', 'pl' ),
        'set_featured_image'    => __( 'Set featured image', 'pl' ),
        'remove_featured_image' => __( 'Remove featured image', 'pl' ),
        'use_featured_image'    => __( 'Use as featured image', 'pl' ),
        'insert_into_item'      => __( 'Insert into item', 'pl' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'pl' ),
        'items_list'            => __( 'Items list', 'pl' ),
        'items_list_navigation' => __( 'Items list navigation', 'pl' ),
        'filter_items_list'     => __( 'Filter items list', 'pl' ),
    );
    $rewrite = array(
        'slug'                  => 'our-locations',
        'with_front'            => false,
        'pages'                 => true,
        'feeds'                 => false,
    );
    $args = array(
        'label'                 => __( 'Local', 'pl' ),
        'description'           => __( 'Local content including types like news, practice, events, etc', 'pl' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'excerpt' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-location',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );

    register_post_type( 'local', $args );
}
add_action( 'init', 'pl_register_local', 0 );
