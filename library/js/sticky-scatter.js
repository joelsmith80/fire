jQuery(document).ready(function($){

  // set everything up
  $(".sticky-menu-page").addClass("js-enabled");
  $(".sticky-step").hide();

  // open a box
  $("#sticky-menu a").click(function(e){
    e.preventDefault();
    $("#sticky-menu").addClass("scatter").delay(100).fadeOut();
    var target = $(this).attr("href");
    var top = $(".page-header").offset().top;
    $(target).fadeIn(1200);
    setTimeout(swoopTo(top), 1500);
  });

  // close a box
  $(".sticky-step a.js-close-link").click(function(e){
    e.preventDefault();
    var target = $(this).parent().fadeOut();
    var top = $(".page-header").offset().top;
    $("#sticky-menu").fadeIn().removeClass("scatter");
    setTimeout(swoopTo(top), 1500);
  });

  // a function that swoops to a certain position
	function swoopTo(position){
		$('html, body').stop().animate({
      scrollTop: position
    }, 1500);
	}

});
