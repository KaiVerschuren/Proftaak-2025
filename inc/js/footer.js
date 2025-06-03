function adjustFooter() {
  var bodyHeight = $("body").outerHeight();
  var windowHeight = $(window).height();

  if (bodyHeight <= windowHeight) {
    $(".footer").addClass("fixed-footer");
  } else {
    $(".footer").removeClass("fixed-footer");
  }
}

// Run on page load and resize
$(document).ready(adjustFooter);
$(window).on("resize", adjustFooter);
