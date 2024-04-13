<?php

#-- Default Hooks
add_action( 'block_categories', 'pl_block_categories', 10, 2 );
function pl_block_categories( $categories ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'child-theme-blocks',
                'title' => __( 'pl Formatting Blocks' ),
            ],
        ]
    );
}

# Block Editor Config
function mp_parent_block_categories( $categories ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'mp-parent',
                'title' => __( 'Parent Theme Blocks' ),
            ]
        ]
    );
}
add_action( 'block_categories', 'mp_parent_block_categories', 10, 2 );

# Fix SVG
function mp_fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'mp_fix_svg' );

# Content Type Schema Output
function mp_output_default_schema_for_post() {
    global $post;
    global $wp_query;

    if ( is_singular( 'office' ) ) {
        mp_generate_office_schema( $post );
    } else {
        mp_generate_local_business_schema();
    }

    if ( is_singular( 'practice-area' ) ) {
        mp_generate_practice_area_schema( $post, get_field('schema_aggregate_rating', 'option' ) );
    } elseif ( is_post_type_archive( 'testimonials' ) ) {
        $testimonials = get_posts( array( 'post_type' => 'testimonials', 'numberposts' => 15 ) );
        mp_generate_testimonials_schema( $testimonials, null, null, get_field('schema_aggregate_rating', 'option' ) );
    }
}
add_action('wp_footer', 'mp_output_default_schema_for_post');

# outputs any additional for a post/page not covered by the default schema definitions
function mp_output_additional_schema_for_post() {
    if ( is_singular( array( 'post', 'practice-area' ) ) ) {
        $faq_items = get_field('schema_faq_items');

        if ( $faq_items && sizeof( $faq_items ) > 0 ) {
            $faq_markup = array();
            foreach ( $faq_items as $faq_item ) {
                $faq_markup[] = mp_generate_question_answer_schema( $faq_item['question'], $faq_item['answer'] );
            }

            mp_generate_faq_page_schema( $faq_markup, 'Post FAQ' );
        }
    }
}
add_action('wp_footer', 'mp_output_additional_schema_for_post');

# MeanPug Content Widgets
add_action('mpdcontent/ask-question/submission', function($data) {
    GFAPI::add_entry(array(
        '1' => $data['question'],
        '4' => $data['name'],
        '6' => $data['email'],
        '7' => $data['content'],
        'form_id'   => get_field('ask_a_question_form_id', 'option'),
    ));
});
