<?php
// Register sidebars by running cherry_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'cherry_widgets_init' );

function cherry_widgets_init() {
	// Sidebar Widget
	// Location: the sidebar
	register_sidebar( array(
		'name'          => theme_locals("sidebar"),
		'id'            => 'main-sidebar',
		'description'   => theme_locals("sidebar_desc"),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
} ?>