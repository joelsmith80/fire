var AccountDetails = (function($){

  $ = jQuery.noConflict();

  'use strict';  

  // placeholder for cached DOM elements
  var DOM = {};

  /* ===== private stuff ===== */

  function cacheDom(){
    DOM.$typeField = $("#customer_type");
    DOM.$schoolLevelField = $("#school_level_field");
    DOM.$countryField = $("#customer_institution_country");
    DOM.$stateField = $("#customer_institution_state_field");
  }

  function assessState(){

    if(DOM.$typeField.length){
      maybe_hide_non_school_options();
      DOM.$typeField.change(function(){
        var val = "";
        val = DOM.$typeField.val();
        maybe_hide_non_school_options(val);
      });
    }
  
    if(DOM.$countryField.length){
      maybe_hide_non_us_options();
      DOM.$countryField.change(function(){
        var val = "";
        val = DOM.$countryField.val();
        maybe_hide_non_us_options(val);
      });
    }
  }

  function maybe_hide_non_school_options( type = null ){
    if(!type){
      var type = DOM.$typeField.val();
    } else {
      var type = type;
    }
    if(type !== 'school'){
      DOM.$schoolLevelField.fadeOut();
    } else {
      DOM.$schoolLevelField.fadeIn();
    }
  }

  function maybe_hide_non_us_options( country = null ){
    if(!country){
      var country = DOM.$countryField.val();
    } else {
      var country = country;
    }
    if(country !== 'US'){
      DOM.$stateField.fadeOut();
    } else {
      DOM.$stateField.fadeIn();
    }
  }
  

  /* ===== public stuff ====== */

  // main init method
  function init(){
      cacheDom();
      assessState();
  }

  /* ===== export public methods ===== */
  
  return {
      init: init
  };

}());