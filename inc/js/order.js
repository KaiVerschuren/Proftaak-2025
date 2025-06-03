$(document).ready(function () {
  const categories = $(".category");
  const buttons = $(".orderPageButton");
  const arrowButtons = $(".orderPageButtonArrow");

  let currentIndex = 0;

  function showCategory(index) {
    categories.css("transform", `translateX(-${100 * index}%)`);
  }

  $(buttons).on("click", function () {
    currentIndex = buttons.index(this);
    showCategory(currentIndex);
  });

  $(arrowButtons).on("click", function () {
    if (arrowButtons.index(this) == 0) {
      direction = "left";
    } else {
      direction = "right";
    }
    if (direction == "right") {
      currentIndex = (currentIndex + 1) % 3;
    } else if (direction == "left") {
      currentIndex = (currentIndex + 2) % 3; 
    }
    showCategory(currentIndex);
  });
});
