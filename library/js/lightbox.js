jQuery(document).ready(function($){

  // on clicking the trigger
  $("a[data-action='lightbox-trigger'], .single-blog-entry-content .wp-caption a").click(function(e){
    e.preventDefault();

    // if the lightbox has already been created, just open it up
    if($("#lightbox").length > 0){
      // var modal = "<div id='lightbox'>" + img_tag + "<span>Close</span></div>";
      var img = $(this).attr("href");
      var img_tag = "<img src='" + img + "' alt='Full-sized version'>";
      $("#lightbox").html(img_tag + "<span>Close</span>");
      showModal();
    }

    // otherwise if the lightbox hasn't been created yet, let's do it now
    else {
      var img = $(this).attr("href");
      var img_tag = "<img src='" + img + "' alt='Full-sized version'>";
      var modal = "<div id='lightbox'>" + img_tag + "<span>Close</span></div>";
      $('body').append(modal);
      showModal();
    }
  });


  // click anywhere in the lightbox to close it
  $("body").on('click','#lightbox',function(){
    hideModal();
  });

  // create the lightbox
  function createModal(img){
    var modal = "<div id='lightbox'>" + img + "<span>Close</span></div>";
    $('body').append(modal);
    showModal();
  }


  // show a lightbox that's already been created it
  function showModal(){
    $("#lightbox").fadeIn();
  }


  // hide the lightbox
  function hideModal(){
    $("#lightbox").fadeOut();
  }


  // close the lightbox on keystrokes
  $(document).keyup(keyControls);
  function keyControls(e){
    switch(e.which) {
      case 27: // esc
        hideModal();
        break;
      case 37: // left
        hideModal();
        break;
      case 39: // right
				hideModal();
        break;
      default: return; // exit this handler for other keys
    }
  }
});
