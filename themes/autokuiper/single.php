<?php 
get_header(); 


get_template_part('sections/mobile', 'menu');
get_template_part('sections/breadcrumb');
$show_hide_sidebar = (int)get_field('show_sidebar',get_the_ID());
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
        <div class="<?php echo $bs_class_content; ?>">
            <div class="wp_blog_cnt">
            <?php 
            while(have_posts()): the_post();
            ?>              
              <article id="post-id" class="post-class">
                  <div class="blog_pg_ar single">
                    <div class="blog_pg_single clearfix">
                      <div class="single_pg_cont entry-content">
                        <header class="entry-header">
                          <h3 class="blog_test">
                            <a href="<?php the_permalink();?>"> <?php the_title(); ?> </a>
                          </h3>
                          <span class="blog_date"><?php echo get_the_date(); ?></span>
                        </header><!-- .entry-header -->
                        <?php the_content(); ?>
                      </div>
                    </div><!-- .blog_pg_single -->
                  </div><!-- .blog_pg_ar -->
              </article> 
              <?php 
              endwhile;
              ?>
            </div>
        </div>
        <?php if($show_hide_sidebar === 1): ?>
          <div  class="<?php echo $bs_class_sidebar; ?>">
          <div class="sidebar-col blog">
            <aside class="aside-wrp">
              <?php if ( is_active_sidebar( 'sidebar_blog' ) ) dynamic_sidebar( 'sidebar_blog' );?>
            </aside>
          </div>
        </div>
        <?php endif; ?>
      </div>
  </div>    
</section><!-- end of .main-content -->
<?php get_footer(); ?>