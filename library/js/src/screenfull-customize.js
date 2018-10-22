var ScreenfulCurric = (function($){

  $ = jQuery.noConflict();

  'use strict';  

  // placeholder for cached DOM elements
  var DOM = {};

  /* ===== private stuff ===== */

  function cacheDom(){
      DOM.$targetImages = $("a[data-action='screenfull']");
      DOM.$imgLinksArray = [];
  }

  function bindEvents(){
      DOM.$targetImages.click(callFullScreenMode);
      if (screenfull.enabled) {
        $(document).on(screenfull.raw.fullscreenchange,closeFullScreen);
      }
  }

  // create the master list of image links
  function harvestLinks(){
    DOM.$targetImages.each(function(index){
      var href = $(this).attr('href');
      DOM.$imgLinksArray.push(href);
    });
  }

  // restore all image links
  function restoreLinks(){
    DOM.$targetImages.each(function(index){
      var linkToRestore = DOM.$imgLinksArray[index];
      $(this).attr('href',linkToRestore);
    });
  }

  // start the process that opens full-screen mode
  function callFullScreenMode(e){
    
    if (screenfull.enabled) {

      e.preventDefault();

      // make sure this stuff only happens if we're not full-screen yet
      if(!screenfull.isFullscreen){

        // get initial variables
        let target = $(this);
        let originalImg = $(target).find('img');
        let fullImgSrc = $(target).attr('href');
        let fullImg = document.createElement('img');
        $(fullImg).attr('src',fullImgSrc).addClass('enlargement').hide();

        // suppress the link
        $(this).attr('href','#');

        // FIRE!
        createImage( originalImg, target, fullImg, goFullScreen );
      }
    }
  }

  function createImage( the_og_img, the_target, the_full_img, the_callback){
    $(the_og_img).hide();
    $(the_target).append(the_full_img);
    $('html').addClass('blackout');
    $(the_target).addClass('screenfull-target-link');
    the_callback( the_full_img, fadeImgIn );
  }

  function goFullScreen( the_full_img, the_callback ){
    screenfull.request();
    the_callback( the_full_img );
  }

  function fadeImgIn( the_full_img ){
    $(the_full_img).fadeIn(1000);
  }
  
  // restore everything back to normal if we're
  // closing the full-screen view
  function closeFullScreen(){
    if(!screenfull.isFullscreen){
      $('html').removeClass('blackout');
      $(".enlargement").remove();
      DOM.$targetImages.removeClass('screenfull-target-link').find('img').show();
      restoreLinks();
    }
  }

  /* ===== public stuff ====== */

  // main init method
  function init(){
      cacheDom();
      bindEvents();
      harvestLinks();
  }

  /* ===== export public methods ===== */
  
  return {
      init: init
  };

}());