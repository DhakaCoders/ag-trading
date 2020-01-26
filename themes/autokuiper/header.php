<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?> 

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php  
  $thisID = get_the_ID();
  if( is_blog())
    $thisID = get_option('page_for_posts');
    
    $banner_img = wp_get_attachment_image_src( get_post_thumbnail_id( $thisID ), 'banner_img' );
?>
<header class="header">
  <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <h1 class="logo">
            <?php if ( function_exists( 'the_custom_logo' )) {
                the_custom_logo();
            }?>
          </h1>
        </div>
        <div class="col-sm-8 hide-xs">
          <div class="hdr-rgt-col clearfix">
            <h1 style="display:none;">Stadskanaal</h1>
            <nav class="main-nav">
              <?php
                $args = array(
                  'container'     => 'false',
                  'menu_class'    => 'clearfix',
                  'menu_id'       => '',        
                  'theme_location'=> 'header_menu'
                );
                wp_nav_menu( $args ); 
              ?>
            </nav>
          </div>
        </div>
      </div>
  </div>
</header><!-- end of header -->
<?php 
if( !empty($banner_img) && !is_product()){
?>
<section class="banner-wrp banner-trim">
    <div class="slide-item" style="background: url(<?php echo $banner_img[0];?>); background-repeat: no-repeat; background-position: center; background-size: cover;min-height: 300px; ">
    </div>   
</section><!-- end of .slider-wrp -->
<?php } ?>