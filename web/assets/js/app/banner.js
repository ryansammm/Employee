var orientasi = $(".orientasi_banner").val();
var lokasi = $(".lokasi_banner").val();
function get_list_banner() {
  if (orientasi != "" && lokasi != "") {
    $.get(
      "/admin/banner/get",
      {
        orientasi: orientasi,
        lokasi: lokasi,
        id_banner: $(".id_banner_edit").val()
      },
      function (data) {
        var elem = "";
        for (let index = 0; index < data.items.length; index++) {
          const element = data.items[index];
          elem +=
            '<tr><th scope="row">' +
            (index + 1) +
            '</th><td style="width: 400px;">' +
            element.nama_banner +
            '</td><td><img src="/assets/media/' +
            element.path_media +
            '" class="img-fluid img-thumbnail" style="width: 100px;"></td><td><input type="number" min="1" name="' +
            element.id_banner +
            '" class="form-control" placeholder="urutan" style="width: 100px;" value="' +
            element.urutan_banner +
            '"></td></tr>';
        }

        $(".body-table-banner").html(elem);
      }
    );
  }
}

$(".orientasi_banner").on("change", function () {
  orientasi = $(this).val();
  get_list_banner();
});

$(".lokasi_banner").on("change", function () {
  lokasi = $(this).val();
  get_list_banner();
});
