(function($) {

$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	

$('.toggle-bar-switch').on('click', function(){
  $(this).parent().toggleClass('menu-expend');
  $('.toggle-bar ul.mobile').slideToggle();
});


// single product contact form hidden field value
if($('#prinfo').length){
  var prname = $('#prinfo').data('prname');
  var prurl = $('#prinfo').data('prurl');

  $("#prname").val(prname);
  $("#prurl").val(prurl);
}

function stickyfooter(){
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

$('#lightgallery').lightGallery();
$('a.mainphoto_').on('click', function(){
    console.log('click');
    $('#lightgallery > li > a').click();
});

})(jQuery);