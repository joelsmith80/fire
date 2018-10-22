var SwoopTo = (function($){

    // SWOOP FROM AN INTERNAL PAGE LINK TO THE TARGET ON THE PAGE

    $ = jQuery.noConflict();

    'use strict';  

    // placeholder for cached DOM elements
    var DOM = {};

    /* ===== private stuff ===== */

    // two different styles of trigger here
    // (can't add data actions to certain automatically marked up elements...)
    function cacheDom(){
        DOM.$triggerA = $("a[data-action='swoop-to']");
        DOM.$triggerB = $("nav[data-action='swoop-to'] a");
    }

    function bindEvents(){
        DOM.$triggerA.click(swoop);
        DOM.$triggerB.click(swoop);
    }

    function swoop(e){
        e.preventDefault();
        var link = $(this).attr('href');
		var target = $(link).offset().top;
		$('html, body').stop().animate({
            scrollTop: (target - 60)
        }, 1000);
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