<?php
 get_header();

 get_template_part('sections/breadcrumb');
 get_template_part('sections/mobile', 'menu');
?>
<section class="main-content">
  <div class="container">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="entry-con-404">
            <div class="error-404 not-found">
                <div class="cn-404">
                  <h1>404</h1>
                </div>
                <header class="page-header">
                  <h3 class="page-title">Oops! That page can't be found.</h3>
                </header><!-- .page-header -->
              </div>
            </div>
          </div>
        </div>
      </div>   
</section><!-- end of .main-content -->

<?php get_footer();?>