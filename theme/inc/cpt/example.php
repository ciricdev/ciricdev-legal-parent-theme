<?php

function cd_register_practice_areas()
{
    $singular = 'Practice Area';
    $plural = 'Practice Areas';
    $slug = 'practice-area';

    $labels = array(
        'name'                 => __($plural, 'pl'),
        'singular_name'       => __($singular, 'pl'),
        'add_new'             => _x('Add New', 'pl', 'pl'),
        'add_new_item'        => __('Add New ' . $singular, 'pl'),
        'edit'                => __('Edit', 'pl'),
        'edit_item'           => __('Edit ' . $singular, 'pl'),
        'new_item'            => __('New ' . $singular, 'pl'),
        'view'                => __('View ' . $singular, 'pl'),
        'view_item'           => __('View ' . $singular, 'pl'),
        'search_term'         => __('Search ' . $plural, 'pl'),
        'parent'              => __('Parent ' . $singular, 'pl'),
        'not_found'           => __('No ' . $plural . ' found', 'pl'),
        'not_found_in_trash'  => __('No ' . $plural . ' in Trash', 'pl'),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => true,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_menu'        => true,
        'taxonomies'          => array(),
        'show_in_nav_menus'   => true,
        'has_archive'         => true,
        'query_var'             => true,
        'rewrite' => [
            'slug' => 'legal-services',
            'with_front' => false,
            'pages'      => false,
            'feeds'      => false,
        ],
        'menu_icon'           => 'dashicons-chart-area',
        'show_in_rest'        => true,
        'supports'            => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes', 'revisions'),
        'capability_type'       => 'page',
    );

    register_post_type($slug, $args);
}

add_action('init', 'cd_register_practice_areas');
