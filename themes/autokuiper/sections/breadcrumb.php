<?php
  $address       = get_theme_mod('address', 'H.J. Kniggestraat 110 | 9501 NJ | Stadskanaal');  
  $location_url  = get_theme_mod('location_url', 'javascript:');
  $email_address = get_theme_mod('email_address', 'info@kuiperautos.nl');
?>
<section class="fl-breadcrumb">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <?php autokuiper_breadcrumbs(); ?>
          </div>
          <div class="col-sm-6 hide-xs">
            <div class="bar-info-wrp text-right">
              <?php 
                if(!empty($address)) printf('<a target="_blank" class="map-marker" href="%s"><i class="fa fa-map-marker" aria-hidden="true"></i></a>', $location_url);
                if(!empty($email_address)) printf('<a class="envelope" href="mailto:%s"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>', $email_address)
              ?>
            </div>
          </div>
        </div>
    </div> 
</section><!-- end of .fl-breadcrumb -->