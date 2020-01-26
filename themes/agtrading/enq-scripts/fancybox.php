<?php
/**
Documentation
http://fancyapps.com/fancybox/3/
*/
wp_enqueue_style('fancyboxcss', get_template_directory_uri() . '/fancybox/jquery.fancybox.css', array(), '2.1.7');
wp_enqueue_script('fancyboxjs', get_template_directory_uri() . '/fancybox/jquery.fancybox.pack.js', array('jquery'), '2.1.7', true);
wp_enqueue_script('fancyboxmedia', get_template_directory_uri() . '/fancybox/helpers/jquery.fancybox-media.js', array('jquery'), '2.1.7', true);