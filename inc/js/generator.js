let hideTimers = {};

$(".dropdownIcon").on("click", function (e) {
  e.stopPropagation();
  const num = $(this).data("num");

  // Toggle dropdown
  const $dropdown = $(`.codesDropdown[data-num="${num}"]`);
  if ($dropdown.hasClass("dropdownShow")) {
    $dropdown.removeClass("dropdownShow");
  } else {
    // Close others
    $(".codesDropdown").removeClass("dropdownShow");
    $dropdown.addClass("dropdownShow");
  }
});

$(".dropdownIcon, .codesDropdown").on("mouseenter", function () {
  const num = $(this).data("num");
  clearTimeout(hideTimers[num]);
});

$(".dropdownIcon, .codesDropdown").on("mouseleave", function () {
  const num = $(this).data("num");
  hideTimers[num] = setTimeout(() => {
    $(`.codesDropdown[data-num="${num}"]`).removeClass("dropdownShow");
  }, 100);
});

$("#codeType").on("change", function () {
  if ($(this).val() !== "simple") {
    $("#generatorCheckbox").prop("checked", false);
  }
});

$("#generatorCheckbox").on("change", function () {
  if ($(this).prop("checked") && $("#codeType").val() !== "simple") {
    $("#codeType").val("simple");
  }
});

$(".codeInner").on("click", function () {
  let clicked = this;

  $(".codeInner").each(function () {
    if (this !== clicked) {
      $(this).addClass("blurred");
    } else {
      $(this).removeClass("blurred");
    }
  });
});

$(".codeHeader").on("click", function () {
  $(".codeInner").each(function () {
    $(this).removeClass("blurred");
  });
});
