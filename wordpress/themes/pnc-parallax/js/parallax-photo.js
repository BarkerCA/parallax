jQuery(function( $ ){

  if ($('#parallax-photo').hasClass('parallax-photo')) {
  
    var background = $('#parallax-background-image url').html();
    var title = $('#parallax-background-image title').html();
    $('#parallax-title').html(title);
    $('.parallax-photo').css({'background-image': 'url(' + background + ')'}).show();
  
    // Enable parallax and fade effects on homepage sections
    $(window).scroll(function(){
  
      scrolltop = $(window).scrollTop();
      scrollwindow = scrolltop + $(window).height();
  
      // Added support for full width parallax photos in regular pages.
      $(".parallax-photo").css("backgroundPosition", "50% " + -(scrolltop/6) + "px");
    });
  
  }

});