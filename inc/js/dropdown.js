let hideTimers = {};

$('.dropdownIcon').on('click', function(e) {
  e.stopPropagation();
  const num = $(this).data('num');
  
  // Toggle dropdown
  const $dropdown = $(`.codesDropdown[data-num="${num}"]`);
  if ($dropdown.hasClass('dropdownShow')) {
    $dropdown.removeClass('dropdownShow');
  } else {
    // Close others
    $('.codesDropdown').removeClass('dropdownShow');
    $dropdown.addClass('dropdownShow');
  }
});


$('.dropdownIcon, .codesDropdown').on('mouseenter', function() {
  const num = $(this).data('num');
  clearTimeout(hideTimers[num]);
});

$('.dropdownIcon, .codesDropdown').on('mouseleave', function() {
  const num = $(this).data('num');
  hideTimers[num] = setTimeout(() => {
    $(`.codesDropdown[data-num="${num}"]`).removeClass('dropdownShow');
  }, 100);
});
