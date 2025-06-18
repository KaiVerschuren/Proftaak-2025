const paginator = (function () {
  let currentPage = 1;
  let totalPages = 1;
  let itemsPerPage = 10;

  function update() {
    const $rows = $(".codesRow").not(".codesRowHeader");
    totalPages = Math.ceil($rows.length / itemsPerPage);

    if (currentPage < 1) currentPage = 1;
    if (currentPage > totalPages) currentPage = totalPages;

    $rows.hide();
    const start = (currentPage - 1) * itemsPerPage;
    $rows.slice(start, start + itemsPerPage).show();

    $(".pageNumber").text(currentPage);
  }

  return {
    init: function (perPage) {
      if (perPage) itemsPerPage = perPage;
      currentPage = 1;
      update();
    },
    next: function () {
      if (currentPage < totalPages) {
        currentPage++;
        update();
      }
    },
    prev: function () {
      if (currentPage > 1) {
        currentPage--;
        update();
      }
    },
    nextPages: function (n) {
      currentPage += n;
      if (currentPage > totalPages) currentPage = totalPages;
      update();
    },
    prevPages: function (n) {
      currentPage -= n;
      if (currentPage < 1) currentPage = 1;
      update();
    },
    getCurrentPage: function () {
      return currentPage;
    },
    getTotalPages: function () {
      return totalPages;
    },
  };
})();

$(document).ready(function () {
  paginator.init(10);

  $("#nextPage").on("click", function () {
    paginator.next();
  });

  $("#prevPage").on("click", function () {
    paginator.prev();
  });

  $("#next10Pages").click(() => paginator.nextPages(10));

  $("#prev10Pages").click(() => paginator.prevPages(10));
});
