let toastTimeout;

function showToast(type, message, redirectUrl = null) {
  clearTimeout(toastTimeout);

  $(".toast").css("display", "none");
  void $(".toast")[0].offsetHeight;

  const colorMap = {
    success: "var(--success)",
    warning: "var(--warning)",
    error: "var(--error)",
    info: "var(--info)",
  };

  $(".toastIcon").css("color", colorMap[type] || "var(--info)");
  $(".toast").css("display", "flex");
  $(".toastContent").text(message);

  toastTimeout = setTimeout(() => {
    $(".toast").css("display", "none");
    if (redirectUrl) {
      window.location.href = redirectUrl;
    }
  }, 3000);
}

$(".toastCrossWrapper").on("click", () => {
  clearTimeout(toastTimeout);
  $(".toast").css("display", "none");
});

$(document).ready(() => {
  const toastDiv = $("#toastToggled");
  if (toastDiv.length) {
    const type = toastDiv.data("type");
    const message = toastDiv.data("message");
    const url = toastDiv.data("url");
    showToast(type, message, url);
  }
});
