var $ = jQuery.noConflict();

$(document).ready(function(){

  // because we don't want students to see link names when hovering over
  // an image in full-screen mode, we cut the link out of each image upon
  // opening it. because we want to restore those links after closing full-
  // screen mode, we make a record of all of the eligible image links
  // on the page during the initial page load, then we use this list to
  // restore all those image links each time we close full-screen mode
  var targetImages = $("a[data-action='screenfull']");
  var imgLinksArray = [];

  // create the master list
  $(targetImages).each(function(index){
    var href = $(this).attr('href');
    imgLinksArray.push(href);
  });

  // the actual function that restores them (fired above)
  function restoreLinks(){
    $(targetImages).each(function(index){
      var linkToRestore = imgLinksArray[index];
      $(this).attr('href',linkToRestore);
      console.log("Restored");
    });
  }


  // ===============================================
  // CLICKING ON AN IMAGE, FIRING FULL-SCREEN MODE
  // ===============================================

  $('a[data-action="screenfull"]').click(function(e){

    if (screenfull.enabled) {

      e.preventDefault();

      // make sure this stuff only happens if we're not full-screen yet
      if(!screenfull.isFullscreen){

        // get initial variables
        var target = $(this);
        var originalImg = $(target).find('img');
        var fullImgSrc = $(target).attr('href');
        var fullImg = document.createElement('img');
        $(fullImg).attr('src',fullImgSrc).addClass('enlargement').hide();

        // suppress the link
        $(this).attr('href','#');

        function createImage(callback){
          $(originalImg).hide();
          $(target).append(fullImg);
          $('html').addClass('blackout');
          $(target).addClass('screenfull-target-link');
          callback(fadeImgIn);
        }

        function goFullScreen(callback){
          screenfull.request();
          callback();
        }

        function fadeImgIn(){
          $(fullImg).fadeIn(1000);
        }

        // FIRE!
        createImage(goFullScreen);
      }
    }
  });

  // listen for the fullscreenchange event,
  // and restore everything back to normal if we're
  // closing the full-screen view
  if (screenfull.enabled) {
    document.addEventListener(screenfull.raw.fullscreenchange, function() {
      if(!screenfull.isFullscreen){
        $('html').removeClass('blackout');
        $('.enlargement').remove();
        $('a[data-action="screenfull"]').removeClass('screenfull-target-link').find('img').show();
        restoreLinks();
      }
    });
  }

});
