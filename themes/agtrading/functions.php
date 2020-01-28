<?php

/**
Constants->>
*/

defined('THEME_NAME') or define('THEME_NAME', 'agtrading');
defined( 'THEME_DIR' ) or define( 'THEME_DIR', get_template_directory() );
defined( 'THEME_URI' ) or define( 'THEME_URI', get_template_directory_uri() );
defined( 'PER_PAGE' ) or define( 'PER_PAGE', get_option( 'posts_per_page' ) );

/**
Theme Setup->>
*/
if( !function_exists('agtrading_theme_setup') ){
	
	function agtrading_theme_setup(){
		add_theme_support('title-tag');
		add_theme_support( 'custom-logo', array(
		 'height'      => 110,
		 'width'       => 414,
		 'flex-height' => true,
		 'flex-width'  => true,
		) );
	add_theme_support('post-thumbnails');
    add_image_size('product_img', 372, 260, true);
    add_image_size('gallery_thumb', 284, 200, true);
	add_image_size('product_detail_img', 614, 429, true);
    add_image_size('blog-thumb', 180, 130, true); 
    add_image_size('banner_img', 1200, 368, true);
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	register_nav_menus( array(
		'header_menu' => __( 'Main Menu', THEME_NAME ),
		//'secendary_menu' => __( 'Secendary Menu', THEME_NAME ),
		//'product_category' => __( 'Product Category', THEME_NAME ),
	) );

	}

}
add_action( 'after_setup_theme', 'agtrading_theme_setup' );

/**
Enqueue Scripts->>
*/
function autokuiper_theme_scripts(){
	
  include_once( THEME_DIR . '/enq-scripts/bootstrap.php' );;
  include_once( THEME_DIR . '/enq-scripts/fonts.php' );
  include_once( THEME_DIR . '/enq-scripts/lightgallery.php' );
  include_once( THEME_DIR . '/enq-scripts/theme.default.php' );
	
}

add_action( 'wp_enqueue_scripts', 'autokuiper_theme_scripts');


/**
Comment Scripts->>
*/
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

/**
Includes->>
*/
include_once( THEME_DIR . '/inc/customizer.php' );
include_once( THEME_DIR . '/inc/breadcrumbs.php' );
include_once( THEME_DIR . '/inc/widget-area.php' );
include_once( THEME_DIR . '/inc/cbv-functions.php' );

/**
ACF Option pages->>
*/
if( function_exists('acf_add_options_page') ) {	
	
	//parent tab
	//acf_add_options_page( 'Opties' );
    acf_add_options_page(array(
        'page_title' 	=> __('Options', THEME_NAME),
        'menu_title' 	=> __('Options', THEME_NAME),
        'menu_slug' 	=> 'cbv_options',
        'capability' 	=> 'edit_posts',
        //'redirect' 	    => false
    ));

}
function modify_read_more_link() {
    return '<a class="more_button" href="' . get_permalink() . '"> ...Read More</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


function car_power_bg($pd_power){
  return $power_bg = ( $pd_power == 'benzine' ? 'benzine less-pd' : (($pd_power == 'electr.' ? 'electr less-pd': ((($pd_power == 'lpg' ? 'purpal' :''))))));
}

function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

function is_product(){
  return ('product' == get_post_type());
}

/**
Fix taxonomy pagination
*/
function fix_taxonomy_pagination ( $query ) {
  // not an admin page and it is the main query
  if (!is_admin() && $query->is_main_query()){

    if(is_tax()){
      // where 24 is number of posts per page on custom taxonomy pages
      $query->set('posts_per_page', PER_PAGE);

    }
  }
}
add_action( 'pre_get_posts', 'fix_taxonomy_pagination' );

/**
Add rel to Gallery
*/
add_filter('wp_get_attachment_link', 'rc_add_rel_attribute');
function rc_add_rel_attribute($link) {
  global $post;
  return str_replace('<a href', '<a rel="prettyPhoto[pp_gal]" href', $link);
}

add_filter('use_block_editor_for_post', '__return_false');

/**
Debug
*/
function printr($args){
  echo '<pre>';
  print_r ($args);
  echo '</pre>';
}