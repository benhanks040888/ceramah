$(function() {
  $('.gallery-grid').masonry({
    // options
    itemSelector: '.grid-item',
    columnWidth: 130
  });
  
  $(".custom-scrollbar").mCustomScrollbar({
    theme:"dark-3"
  });

  $(".custom-scrollbar").css("opacity", 1);
});