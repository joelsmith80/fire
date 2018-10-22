jQuery(document).ready(function($){

  $(".pop-open [data-action='trigger']").click(function(e){
    $(this).toggleClass('open').next("[data-action='reveal']").toggleClass('open');
  });

});
