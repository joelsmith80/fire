jQuery(document).ready(function($){

  // set everything up
  $(".facilitating-page").addClass("js-enabled");
  $(".facilitating-step").hide();

  // open a box
  $("#facilitating-menu a").click(function(e){
    e.preventDefault();
    $("#facilitating-menu").addClass("scatter").delay(100).fadeOut();
    var target = $(this).attr("href");
    var top = $(".page-header").offset().top;
    $(target).fadeIn(1200);
    setTimeout(swoopTo(top), 1500);
  });

  // close a box
  $(".facilitating-step a.js-close-link").click(function(e){
    e.preventDefault();
    var target = $(this).parent().fadeOut();
    var top = $(".page-header").offset().top;
    $("#facilitating-menu").fadeIn().removeClass("scatter");
    setTimeout(swoopTo(top), 1500);
  });

  // a function that swoops to a certain position
	function swoopTo(position){
		$('html, body').stop().animate({
      scrollTop: position
    }, 1500);
	}

});
