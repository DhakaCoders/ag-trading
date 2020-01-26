
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
            $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
            $pd_loop = new WP_Query(
                        array('post_type'=>'product', 'order'=> 'ASC', 'paged' => $paged)
                       );
            if($pd_loop->have_posts()):
            while ($pd_loop->have_posts()): $pd_loop->the_post();
              $thisID   = get_the_ID();
              $pd_img   = wp_get_attachment_image_src( get_post_thumbnail_id($thisID), 'product_img' );
              $pd_year  = get_field('year', $thisID);
              $pd_power = get_field('power', $thisID);
              $pd_miles = get_field('miles', $thisID);
              $pd_price = get_field('price', $thisID);
              $car_power_bg = car_power_bg($pd_power);
        
          ?>
            <div class="product-item pritemListing border clearfix">
            <a title="<?php the_title(); ?>" class="pritemLink" href="<?php the_permalink(); ?>">&nbsp;</a>
              <div class="product-img">
                <div class="product-img-inner">
                  <img src="<?php echo $pd_img[0] ?>" alt="<?php the_title(); ?>">
                  <div class="img-overlay">
                    <a href="<?php the_permalink(); ?>" class="button"><span>Alle details<br> &nbsp;bekijken ></span></a>
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
                  <span class="power <?php echo $car_power_bg; ?>"><?php echo strtoupper($pd_power); ?></span>
                  <span class="km"><?php echo $pd_miles; ?> KM </span>
                  <span class="price">€ <?php echo $pd_price; ?></span>
                </div>
              </div>
            </div>
            <?php 
            endwhile;
$big = 999999999; // need an unlikely integer

echo paginate_links( array(
  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format' => '?paged=%#%',
  'type'      => 'list',
  'prev_text' => __('«'),
  'next_text' => __('»'),
  'current' => max( 1, get_query_var('page') ),
  'total' => $pd_loop->max_num_pages
) );
            wp_reset_postdata(); 
            endif;  
            ?>
          </div>

        </div>
      </div>
  </div>    
</section><!-- end of .main-content -->