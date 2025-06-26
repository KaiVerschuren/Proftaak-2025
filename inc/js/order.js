$(document).ready(function () {
  const categories = $(".category");
  const categorySetOne = $(".setOne");
  const categorySetTwo = $(".setTwo");
  const categorySetThree = $(".setThree");
  const buttons = $(".orderPageButton");
  const arrowButtons = $(".orderPageButtonArrow");

  let currentIndex = 0;

  let setOneComplete = false;
  let setTwoComplete = false;
  let setThreeComplete = false;

  // $(document).ready(function() {
  //   $(".popupBackground").show();
  // });

  function showCategory(index) {
    categories.css("transform", `translateX(-${100 * index}%)`);

    buttons.removeClass("orderButtonSelected");
    buttons.eq(index).addClass("orderButtonSelected");
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

  $(document).on("keydown", function (e) {
    if (e.key === "ArrowRight" || e.key === "Enter") {
      currentIndex = (currentIndex + 1) % 3;
      showCategory(currentIndex);
    } else if (e.key === "ArrowLeft") {
      currentIndex = (currentIndex + 2) % 3;
      showCategory(currentIndex);
    }
  });

  $(".setOne").on("click", function () {
    categorySetOne.removeClass("selectedSetOne");
    $(this).addClass("selectedSetOne");

    $("#productOne").val($(this).data("position")); // update on click

    checkSelected();

    $(".popupTablePosition1").html($(this).data("position"));
    $(".popupTableTitle1").html($(this).data("name"));

    let goodieData = $("#goodieData").data("goodie");
    // alert(goodieData);
    if (goodieData != "1") {
      // alert();
      $(".popupBackground").show();
      $(".popupHide").hide();
    }
  });

  $(".setTwo").on("click", function () {
    categorySetTwo.removeClass("selectedSetTwo");
    $(this).addClass("selectedSetTwo");

    $("#productTwo").val($(this).data("position")); // update on click

    checkSelected();

    $(".popupTablePosition2").html($(this).data("position"));
    $(".popupTableTitle2").html($(this).data("name"));
  });

  $(".setThree").on("click", function () {
    categorySetThree.removeClass("selectedSetThree");
    $(this).addClass("selectedSetThree");

    $("#productThree").val($(this).data("position")); // update on click
    $(".popupTablePosition3").html($(this).data("position"));
    $(".popupTableTitle3").html($(this).data("name"));

    checkSelected();

  });

  function checkSelected() {
    if ($(".setOne.selectedSetOne").length > 0) {
      setOneComplete = true;
      $(".orderPageButtonOne")
        .removeClass("btnPrimary")
        .addClass("btnSecondary");
    }
    if ($(".setTwo.selectedSetTwo").length > 0) {
      setTwoComplete = true;
      $(".orderPageButtonTwo")
        .removeClass("btnPrimary")
        .addClass("btnSecondary");
    }
    if ($(".setThree.selectedSetThree").length > 0) {
      setThreeComplete = true;
      $(".orderPageButtonThree")
        .removeClass("btnPrimary")
        .addClass("btnSecondary");
    }
    if (setOneComplete && setTwoComplete && setThreeComplete) {
      $(".popupBackground").show();
      requestAnimationFrame(() => {
        requestAnimationFrame(adjustFooter);
      });
    }
  }

  $('#popupChangeButton').on('click', function() {
    location.reload();
  });
});
