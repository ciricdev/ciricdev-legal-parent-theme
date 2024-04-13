<?php

function pl_register_menus() {
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'nav' => esc_html__( 'Nav', 'pl' ),
      'mobile-nav' => esc_html__( 'Mobile Nav', 'pl' ),
			'footer' => esc_html__( 'Footer', 'pl' )
		) );
}
add_action( 'after_setup_theme', 'pl_register_menus' );
