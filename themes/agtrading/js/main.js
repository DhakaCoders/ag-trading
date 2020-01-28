(function($) {

$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	
$('.cross-btn').on('click', function(){
  $('.toggle-bar-switch').trigger( "click" );
});
$('.toggle-bar-switch').on('click', function(){
  //$('.mobile-menu').toggleClass('menu-expend');
  $('.mobile-menu .mb-menu-inner').slideToggle();
});


// single product contact form hidden field value
if($('#prinfo').length){
  var prname = $('#prinfo').data('prname');
  var prurl = $('#prinfo').data('prurl');

  $("#prname").val(prname);
  $("#prurl").val(prurl);
}

/*function stickyfooter(){
    if ($(window).width() < 767) {
      if($(window).height() > $(window).width()){
        $('body').addClass('stickyfooter');
      } 
      if($(window).height() < $(window).width()) {
        $('body').removeClass('stickyfooter');
      }
    }
}
stickyfooter();
$(window).resize(function() {
    stickyfooter();
});
*/
$('#lightgallery').lightGallery();
$('#lightgallery-2').lightGallery();
$('a.mainphoto_').on('click', function(){
    console.log('click');
    $('#lightgallery > li > a').click();
});

})(jQuery);