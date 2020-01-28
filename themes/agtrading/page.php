<?php 
get_header(); 

get_template_part('sections/breadcrumb');
get_template_part('sections/mobile', 'menu');
while(have_posts()): the_post();
  $isHideTitle = get_field('hide_title', $post->ID);
  $page_title="";

  $custom_title_get = get_field('custom_page_title', $post->ID);
  $custom_title = preg_replace('/\s+/', '', $custom_title_get);
  if (!empty($custom_title)) {
    $page_title = $custom_title_get;
  }else{
    $page_title = get_the_title();
  }
?>
<section class="main-content">
  <div class="container">
      <div class="row">
        <div  class="col-sm-4 col-md-3">
          <div class="sidebar-col">
            <aside class="aside-wrp">
              <?php if ( is_active_sidebar( 'page_left_sidebar' ) ) dynamic_sidebar( 'page_left_sidebar' );?>
            </aside>
          </div>
        </div>
        <div class="col-sm-8 col-md-9">
          <div class="page-entry-con-wrap">
            <div class="page-entry-con">
              <?php 
                if(!is_array($isHideTitle)) printf('<h2>%s</h2>', $page_title);
                the_content();
              ?>
            </div>
          </div> 
        </div>
      </div>
  </div>    
</section><!-- end of .main-content -->
<?php endwhile; wp_reset_postdata(); get_footer(); ?>