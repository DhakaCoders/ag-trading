<?php
/**
Theme specific styles and scripts
*/ 

wp_enqueue_style('autokuiper-main-style', get_stylesheet_uri(), array(), '1.0.0');
wp_enqueue_style('autokuiper-devices-style', get_template_directory_uri() . '/css/responsive.css', array(), '1.0.0');
wp_enqueue_script('autokuiper-custom-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
?>