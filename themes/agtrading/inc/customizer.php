<?php 
function builder_customizer_register($wp_customize){

	// include to Site Identity 

	 $wp_customize->add_setting('favicon', array(
	   'default' => ''
	  )); 
	 $wp_customize->add_control( 
	  new WP_Customize_Image_Control( $wp_customize,'favicon', 
	  array(
	  'label'  => __('Favicon', 'autokuiper'),
	  'section'  => 'title_tagline',
	  'priority'   => 9,
	  'settings'  => 'favicon'
	 )) );
}

add_action('customize_register', 'builder_customizer_register');