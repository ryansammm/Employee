$(document).ready(function () {
  $(".tambahformfoto").on("click", function () {
    let lastId = $(".listfoto:last").attr("id");
    let numberLastId = parseInt(lastId.split("_")[1]) + 1;

    let elementFormFoto = `
            <div class="col-2 listfoto pt-3" id="listfoto_${numberLastId}">
                <h6>Foto ${numberLastId}</h6>
                <input type="file" class="form-control" name="produk_foto[]">
                <button type="button" class="btn btn-sm btn-danger hapusformfoto mb-2 mt-2" id="hapuslistfoto_${numberLastId}">Hapus</button>
            </div>
        `;

    $(".listFormFoto").append(elementFormFoto);
  });

  $(document).on("click", ".hapusformfoto", function () {
    let idButton = $(this).attr("id");
    let numberId = idButton.split("_")[1];

    const idFormFoto = "#listfoto_" + numberId;

    $(idFormFoto).remove();
  });
});

$(document)
  .find(".foto_detail")
  .change(function () {
    var parent = $(this).parent();
    var file = $(this).get(0).files[0];
    if (file) {
      var reader = new FileReader();

      reader.onload = function () {
        parent
          .find(".foto_produk_lainnya_temp").val(reader.result);
        parent
          .find(".foto_detail_preview")
          .css("background", "url(" + reader.result + ")");
        parent.find(".foto_detail_preview").css("background-size", "cover");
        parent
          .find(".foto_detail_preview")
          .css("background-position:", "center");
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
$(document)
  .find(".btn_foto_detail")
  .on("click", function (event) {
    var file = $(this).attr("data-file");

    modal_file.find(".fileSakip").removeClass("d-none");
    if ($(this).attr("data-changed") == "1") {
      modal_file.find(".fileSakip")[0].setAttribute("src", file);
    } else {
      modal_file.find(".fileSakip")[0].setAttribute("src", '/assets/media/'+file);
    }
  });
