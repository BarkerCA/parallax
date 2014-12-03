jQuery(function( $ ){

  if ($('#parallax-photo').hasClass('parallax-photo')) {
  
    var background = $('#parallax-background-image url').html();
    var title = $('#parallax-background-image ptitle').html();
    var color = $('#parallax-background-image color').html();
    var shadow_color = $('#parallax-background-image shadow_color').html();
    var shadow_opacity = $('#parallax-background-image shadow_opacity').html();
    var shadow_concat = "2px 2px 2px rgba(" + shadow_color + ", " + shadow_opacity + ")";

    $('#parallax-title.widget-title.widgettitle').html(title).css("color", color).css("textShadow", shadow_concat);

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