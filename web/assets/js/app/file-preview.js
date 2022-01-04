$("#dokumenPersyaratan").on("show.bs.modal", function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  var file = button.getAttribute("data-file");
  var extFile = file.split(".");

  $(this).find(".fileSakip").removeClass("d-none");
    $(this).find("#fileSakipPDF").addClass("d-none");
    $(this)
      .find(".fileSakip")[0]
      .setAttribute("src", file);
});
