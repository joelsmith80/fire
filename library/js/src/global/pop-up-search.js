var PopUpSearch = (function($){

    // CLICK THE MAGNIFYING GLASS AND POP THE SEARCH OPEN AND CLOSED

    $ = jQuery.noConflict();

    'use strict';  

    // placeholder for cached DOM elements
    var DOM = {};

    /* ===== private stuff ===== */

    function cacheDom(){
        DOM.$button = $(".desktop-js-search-prompt");
        DOM.$searchMenuItem = $(".menu-item-search");
    }

    function bindEvents(){
        DOM.$button.click(toggleJSMenu);
        $(document).click(closeSearch);
        DOM.$button.click(stopProp);
    }

    function toggleJSMenu(){
        DOM.$searchMenuItem.toggleClass("search-bar-open");
    }

    function closeSearch(){
        DOM.$searchMenuItem.removeClass("search-bar-open");
    }

    function stopProp(e){
        e.stopPropagation();
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