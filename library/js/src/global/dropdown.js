var Dropdown = (function($){

    // ENHANCE THE OPENING AND CLOSING OF MAIN-MENU DROPDOWNS

    $ = jQuery.noConflict();

    'use strict';  

    // placeholder for cached DOM elements
    var DOM = {};

    /* ===== private stuff ===== */

    function cacheDom(){
        DOM.$hoverableDropdowns = $("ul.hoverable");
        DOM.$navLinksWithChildren = $("li.menu-item-has-children");
        DOM.$accountNavLinksWithChildren = $(".account-nav li.menu-item-has-children > a");
    }

    function bindEvents(){
        DOM.$accountNavLinksWithChildren.click(toggleAccountDropdowns);
        $(document).click(closeAccountDropdowns);
        DOM.$accountNavLinksWithChildren.click(stopProp);
    }

    // by default, we turn off regular old css hoverability
    function removeDropdownHoverability(){
        DOM.$hoverableDropdowns.removeClass("hoverable");
    }

    // open/close selected menu item, open/close all others
    function toggleAccountDropdowns(e){
        e.preventDefault();
        // close up any dropdowns that aren't this one
        var parent = $(this).parent();
        DOM.$navLinksWithChildren.not(parent).removeClass("account-sub-menu-is-open");
        // open/close this dropdown
        $(this).parent().toggleClass("account-sub-menu-is-open");
    }

    // just straight-up close all account-nav dropdowns
    function closeAccountDropdowns(){
        DOM.$navLinksWithChildren.removeClass("account-sub-menu-is-open").parent().removeClass("account-sub-menu-is-open");
    }

    // allow click anywhere on the page to close the menu
    function stopProp(e){
        e.stopPropagation();
    }

    /* ===== public stuff ====== */

    // main init method
    function init(){
        cacheDom();
        bindEvents();
        removeDropdownHoverability();
    }

    /* ===== export public methods ===== */
    
    return {
        init: init
    };

}());