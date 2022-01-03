$(document).ready(function () {
  $(".tambahformfoto").on("click", function () {
    let lastId = $(".listfoto:last").attr("id");
    let numberLastId = parseInt(lastId.split("_")[1]) + 1;

    let elementFormFoto = `
        <div class="col-2 listfoto preview_list_foto pt-3" id="listfoto_${numberLastId}">
            <label>Foto ${numberLastId}</label>
            <a href="#" class="mb-2 btn_foto_detail" data-toggle="modal" data-target="#dokumenPersyaratan" data-file="" data-changed="2">
              <div class="mb-2 foto_detail_preview" style="background: url('/assets/logo/produk.png');display:block;width:100%;height:150px;background-size:cover;background-position:center;background-repeat:no-repeat;border-radius:5px;border: 1px solid #cbcbcb;"></div>
            </a>
            <input type="file" class="form-control foto_detail" name="produk_foto[]">
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

$('.produk_foto_utama').change(function () {
  console.log('test');
  var file = $(this).get(0).files[0];
  if (file) {
    var reader = new FileReader();

    reader.onload = function () {
      $(".produk_foto_utama_preview").attr("src", reader.result);
      $(".produk_foto_utama_temp").val(reader.result);
    }
    reader.readAsDataURL(file);
  }
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