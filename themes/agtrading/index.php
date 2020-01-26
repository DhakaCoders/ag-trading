<?php
$show_hide_sidebar = (int)get_field('show_sidebar', get_option( 'page_for_posts' )); 
get_header(); 


get_template_part('sections/mobile', 'menu');
get_template_part('sections/breadcrumb');
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
                  <div class="blog_pg_ar">
                    <div class="blog_pg_single clearfix">
                    <?php if(has_post_thumbnail()): 
                      $blog_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'blog-thumb');
                    ?>
                      <div class="blog_img">
                        <a href="<?php the_permalink();?>"> <img src="<?php echo $blog_thumb[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"></a>
                      </div>

                    <?php endif; ?>

                      <div class="blog_pg_cont entry-content">
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
              <div class="wp_pagination clearfix">
                <?php
                global $wp_query;

                $big = 999999999; // need an unlikely integer
                $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

                echo paginate_links( array(
                  'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'type'      => 'list',
                  'prev_text' => __('«'),
                  'next_text' => __('»'),
                  'format'    => '?paged=%#%',
                  'current'   => $current,
                  'total'     => $wp_query->max_num_pages
                ) );
                ?>
              </div>
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