<?php 
  $facebook       = get_theme_mod('facebook', '#'); 
  $address        = get_theme_mod('address', 'H.J. Kniggestraat 110 | 9501 NJ | Stadskanaal');  
  $location_url   = get_theme_mod('location_url', 'javascript:');
  $email_address  = get_theme_mod('email_address', 'info@kuiperautos.nl');
  $phone_no       = get_theme_mod('phone_no', '06 - 299 411 72');
  $copyright_text = get_theme_mod('copyright_text', '©2017 Auto Kuiper, alle rechten voorbehouden.');
?>

<footer class="footer-wrp">
  <div class="ftr-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="ftr-info">
              <ul class="clearfix">
              <?php 
                if(!empty($phone_no)) printf('<li><a class="tel" href="tel:%s"><span class="hide-xs">%s</span></a></li>', $phone_no, $phone_no);
                if(!empty($email_address)) printf('<li><a class="mail" href="mailto:%s"><span class="hide-xs">%s</span></a></li>', $email_address, $email_address);
                if(!empty($address)) printf('<li><a class="address" href="%s"><span class="hide-xs">%s</span></a></li>', $location_url, $address);
                if(!empty($facebook)) printf('<li class="show-xs"><a target="_blank" class="fb" href="%s"><span class="hide-xs">Facebook</span></a></li>', $facebook);
              ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </div><!-- end of ftr-top --> 

  <div class="ftr-btm">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php if(!empty($copyright_text)) printf('<p>%s</p>', $copyright_text);?>
        </div>
      </div>
    </div>
  </div>
</footer><!-- end of footer -->

<?php wp_footer(); ?>
</body><!--   end of .body-inner-->
</html>