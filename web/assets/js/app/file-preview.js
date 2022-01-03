$("#dokumenPersyaratan").on("show.bs.modal", function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  var file = button.getAttribute("data-file");
  var extFile = file.split(".");

  if (extFile[1] == "jpg" || extFile[1] == "png" || extFile[1] == "jpeg") {
    $(this).find(".fileSakip").removeClass("d-none");
    $(this).find("#fileSakipPDF").addClass("d-none");
    $(this)
      .find(".fileSakip")[0]
      .setAttribute("src", file);
  } else {
    $(this).find(".fileSakip").addClass("d-none");
    $(this).find("#fileSakipPDF").removeClass("d-none");
    $(this)
      .find("#fileSakipPDF")[0]
      .setAttribute("src", "/assets/media/" + file);
  }
});
