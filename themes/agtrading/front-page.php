<?php 
get_header(); 
get_template_part('sections/breadcrumb');
get_template_part('sections/mobile', 'menu');

get_template_part('sections/home', 'content');

get_footer(); 
?>