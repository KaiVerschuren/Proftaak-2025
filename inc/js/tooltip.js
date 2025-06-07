$(document).on('mousemove', function(e) {
  $('#tooltip').css({
    top: e.clientY + 'px',
    left: e.clientX + 'px',
  });
});

$('[data-tooltip]').on('mouseenter', function() {
  $('#tooltip').text($(this).data('tooltip')).addClass('tooltipShow');
}).on('mouseleave', function() {
  $('#tooltip').removeClass('tooltipShow');
});
