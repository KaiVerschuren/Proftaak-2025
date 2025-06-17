$(document).ready(function () {
  let text;
  $('#authInput').prop('value', 'goodie-');
  $("#goodieCode").on("change", function () {
    if ($("#goodieCode").prop("checked")) {
      text = $("#authInput").prop("value");
      $("#authInput").prop("value", "goodie-" + text);
    } else if ($("#goodieCode").prop("checked") === false) {
      text = $("#authInput").prop("value");
      $("#authInput").prop("value", text.replace("goodie-", ""));
    }
  });
});
