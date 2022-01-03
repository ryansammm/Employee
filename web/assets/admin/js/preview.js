$(".foto_utama").change(function () {
  console.log("test");
  var file = $(this).get(0).files[0];
  if (file) {
    var reader = new FileReader();

    reader.onload = function () {
      $(".foto_utama_preview").attr("src", reader.result);
      $(".foto_utama_temp").val(reader.result);
    };
    reader.readAsDataURL(file);
  }
});

$(document).on("change", ".foto_detail", function () {
  var parent = $(this).closest(".preview_list_foto");
  var file = $(this).get(0).files[0];
  if (file) {
    var reader = new FileReader();

    reader.onload = function () {
      parent.find(".foto_lainnya_temp").val(reader.result);
      parent
        .find(".foto_detail_preview")
        .css("background", "url(" + reader.result + ")");
      parent.find(".foto_detail_preview").css("background-size", "cover");
      parent.find(".foto_detail_preview").css("background-position:", "center");
      parent
        .find(".foto_detail_preview")
        .css("background-repeat:", "no-repeat");

      parent
        .find(".btn_foto_detail")[0]
        .setAttribute("data-file", reader.result);

      parent.find(".btn_foto_detail")[0].setAttribute("data-changed", "1");
    };
    reader.readAsDataURL(file);
  }
});

var modal_file = $("#dokumenPersyaratan");
$(document).on("click", ".btn_foto_detail", function (event) {
  var file = $(this).attr("data-file");

  modal_file.find(".fileSakip").removeClass("d-none");
  if ($(this).attr("data-changed") == "1") {
    modal_file.find(".fileSakip")[0].setAttribute("src", file);
  } else {
    modal_file
      .find(".fileSakip")[0]
      .setAttribute("src", "/assets/media/" + file);
  }
});
