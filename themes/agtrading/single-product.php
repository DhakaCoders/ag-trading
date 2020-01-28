<?php 
get_header(); 

get_template_part('sections/breadcrumb');
get_template_part('sections/mobile', 'menu');

$thisID = get_the_ID();

while(have_posts()) : the_post();
$images = get_field('add_gallary_images', $thisID);
$product_id = get_post_thumbnail_id($thisID);

$pd_full   = wp_get_attachment_image_src( $product_id, 'full' );

$pattribute  = get_field('pattribute', $thisID);
$pd_year = $pattribute['year'];
$pd_price = $pattribute['price'];

$spacialArry = array(".", "/", "+", " ", "(", ")");$replaceArray = '';
$contact = get_field('contactinfo', 'options');
$email_address = $contact['email'];
$show_telefoon = $contact['telephone_2'];
$whatsapp = $contact['whatsapp_url'];
$telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
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

            <div class="product-item clearfix">
              <h3 class="product-title"><?php the_title(); ?></h3>
              <div class="product-img-view">
                <a class="mainphoto_" href="javascript:void(0);">
                  <?php if( !empty($product_id) ) echo cbv_get_image_tag( $product_id, 'product_detail_img' ); ?>
                </a>
              </div>
              <div class="product-con-view">
                <div class="product-info product-info-view clearfix hide-xs">
                  <span>€ <?php echo $pd_price; ?>,-</span>
                </div>
                <div class="intereste-questions hide-xs">
                  <h4>Interesse / vragen ?</h4>
                  <div class="question-info">
                    <?php 
                      if( !empty($email_address) ) printf('<a class="mailto" href="mailto:%s">e-mail ons</a>', $email_address);
                      if( !empty($show_telefoon) ) printf('<a class="tel" href="tel:%s">%s</a>', $telefoon, $show_telefoon);
                      if( !empty($email_address) ) printf('<a class="whatsapp" href="%s">whatsapp</a>', $whatsapp);
                    ?>
                  </div>
                </div>
                <?php if( count($images) ): ?>
                <div class="img-height-auto hide-xs">
                  <div class="product-img-inner">
                    <span class="hide-xs"><?php if( !empty($product_id) ) echo cbv_get_image_tag( $product_id, 'gallery_thumb' ); ?></span>
                    <div class="img-overlay img-overlay-2 lightboxbtn">
                      <ul id="lightgallery">
                      <li data-src="<?php echo $pd_full[0]; ?>">
                      <a rel="fotos_group" href="<?php echo $pd_full[0]; ?>" class="button allefoto"><span>Alle foto’s<br>bekijken<sub>></sub></span> <img class="img-responsive" src="<?php echo $pd_full[0]; ?>"> </a></li>
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
              <?php if( count($images) ): ?>
              <div class="mbgallery show-xs clearfix" id="lightgallery-2">
                <div  data-src="<?php echo $pd_full[0]; ?>"> <a rel="fotos_group" href="<?php echo $pd_full[0]; ?>" class="button allefoto"><img src="<?php echo THEME_URI; ?>/images/mbprefix.png" alt="mbprefix"><span>Alle foto’s bekijken<sub>></sub></span></a></div>
                <?php 
                foreach($images as $image):
                $full_image_url = $image['url'];
                $thumb_image_url = $image['sizes']['thumbnail'];
                ?> 
                <div style="display: none;" data-src="<?php echo $full_image_url; ?>">
                <a class="allefoto" style="display: none;" rel="fotos_group" href="<?php echo $full_image_url; ?>" title=""></a></div>
                <?php endforeach;?>
              </div>
              <?php endif; ?>
              <div class="pruduct-des-view">
                  <?php the_content();?>
              </div>
              <div class="product-con single-proinfo show-xs">
                <div class="product-info clearfix">
                  <span class="year"><?php echo $pd_year; ?></span>
                  <span class="price">€ <?php echo $pd_price; ?></span>
                </div>
              </div>
              <div class="intereste-questions show-xs">
                  <h4>Interesse / vragen ?</h4>
                  <div class="question-info">
                    <?php 
                      if( !empty($email_address) ) printf('<a class="mailto" href="mailto:%s">e-mail ons</a>', $email_address);
                      if( !empty($show_telefoon) ) printf('<a class="tel" href="tel:%s">%s</a>', $telefoon, $show_telefoon);
                      if( !empty($email_address) ) printf('<a class="whatsapp" href="%s">whatsapp</a>', $whatsapp);
                    ?>
                  </div>
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