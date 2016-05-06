<?php
add_action( 'wp_enqueue_scripts', 'cherry_child_custom_scripts' );

function cherry_child_custom_scripts() {
	/**
	 * How to enqueue script?
	 *
	 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	 */
	wp_enqueue_script( 'theme-script', get_stylesheet_directory_uri() . '/js/theme-script.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'theme-timer', get_stylesheet_directory_uri() . '/js/theme-timer.js', array('jquery'), '1.0' );
} ?>