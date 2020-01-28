<?php 
  $spacialArry = array(".", "/", "+", " ", "(", ")");$replaceArray = '';
  $contact = get_field('contactinfo', 'options');
  $email_address = $contact['email'];
  $show_telefoon = $contact['telephone'];
  $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
  $copyright_text = get_field('copyright_text', 'options');

  $footer = get_field('footersec', 'options');

?>

<footer class="footer-wrp">
  <div class="ftr-top">
    <div class="ftimage-frame hide-xs">
      <?php if( !empty($footer['image']) ) echo cbv_get_image_tag($footer['image']); ?>
    </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="ftr-info">
              <ul class="clearfix">
              <?php 
                if(!empty($show_telefoon)) printf('<li><a class="tel" href="tel:%s">%s</a></li>', $telefoon, $show_telefoon);
                if(!empty($email_address)) printf('<li><a class="mail" href="mailto:%s">%s</a></li>', $email_address, $email_address);
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
          <?php if(!empty($copyright_text)) printf('<span>%s</span>', $copyright_text);?>
        </div>
      </div>
    </div>
  </div>
</footer><!-- end of footer -->

<?php wp_footer(); ?>
</body><!--   end of .body-inner-->
</html>