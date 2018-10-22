var gridSlider = (function($) {

  // SWOOP FROM AN INTERNAL PAGE LINK TO THE TARGET ON THE PAGE

  $ = jQuery.noConflict();

  'use strict';  

  // placeholder for cached DOM elements
  var DOM = {};

  /* =================== private methods ================= */

  // cache DOM elements
  function cacheDom() {
    DOM.$background = $('#background');
    DOM.$the_state = 1;
    DOM.$the_length = 6;
    DOM.$container = $("#grid-slider");
    DOM.$header = $(".grid-slider-header");
    DOM.$headline = $(".grid-slider-headline");
    DOM.$logo = $("grid-slider-header img");
  }

  function doEvent(){
    DOM.$container.on("click",".grid-slider-trigger",function(){

      var targets = [];
  
      DOM.$container.removeClass("state-" + DOM.$the_state);
      if(DOM.$the_state < DOM.$the_length){
        DOM.$the_state++;
      } else {
        DOM.$the_state = 1;
      }
  
      DOM.$container.data("state",DOM.$the_state).addClass("state-" + DOM.$the_state);
      
      switch(DOM.$the_state){
        case 1:
          resetPresentation();
          writePrompt("What's going on in this picture?");
          break;
        case 2:
          targets = [13,14];
          flip(targets);
          writePrompt("Close looking");
          break;
        case 3:
          targets = [11,12,15,16];
          flip(targets);
          writePrompt("Flexible thinking");
          break;
        case 4:
          targets = [3,4,7,8];
          flip(targets);
          writePrompt("Careful listening");
          break;
        case 5:
          targets = [1,2];
          flip(targets);
          writePrompt("Collaboration");
          break;
        case 6:
          writePrompt("What more can we find?",300);
          break;
      }
    });
  }

  function writePrompt(text,delay){
    if(delay){
      DOM.$header.fadeOut(500,function(){
        setTimeout(function(){
          DOM.$headline.text(text);
          DOM.$header.prepend("<img src='http://vts.joelsmith.webfactional.com/wp-content/themes/bones/library/images/logo-white-no-descriptor.png'>").fadeIn(1000);
        },delay);
      });
    } else {
      DOM.$headline.text(text);
    }
  }

  function flip(targets){
    targets.forEach(function(element){
      $('.block-'+element).flippy({
        depth: 0,
        direction: 'LEFT',
        duration: 500,
        verso: "<div class='inner'><div class='grid-slider-backside'></div></div>"
      }).addClass('flipped');
    });
  }

  function resetPresentation(){
    DOM.$header.children("img").remove();
    $(".grid-slider-backside").remove();
    DOM.$container.children(".block").removeClass("flipped").removeAttr("style");
    DOM.$container.children("img").remove();
  }

  /* =================== public methods ================== */

  // main init method
  function init() {
    cacheDom();
    doEvent();
  }

  /* =============== export public methods =============== */
  return {
    init: init
  };

}());