$("document").ready(function () {
  if (!window.location.pathname.includes("order.php")) {
    return;
  }
  // Check if the order was successful
  const orderStatus = $("#ordered").data("order");
//   alert("orderStatus: " + orderStatus);
  if (orderStatus) {
    sendOrder();
  }
});

function sendOrder() {
  const one = $("#productOne").val();
  const two = $("#productTwo").val();
  const three = $("#productThree").val();

  const query = `send.php?productOne=${one}&productTwo=${two}&productThree=${three}`;

  $.get(query, function (data) {
    alert(data);
  });
}
