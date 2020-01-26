<?php 
get_header(); 


get_template_part('sections/mobile', 'menu');
get_template_part('sections/breadcrumb');
while(have_posts()): the_post();
  $show_hide_sidebar = (int)get_field('show_sidebar', $post->ID);
  $isHideTitle = get_field('hide_title', $post->ID);
  $page_title="";

  $custom_title_get = get_field('custom_page_title', $post->ID);
  $custom_title = preg_replace('/\s+/', '', $custom_title_get);
  if (!empty($custom_title)) {
    $page_title = $custom_title_get;
  }else{
    $page_title = get_the_title();
  }

  $bs_class_content = 'col-xs-12'; 
  $bs_class_sidebar = '';
  if($show_hide_sidebar === 1){
    $bs_class_content = 'col-sm-8 col-md-9'; 
    $bs_class_sidebar = 'col-sm-4 col-md-3'; 
  }
?>
<section class="main-content">
  <div class="container">
      <div class="row">
        <?php if($show_hide_sidebar === 1): ?>
        <div  class="<?php echo $bs_class_sidebar; ?>">
          <div class="sidebar-col">
            <aside class="aside-wrp">
              <?php if ( is_active_sidebar( 'page_left_sidebar' ) ) dynamic_sidebar( 'page_left_sidebar' );?>
            </aside>
          </div>
        </div>
        <?php endif; ?>
        <div class="<?php echo $bs_class_content; ?>">
          <div class="entry-con">
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