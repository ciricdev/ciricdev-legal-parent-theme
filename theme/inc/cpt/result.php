<?php

// Register Custom Post Type
function pl_register_result() {

    $labels = array(
        'name'                  => _x( 'Results', 'Post Type General Name', 'pl' ),
        'singular_name'         => _x( 'Result', 'Post Type Singular Name', 'pl' ),
        'menu_name'             => __( 'Results', 'pl' ),
        'name_admin_bar'        => __( 'Result', 'pl' ),
        'archives'              => __( 'Result Archives', 'pl' ),
        'attributes'            => __( 'Result Attributes', 'pl' ),
        'parent_item_colon'     => __( 'Parent Item:', 'pl' ),
        'all_items'             => __( 'All Results', 'pl' ),
        'add_new_item'          => __( 'Add New Result', 'pl' ),
        'add_new'               => __( 'Add New', 'pl' ),
        'new_item'              => __( 'New Result', 'pl' ),
        'edit_item'             => __( 'Edit Result', 'pl' ),
        'update_item'           => __( 'Update Result', 'pl' ),
        'view_item'             => __( 'View Result', 'pl' ),
        'view_items'            => __( 'View Results', 'pl' ),
        'search_items'          => __( 'Search Results', 'pl' ),
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
    $args = array(
        'label'                 => __( 'Result', 'pl' ),
        'description'           => __( 'A verdict or settlement', 'pl' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-money',
        'rewrite' => [
            'slug' => 'results',
            'with_front' => false,
        ],
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'result', $args );

}
add_action( 'init', 'pl_register_result', 0 );
