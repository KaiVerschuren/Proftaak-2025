function adjustFooter() {
  var bodyHeight = $("body").outerHeight();
  var windowHeight = $(window).height();

  if (bodyHeight <= windowHeight) {
    $(".footer").addClass("fixed-footer");
  } else {
    $(".footer").removeClass("fixed-footer");
  }
}

$(document).ready(function() {
  setTimeout(function() {
    adjustFooter();
  }, 150);
});
$(window).on("resize", adjustFooter);
