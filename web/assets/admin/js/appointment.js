$(document).on("change", "#timestart_appointment", function () {
  if ($(this).val() != "") {
    $(document).find("#timeend_appointment").prop("disabled", false);
  }
});

function cek_appointment(callback = null, id_zoom = null, id_ruangan = null) {
  $.ajax({
    type: "post",
    url: "/admin/appointment-approval/check",
    data: {
      timestart_appointment: $(document).find("#timestart_appointment").val(),
      timeend_appointment: $(document).find("#timeend_appointment").val(),
    },
  }).done(function (data) {
    var zoom = '<option value="">-- Pilih Akun Zoom --</option>';
    var ruangan = '<option value="">-- Pilih Ruangan --</option>';

    data.datas.zoom.forEach((element) => {
      zoom += '<option value="' + element.id_zoom + '" ';
      if (callback == null) {
        zoom += typeof element.used == "undefined" ? "" : "disabled";
      } else {
        if ((id_zoom != '' && id_zoom != null) && (id_zoom != element.id_zoom)) {
          zoom += typeof element.used == "undefined" ? "" : "disabled";
        }
      }
      zoom += ">" + element.nama_zoom + " ";
      if (callback != null) {
        zoom +=
          "" +
          (typeof element.used == "undefined" ? "" : "(Saat Ini Digunakan)");
      } else {
        zoom +=
          "" + (typeof element.used == "undefined" ? "" : "(Tidak Tersedia)");
      }
      zoom += "</option>";
    });
    data.datas.ruangan.forEach((element) => {
      ruangan += '<option value="' + element.id_ruangan + '" ';
      if (callback == null) {
        ruangan += typeof element.used == "undefined" ? "" : "disabled";
      } else {
        if (id_ruangan != element.id_ruangan) {
          ruangan += typeof element.used == "undefined" ? "" : "disabled";
        }
      }
      ruangan += ">" + element.nama_ruangan + " ";
      if (callback != null) {
        ruangan +=
          "" +
          (typeof element.used == "undefined" ? "" : "(Saat Ini Digunakan)");
      } else {
        ruangan +=
          "" + (typeof element.used == "undefined" ? "" : "(Tidak Tersedia)");
      }
      ruangan += "</option>";
    });
    $(document).find(".id_zoom").html(zoom);
    $(document).find(".id_ruangan").html(ruangan);

    if (callback != null) {
      callback(id_zoom, id_ruangan);
    }
  });
}

function setIdZoom(id) {
  $(document).find(".id_zoom").val(id);
}

function setIdRuangan(id) {
  $(document).find(".id_ruangan").val(id);
}

//cek availibility akun zoom dan ruangan
$(document).on("change", "#timeend_appointment", function () {
  cek_appointment();
});
