$(document).ready(function () {
  // logout modal
  $("#modal--logout").on("shown.bs.modal", function () {
    $(this).find("button:last-child").trigger("focus");
  });
});
