var Metro = (function($){

  $ = jQuery.noConflict();

  'use strict';  

  // placeholder for cached DOM elements
  var DOM = {};

  /* ===== private stuff ===== */

  function cacheDom(){
      DOM.$metroLines = $(".metro-line");
      DOM.$descriptions = $(".cert-pathway-desc");
  }

  function bindEvents(){
      DOM.$metroLines.hover(handle_hover_on_line,show_all_paths);
      DOM.$descriptions.hover(handle_hover_on_desc,show_all_paths);
  }

  function handle_hover_on_line(){
    var color = $(this).attr("data-line");
    hide_all_paths_but_this_color(color);
  }

  function handle_hover_on_desc(){
    var color = $(this).attr("data-desc-color");
    hide_all_paths_but_this_color(color);
  }

  function handle_hover_off(){
    show_all_paths();
  }

  function hide_all_paths_but_this_color( color ){
    $(this).addClass("active");
    DOM.$metroLines.not(".metro-line-" + color).addClass("hidden");
    DOM.$descriptions.not(".cert-pathway-desc-" + color).addClass("hidden");
  }

  function show_all_paths(){
    DOM.$metroLines.removeClass("hidden active");
    DOM.$descriptions.removeClass("hidden");
  }

  /* ===== public stuff ====== */

  // main init method
  function init(){
      cacheDom();
      bindEvents();
  }

  /* ===== export public methods ===== */
  
  return {
      init: init
  };

}());