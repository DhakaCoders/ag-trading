<section class="xs-toggle-bar show-xs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="toggle-bar">
          <div class="toggle-bar-switch">
          <div class="toggle-btn">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <strong>menu</strong>
          </div>
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
    </div>
  </div>
</section>