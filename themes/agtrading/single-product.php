<?php 
get_header(); 

get_template_part('sections/breadcrumb');
get_template_part('sections/mobile', 'menu');

$pr_id = get_the_ID();

while(have_posts()) : the_post();
$images = get_field('add_gallary_images', $pr_id);
$pd_img   = wp_get_attachment_image_src( get_post_thumbnail_id($pr_id), 'product_img' );
$pd_full   = wp_get_attachment_image_src( get_post_thumbnail_id($pr_id), 'full' );
$pd_featured_img = wp_get_attachment_image_src( get_post_thumbnail_id($pr_id), 'product_detail_img' );
$pd_year  = get_field('year', $pr_id);
$pd_power = get_field('power', $pr_id);
$pd_miles = get_field('miles', $pr_id);
$pd_price = get_field('price', $pr_id);
$car_power_bg = car_power_bg($pd_power);

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

            <div class="product-item border clearfix">
              <div class="product-img-view">
                <h3 class="product-title"><?php the_title(); ?></h3>
                <a class="mainphoto_" href="javascript:void(0);">
                <img src="<?php echo $pd_featured_img[0]; ?>" alt="<?php the_title(); ?>">
                </a>
              </div>
              <div class="product-con-view">
                <div class="product-info product-info-view clearfix">
                  <span><label>bouwjaar:</label> <?php echo $pd_year; ?></span>
                  <span class="power <?php echo $car_power_bg; ?>"><?php echo strtoupper($pd_power); ?></span>
                  <span><label>km-stand:</label> <?php echo $pd_miles; ?> KM </span>
                  <span>€ <?php echo $pd_price; ?></span>
                </div>
                <?php if( count($images) ): ?>
                <div class="img-height-auto">
                  <div class="product-img-inner">
                    <img src="<?php echo $pd_img[0]; ?>" alt="">
                    <div class="img-overlay img-overlay-2">
                      <ul id="lightgallery">
                      <li data-src="<?php echo $pd_full[0]; ?>">
                      <a rel="fotos_group" href="<?php echo $pd_full[0]; ?>" class="button allefoto"><span>Alle foto’s<br> &nbsp;bekijken  ></span> <img class="img-responsive" src="<?php echo $pd_full[0]; ?>"> </a></li>
                      <?php 
                      foreach($images as $image):
                      $full_image_url = $image['url'];
                      $thumb_image_url = $image['sizes']['thumbnail'];
                      ?> 
                      <li data-src="<?php echo $full_image_url; ?>">
                      <a class="allefoto" style="display: none;" rel="fotos_group" href="<?php echo $full_image_url; ?>" title=""><img class="img-responsive" src="<?php echo $thumb_image_url; ?>"></a></li>
                      <?php endforeach;?>
                      </ul>

                    </div>
                  </div>
                </div>
              <?php endif; ?>
              </div>
              <div class="pruduct-des-view">
                  <?php the_content();?>
              </div>

              <div class="contact-form-wrp">
                <div data-prname="<?php the_title(); ?>" data-prurl="<?php the_permalink(); ?>" id="prinfo"></div>
                <?php echo do_shortcode('[contact-form-7 id="64" title="Contact Form"]'); ?>
              </div>
            </div><!-- end of .product-item 1 -->

          </div>

        </div>
      </div>
  </div>    
</section><!-- end of .main-content -->
<?php 
endwhile;
get_footer(); 
?>