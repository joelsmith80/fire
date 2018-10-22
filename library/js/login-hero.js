jQuery(document).ready(function($){

  // first, hide the register form
  $("#register-form-area").hide();

  $("a[data-action='switch-to-login']").click(function(e){
    e.preventDefault();
    $("#register-form-area").hide();
    $("#login-form-area").fadeIn();
  });

  $("a[data-action='switch-to-register']").click(function(e){
    e.preventDefault();
    $("#login-form-area").hide();
    $("#register-form-area").fadeIn();
  });

});
