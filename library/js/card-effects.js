var $ = jQuery.noConflict();

$(document).ready(function(){

  // REMOVE THIS STUFF
  // ==============================

  // deadens all the content-related, non-ui links
  $("a").not("[data-action='open-text'], .jump-to-section, .back-to-top, .global-nav-home, .global-nav-prev, .global-nav-next").click(function(e){
    e.preventDefault();
    alert("You've clicked a link to somewhere.");
  });

  // a function that swoops to a certain position
	function swoopTo(position){
		$('html, body').stop().animate({
      scrollTop: position
    }, 1000);
	}

  // click a nav link, swoop to it
  $('a.jump-to-section, a.back-to-top').click(function(e){
    e.preventDefault();
    var link = $(this).attr('href');
		var target = $(link).offset().top;
		swoopTo(target);
  });

  $("a[data-action='open-text']").click(function(e){
    e.preventDefault();
    var parent = $(this).parents(".card").toggleClass("js-targeted",1000,"easeOutSine");
    var prompt = $(this).text();
    if(prompt == "Read More"){
      $(this).text("Read Less");
    } else if(prompt == "Read Less"){
      $(this).text("Read More");
    }
  });



});
