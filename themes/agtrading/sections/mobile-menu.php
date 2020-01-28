<?php 
  $spacialArry = array(".", "/", "+", " ", "(", ")");$replaceArray = '';
  $contact = get_field('contactinfo', 'options');
  $email_address = $contact['email'];
  $show_telefoon = $contact['telephone'];
  $whatsapp = $contact['whatsapp_url'];
  $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
?>
<section class="xs-toggle-bar show-xs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="toggle-wrap clearfix">
          <div class="mobile-social-icon">
            <?php 
              if( !empty($email_address) ) printf('<a class="mailto" href="mailto:%s"></a>', $email_address);
              if( !empty($show_telefoon) ) printf('<a class="tel" href="tel:%s"></a>', $telefoon);
              if( !empty($email_address) ) printf('<a class="whatsapp" href="%s"></a>', $whatsapp);
            ?>
          </div>
          <div class="toggle-bar">
            <div class="toggle-bar-switch clearfix">
              <strong>menu</strong>
            <div class="toggle-btn">
              <span></span>
              <span></span>
              <span></span>
            </div>
            
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
</section>
<div class="mobile-menu show-xs">
  <div class="mb-menu-inner">
    <span class="cross-btn"><img src="<?php echo THEME_URI; ?>/images/cross-btn.png" alt=''></span>
    <?php
      $args = array(
        'container'     => 'false',
        'menu_class'    => 'mobile clearfix',
        'menu_id'       => '',        
        'theme_location'=> 'header_menu'
      );
      wp_nav_menu( $args ); 
    ?>
</div>
</div>