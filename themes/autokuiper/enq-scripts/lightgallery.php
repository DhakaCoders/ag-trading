<?php
/**
Documentation
https://github.com/sachinchoolur/lightGallery
*/
wp_enqueue_style('lightgallery.css', get_template_directory_uri() . '/lightgallery/css/lightgallery.css', array(), '1.4.0');
wp_enqueue_script('lightgalleryjs', get_template_directory_uri() . '/lightgallery/js/lightgallery.js', array('jquery'), '1.4.0', true);
wp_enqueue_script('lightlgs', get_template_directory_uri() . '/lightgallery/js/lg-fullscreen.js', array('jquery'), '1.4.0', true);
wp_enqueue_script('lightthumbnail', get_template_directory_uri() . '/lightgallery/js/lg-thumbnail.js', array('jquery'), '1.4.0', true);
wp_enqueue_script('lightvideo', get_template_directory_uri() . '/lightgallery/js/lg-video.js', array('jquery'), '1.4.0', true);
wp_enqueue_script('lightautoplay', get_template_directory_uri() . '/lightgallery/js/lg-autoplay.js', array('jquery'), '1.4.0', true);
wp_enqueue_script('lightzoom', get_template_directory_uri() . '/lightgallery/js/lg-zoom.js', array('jquery'), '1.4.0', true);
wp_enqueue_script('lighthash', get_template_directory_uri() . '/lightgallery/js/lg-hash.js', array('jquery'), '1.4.0', true);
wp_enqueue_script('lightpager', get_template_directory_uri() . '/lightgallery/js/lg-pager.js', array('jquery'), '1.4.0', true);
wp_enqueue_script('mousewheel', get_template_directory_uri() . '/lightgallery/js/jquery.mousewheel.min.js', array('jquery'), '1.4.0', true);