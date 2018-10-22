jQuery(document).ready(function($){

  // get rid of the hoverability of dropdown menus
  /*$("ul.hoverable").removeClass("hoverable");*/

  // clicking on the magnifying glass opens and closes the search bar
  /*$(".desktop-js-search-prompt").click(function(){
    $(".menu-item-search").toggleClass("search-bar-open");
  });*/

  // click on any account-menu link with children to open all the dropdowns
  /*$(".account-nav li.menu-item-has-children > a").click(function(e){
    e.preventDefault();
    // close up any dropdowns that aren't this one
    var parent = $(this).parent();
    $("li.menu-item-has-children").not(parent).removeClass("account-sub-menu-is-open");
    // open/close this dropdown
    $(this).parent().toggleClass("account-sub-menu-is-open");
  });*/

  // click the title of the Get The Newsletter box in the footer to open and close the form
  /*$(".site-footer-grid-box-newsletter .site-footer-grid-box-title").click(function(){
    $(this).next().toggleClass("open");
  });*/

  // open Read More and other flyout/pop-open content
  /*$("a[data-action='open-text']").click(function(e){
    e.preventDefault();
    var parent = $(this).parents(".card").toggleClass("js-targeted",1000,"easeOutSine");
    var prompt = $.trim($(this).text());
    var prompt = $.trim($(this).find('span').text());
    if(prompt == "Read More"){
      $(this).find('span').text("Read Less");
    } else if(prompt == "Read Less"){
      $(this).find('span').text("Read More");
    }
  });*/

  // jump from Internal Page Nav links to their position on the page
  /*$("nav[data-action='swoop-to'] a").click(function(e){
    e.preventDefault();
    var link = $(this).attr('href');
		var target = $(link).offset().top;
		$('html, body').stop().animate({
      scrollTop: target
    }, 1000);
  });

  // swoop to the href of any link dubbed 'swoop-to'
  $("a[data-action='swoop-to']").click(function(e){
    e.preventDefault();
    var link = $(this).attr('href');
		var target = $(link).offset().top;
		$('html, body').stop().animate({
      scrollTop: (target - 60)
    }, 1000);
  });*/

});
