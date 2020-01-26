<?php
/**
Documentation
http://getbootstrap.com/
*/
 
wp_enqueue_style('bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
wp_enqueue_script('viewport-js', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array('jquery'), '1.0.0', true);
wp_enqueue_script('bootstrap.min.js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true);
?>