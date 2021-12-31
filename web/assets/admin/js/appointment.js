$(document).on("change", "#timestart_appointment", function () {
  if ($(this).val() != "") {
    $(document).find("#timeend_appointment").prop("disabled", false);
  }
});

function cek_appointment(callback = null, id_zoom = null, id_ruangan = null) {
  $.ajax({
    type: "post",
    url: "/admin/appointment/check",
    data: {
      timestart_appointment: $(document).find("#timestart_appointment").val(),
      timeend_appointment: $(document).find("#timeend_appointment").val(),
    },
  }).done(function (data) {
    var zoom = '<option value="">-- Pilih Akun Zoom --</option>';
    var ruangan = '<option value="">-- Pilih Ruangan --</option>';

    data.datas.zoom.forEach((element) => {
      zoom += '<option value="' + element.id_zoom + '" ';
      if (element.booked && element.id_zoom != id_zoom) {
        zoom += "disabled";
      }
      zoom += ">" + element.nama_zoom + " ";
      if (element.booked && element.used && element.id_zoom == id_zoom) {
        zoom += "(Saat Ini Digunakan)";
      } else if (element.booked && element.id_zoom != id_zoom) {
        zoom += "(Tidak Tersedia)";
      }
      zoom += "</option>";
    });
    data.datas.ruangan.forEach((element) => {
      ruangan += '<option value="' + element.id_ruangan + '" ';
      if (callback == null) {
        ruangan += !element.booked ? "" : "disabled";
      } else {
        if (id_ruangan != element.id_ruangan) {
          ruangan += !element.booked ? "" : "disabled";
        }
      }
      ruangan += ">" + element.nama_ruangan + " ";
      if (id_ruangan == element.id_ruangan) {
        ruangan += !element.booked ? "" : "(Saat Ini Digunakan)";
      } else {
        ruangan += !element.booked ? "" : "(Tidak Tersedia)";
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
    var detail_id_zoom = $(document).find(".detail_id_zoom").val();
    var detail_id_ruangan = $(document).find(".detail_id_ruangan").val();

  if (detail_id_zoom !== '' && detail_id_ruangan !== '') {
    cek_appointment(null, detail_id_zoom, detail_id_ruangan);
  } else {
    cek_appointment();
  }
});