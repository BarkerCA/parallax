jQuery(function( $ ){

  if ($('#parallax-photo').hasClass('full-width-photo')) {

    // On the fly page redesign
    $('.entry-header').hide();
    $('body').addClass('home parallax-home');

    var background = $('#parallax-background-image url').html();
    $('.full-width-photo').css({'background-image': 'url(' + background + ')'});
  
    // Enable parallax and fade effects on homepage sections
    $(window).scroll(function(){
  
      scrolltop = $(window).scrollTop()
      scrollwindow = scrolltop + $(window).height();
  
      // Added support for full width parallax photos in regular pages.
      $(".full-width-photo").css("backgroundPosition", "0px " + -(scrolltop/6) + "px");
    });

  }

});