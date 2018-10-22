var $ = jQuery.noConflict();

$(document).ready(function(){

  function maybe_hide_non_school_options(type = null){
    if(!type){
      var type = $('#customer_type').val();
    } else {
      var type = type;
    }
    if(type !== 'school'){
      $('#school_level_field').fadeOut();
    } else {
      $('#school_level_field').fadeIn();
    }
  }

  function maybe_hide_non_us_options(country = null){
    if(!country){
      var country = $('#customer_institution_country').val();
    } else {
      var country = country;
    }
    console.log(country);
    if(country !== 'US'){
      $('#customer_institution_state_field').fadeOut();
    } else {
      $('#customer_institution_state_field').fadeIn();
    }
  }

  if($('#customer_type').length){
    maybe_hide_non_school_options();
    $('#customer_type').change(function(){
      var val = '';
      val = $('#customer_type').val();
      maybe_hide_non_school_options(val);
    });
  }

  if($('#customer_institution_country').length){
    maybe_hide_non_us_options();
    $('#customer_institution_country').change(function(){
      var val = '';
      val = $('#customer_institution_country').val();
      maybe_hide_non_us_options(val);
    });
  }
});