<?php
/**
 * Created by PhpStorm.
 * User: robertsteinbach
 * Date: 9/2/21
 * Time: 11:01 AM
 *
 * @Filters:
 *  - mp/blocks/location-navigator/images
 *  - mp/blocks/location-navigator/text
 *  - mp/blocks/location-navigator/links
 */
// TODO: DEBUGGING ONLY, REMOVE
//function filter_images( $default_images ) {
//	$default_images['bg_image'] = get_template_directory_uri() . '/assets/images/dev/bg-image-pin.png';
//	$default_images['right_arrow'] = get_template_directory_uri() . '/assets/images/dev/arrow-right-gold.png';
//	$default_images['right_caret'] = get_template_directory_uri() . '/assets/images/dev/caret-right-gold.png';
//	$default_images['left_caret'] = get_template_directory_uri() . '/assets/images/dev/caret-left-gold.png';
//	$default_images['down_caret'] = get_template_directory_uri() . '/assets/images/dev/down-caret-gold.svg';
//
//	return $default_images;
//}
//
//function filter_links( $default_links ) {
//	$default_links['areas_served_archive'] = array( 'url' => '#', 'title' => 'Show More' );
//	return $default_links;
//}
//
//add_filter( 'mp/blocks/location-navigator/images', 'filter_images' );
//add_filter( 'mp/blocks/location-navigator/links', 'filter_links' );

/// END DEBUG
///
$filtered_images = apply_filters( 'mp/blocks/location-navigator/images', array(
        'bg_image' => null,
        'right_arrow' => null,
        'right_caret' => null,
        'left_caret' => null,
        'down_caret' => null,
) );

$filtered_text = apply_filters( 'mp/blocks/location-navigator/text', array(
	'details_link' => __('Details'),
) );

$filtered_links = apply_filters( 'mp/blocks/location-navigator/links', array(
	'areas_served_archive' => null,
) );

$areas_served_data = get_field( 'areas_served' );
$offices_data = get_field( 'offices' );
?>
<section class="mp-location-navigator pt-8 pb-12 relative overflow-hidden">
    <?php LocationNavigator_Module::render(array(
        'caption'   => get_field('caption'),
        'header'    => get_field('header'),
        'display_type' => $areas_served_data['display_type'],
        'offices_section' => array(
            'header'  => $offices_data['header'],
            'use_carousel'  => $offices_data['use_carousel'],
        ),
        'areas_served_section'  => array(
            'header'  => $areas_served_data['header'],
            'locations_page_link' => $filtered_links['areas_served_archive']
        ),
        'background_image'  => $filtered_images['bg_image'],
        'icons' => $filtered_images,
        'primary_cta'  => get_field('primary_cta')
    )) ?>
</section>
