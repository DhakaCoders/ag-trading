<?php 

function autokuiper_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Page Left Sidebar', THEME_NAME ),
		'id'            => 'page_left_sidebar',
		'description'   => __( 'Add widgets here to appear in your page left sidebar.', THEME_NAME ),
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="title">',
		'after_title'   => '</span>',
		) );
}
add_action( 'widgets_init', 'autokuiper_widgets_init' );