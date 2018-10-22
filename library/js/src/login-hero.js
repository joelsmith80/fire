var LoginHero = (function($){

  $ = jQuery.noConflict();

  'use strict';  

  // placeholder for cached DOM elements
  var DOM = {};

  /* ===== private stuff ===== */

  function cacheDom(){
    DOM.$registerDiv = $("#register-form-area");
    DOM.$loginDiv = $("#login-form-area");
    DOM.$switchToLoginLink = $("a[data-action='switch-to-login']");
    DOM.$switchToRegisterLink = $("a[data-action='switch-to-register']");
  }

  function bindEvents(){
    DOM.$switchToLoginLink.click(toggleToLogin);
    DOM.$switchToRegisterLink.click(toggleToRegister);
  }

  function toggleToLogin(e){
    e.preventDefault();
    hideRegister();
    fadeInLogin();
  }

  function toggleToRegister(e){
    e.preventDefault();
    hideLogin();
    fadeInRegister();
  }

  function hideRegister(){
    DOM.$registerDiv.hide();
  }

  function fadeInRegister(){
    DOM.$registerDiv.fadeIn();
  }

  function hideLogin(){
    DOM.$loginDiv.hide();
  }

  function fadeInLogin(){
    DOM.$loginDiv.fadeIn();
  }

  /* ===== public stuff ====== */

  // main init method
  function init(){
      cacheDom();
      bindEvents();
      hideRegister();
  }

  /* ===== export public methods ===== */
  
  return {
      init: init
  };

}());