<?php

##-- Defaults

# ACF
add_filter('acf/settings/save_json', function() {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
    $paths = array(get_template_directory() . '/acf-json');

    if(is_child_theme()) {
        $paths[] = get_stylesheet_directory() . '/acf-json';
    }

    return $paths;
});

# GForms
add_filter( 'gform_notification', 'cd_filter_form_notifications', 10, 3 );
function cd_filter_form_notifications( $notification, $form, $entry ) {
    //There is no concept of admin notifications anymore, so we will need to target notifications based on other criteria, such as name
    if ( $notification['name'] == 'Admin Notification' ) {
        // toType can be routing or email
        $notification['toType'] = 'email';
        $notification['to'] = '<PUT RECIPIENTS HERE>';
        $notification['from'] = 'noreply@<PUT DOMAIN HERE>';
    }

    return $notification;
}

add_filter( 'gform_next_button', 'cd_input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'cd_input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'cd_input_to_button', 10, 2 );
function ps_input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
        $new_button->setAttribute( $attribute->name, $attribute->value );
    }
    $input->parentNode->replaceChild( $new_button, $input );

    return $dom->saveHtml( $new_button );
}

# Menus
add_filter('nav_menu_link_attributes', 'cd_filter_menu_link_attributes', 10, 4);
function cd_filter_menu_link_attributes( $atts, $menu_item, $args, $depth ) {
    $thumbnail_url = get_the_post_thumbnail_url($menu_item->object_id);
    $atts['data-image'] = $thumbnail_url;
    return $atts;
}

# WP Core
add_action( 'pre_get_posts', 'cd_filter_posts_query', 1);
function cd_filter_posts_query($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->is_search()) {
        $query->set('posts_per_page', 8);
    }
}

# LuckyWP ToC
add_filter('lwptoc_enqueue_style', 'cd_disable_luckywp_styles');
function cd_disable_luckywp_styles() {
    return false;
}

##-- MP Managed

# Google Maps
function mp_acf_google_map_api( $api ){
    $api['key'] = get_field('technical_google_maps_api_key', 'option');
    return $api;
}
add_filter('acf/fields/google_map/api', 'mp_acf_google_map_api');

# Allow SVG
function mp_filter_mimetypes( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['vcf'] = 'text/vcard';
    $mimes['vcard'] = 'text/vcard';
    return $mimes;
}
add_filter( 'upload_mimes', 'mp_filter_mimetypes', 10, 1 );


##-- MPD

add_action('mpdcontent/ask-question/submission', function($data) {
    GFAPI::submit_form(
        get_field('ask_a_question_form_id', 'option'),
        array(
          'input_1' => $data['question'],
          'input_4' => $data['name'],
          'input_6' => $data['email'],
          'input_7' => $data['content']
        )
    );
});
