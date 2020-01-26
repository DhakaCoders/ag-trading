<?php 

function autokuiper_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Page Left Sidebar', 'autokuiper' ),
		'id'            => 'page_left_sidebar',
		'description'   => __( 'Add widgets here to appear in your page left sidebar.', 'autokuiper' ),
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="title">',
		'after_title'   => '</span>',
		) );

	register_sidebar( array(
		'name'          => __( 'Blog sidebar', 'autokuiper' ),
		'id'            => 'sidebar_blog',
		'description'   => __( 'Add widgets here to appear in your blog sidebar.', 'autokuiper' ),
		'before_widget' => '<div id="%1$s" class="widget-item widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		) );
}
add_action( 'widgets_init', 'autokuiper_widgets_init' );