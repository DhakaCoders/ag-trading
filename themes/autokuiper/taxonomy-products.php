<?php 
get_header(); 


get_template_part('sections/mobile', 'menu');
get_template_part('sections/breadcrumb');
$term = get_queried_object();


$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$args = array(
  'post_type'=>'product',
  'paged' => $paged,
  'order'=>'desc',
    'tax_query' => array(
        array(
            'taxonomy' => 'products',   // taxonomy name
            'field' => 'term_id',           // term_id, slug or name
            'terms' => $term->term_id           // term id, term slug or term name
        )
    )
  );
query_posts($args);
?>
<section class="main-content">
  <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-3">
          <div class="sidebar-col">
            <aside class="aside-wrp">
              <?php if ( is_active_sidebar( 'page_left_sidebar' ) ) dynamic_sidebar( 'page_left_sidebar' );?>
            </aside>
          </div>
        </div>
        <div class="col-sm-8 col-md-9">
          <div class="entry-con">
          <?php
            if(have_posts()):
            while (have_posts()): the_post();
              $thisID   = get_the_ID();
              $pd_img   = wp_get_attachment_image_src( get_post_thumbnail_id($thisID), 'product_img' );
              $pd_year  = get_field('year', $thisID);
              $pd_power = get_field('power', $thisID);
              $pd_miles = get_field('miles', $thisID);
              $pd_price = get_field('price', $thisID);
              $car_power_bg = car_power_bg($pd_power);
        
          ?>
            <div class="product-item pritemListing border clearfix">
            <a class="pritemLink" href="<?php the_permalink(); ?>">&nbsp;</a>
              <div class="product-img">
                <div class="product-img-inner">
                  <img src="<?php echo $pd_img[0] ?>" alt="<?php the_title(); ?>">
                  <div class="img-overlay">
                    <a href="<?php the_permalink(); ?>" class="button"><span>Alle foto’s<br> &nbsp;bekijken  ></span></a>
                  </div>
                </div>
              </div>
              <div class="product-con">
                <h3 class="product-title">
<?php
$thetitle = get_the_title();
$getlength = strlen($thetitle);
$thelength = 35;
echo substr($thetitle, 0, $thelength);
if ($getlength > $thelength) echo "...";
?>
                </h3>
                <div class="pruduct-des">
<?php
$thetitle = get_the_excerpt();
$getlength = strlen($thetitle);
$thelength = 225;
echo substr($thetitle, 0, $thelength);
if ($getlength > $thelength) echo "...";
?>
                </div>
                <div class="product-info clearfix">
                  <span class="year"><?php echo $pd_year; ?></span>
                  <span class="power <?php echo $car_power_bg; ?>"><?php echo $pd_power; ?></span>
                  <span class="km <?php echo $car_power_bg; ?>"><?php echo $pd_miles; ?> KM </span>
                  <span class="price">€ <?php echo $pd_price; ?></span>
                </div>
              </div>
            </div>
            <?php 
            endwhile;
global $wp_query;
$big = 999999999; // need an unlikely integer

echo paginate_links( array(
  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format' => '?paged=%#%',
  'type'      => 'list',
  'prev_text' => __('«'),
  'next_text' => __('»'),
  'current' => max( 1, get_query_var('paged') ),
  'total' => $wp_query->max_num_pages
) );

            wp_reset_postdata();
            endif;
            ?>
          </div>

        </div>
      </div>
  </div>    
</section><!-- end of .main-content -->
<?php get_footer(); ?>