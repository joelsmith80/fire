jQuery(document).ready(function($){

  function hide_all_lines_but_this_one(){
    var color = $(this).attr('data-line');
    $(this).addClass('active');
    $('.metro-line').not('.metro-line-' + color).addClass('hidden');
    $('.cert-pathway-desc').not('.cert-pathway-desc-' + color).addClass('hidden');
  }

  function show_all_lines(){
    $('.metro-line').removeClass('hidden active');
    $('.cert-pathway-desc').removeClass('hidden');
  }

  $('.metro-line').hover(hide_all_lines_but_this_one,show_all_lines);

  // when hovering over a metro line, hide the other lines, as well as the other descriptions
  /*$('.metro-line').hover(function(){
    var color = $(this).attr('data-line');
    $(this).addClass('active');
    $('.metro-line').not('.metro-line-' + color).addClass('hidden');
    $('.cert-pathway-desc').not('.cert-pathway-desc-' + color).addClass('hidden');
  }, function(){
    $('.metro-line').removeClass('hidden active');
    $('.cert-pathway-desc').removeClass('hidden');
  });*/


  // when hovering over a description, hide the other descriptions, as well as the other metro lines
  $('.cert-pathway-desc').hover(function(){
    var color = $(this).attr('data-desc-color');
    $('.metro-line-' + color).addClass('active');
    $('.metro-line').not('.metro-line-' + color).addClass('hidden');
    $('.cert-pathway-desc').not('.cert-pathway-desc-' + color).addClass('hidden');
  }, function(){
    $('.metro-line').removeClass('hidden active');
    $('.cert-pathway-desc').removeClass('hidden');
  });

});
