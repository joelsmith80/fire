var ReadMorePop = (function($){

    // OPEN AND CLOSE CARDS TO READ MORE OR LESS

    $ = jQuery.noConflict();

    'use strict';  

    // placeholder for cached DOM elements
    var DOM = {};    

    /* ===== private stuff ===== */

    function cacheDom(){
        DOM.$triggers = $("a[data-action='open-text']");
    }

    function bindEvents(){
        DOM.$triggers.click(toggle);
    }

    function toggle(e){
        e.preventDefault();
        var parent = $(this).parents(".card").toggleClass("js-targeted",1000,"easeOutSine");
        var prompt = $.trim($(this).find('span').text());
        if(prompt == "Read More"){
          $(this).find('span').text("Read Less");
        } else if(prompt == "Read Less"){
          $(this).find('span').text("Read More");
        }
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