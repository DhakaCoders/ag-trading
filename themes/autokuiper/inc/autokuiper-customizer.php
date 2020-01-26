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
	/**
	Social Media Links
	*/
	$wp_customize->add_section('contact_address', array(
		'title' => __('Contact Info.', 'autokuiper'),
		'description' => __('Add contact information. Keep empty to hide.', 'autokuiper')
	));


	/*Address*/
	$wp_customize->add_setting('address', array(
		'default' => 'H.J. Kniggestraat 110 | 9501 NJ | Stadskanaal'
	));	

	$wp_customize->add_control( 
		'address', 
		array(
		'label' => __('Edit address', 'autokuiper'),
		'section' => 'contact_address',
		'settings' => 'address'
	));

	/*Skype*/
	$wp_customize->add_setting('location_url', array(
		'default' => 'javascript:'
	));	

	$wp_customize->add_control( 
		'location_url', 
		array(
		'label' => __('Address URL', 'autokuiper'),
		'section' => 'contact_address',
		'settings' => 'location_url'
	));



	/*Email*/
	$wp_customize->add_setting('email_address', array(
		'default' => 'info@kuiperautos.nl'
	));	

	$wp_customize->add_control( 
		'email_address', 
		array(
		'label' => __('Edit email address', 'autokuiper'),
		'section' => 'contact_address',
		'settings' => 'email_address'
	));	

	/*Phone*/
	$wp_customize->add_setting('phone_no', array(
		'default' => '06 - 299 411 72'
	));	

	$wp_customize->add_control( 
		'phone_no', 
		array(
		'label' => __('Edit phone no', 'autokuiper'),
		'section' => 'contact_address',
		'settings' => 'phone_no'
	));	

	

	/*facebook icon*/
	$wp_customize->add_setting('facebook', array(
		'default' => 'javascript:'
	));	

	$wp_customize->add_control( 
		'facebook', 
		array(
		'label' => __('Edit Facebook URL', 'autokuiper'),
		'section' => 'contact_address',
		'settings' => 'facebook'
	));	

	/**
	Copyright
	*/
	$wp_customize->add_section('site_copyright', array(
		'title' => __('Copyright', 'autokuiper'),
		'description' => __('Edit copyright text', 'autokuiper')
	));
	$wp_customize->add_setting('copyright_text', array(
		'default' => '©2017 Auto Kuiper, alle rechten voorbehouden.'
	));	
	$wp_customize->add_control( 
		'copy_text', 
		array(
		'label' => __('Edit Copyright', 'autokuiper'),
		'section' => 'site_copyright',
		'settings' => 'copyright_text'
	));
}

add_action('customize_register', 'builder_customizer_register');