/* ------------------------------- Number Only ------------------------------ */
$('.number').on('input', function () {
    this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
});
/* -------------------------------------------------------------------------- */

/* ---------------------------------- SIM C --------------------------------- */
document.getElementById('sim-c').addEventListener('input', function () {
    var input = document.getElementById('sim-c').value;
    var alert = document.getElementById('alert');
    var panjang = input.length;

    document.getElementById('sim-c').setAttribute('maxlength', 16);
    switch (panjang) {
        case 4:
            input += '-';
            break;
        case 9:
            input += '-';
            break;
    }
    document.getElementById('sim-c').value = input;
    alert.innerHTML = panjang;
});
/* -------------------------------------------------------------------------- */

/* ----------------------------------- IDR ---------------------------------- */
$(function () {
    $(".uang").keyup(function (e) {
        $(this).val(format($(this).val()));
    });
});
var format = function (num) {
    var str = num.toString().replace("", ""),
        parts = false,
        output = [],
        i = 1,
        formatted = null;
    if (str.indexOf(",") > 0) {
        parts = str.split(",");
        str = parts[0];
    }
    str = str.split("").reverse();
    for (var j = 0, len = str.length; j < len; j++) {
        if (str[j] != ".") {
            output.push(str[j]);
            if (i % 3 == 0 && j < (len - 1)) {
                output.push(".");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    return ("" + formatted + ((parts) ? "," + parts[1].substr(0, 2) : ""));
};
/* -------------------------------------------------------------------------- */

/* --------------------------------- Rupiah --------------------------------- */
$('.rupiah').on('keyup', function (e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    $(this).val(formatRupiah($(this).val()));
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
/* -------------------------------------------------------------------------- */

/* ---------------------------------- Npwp ---------------------------------- */
document.getElementById('npwp').addEventListener('input', function () {
    var input = document.getElementById('npwp').value;
    var alert = document.getElementById('alert');
    var panjang = input.length;

    document.getElementById('npwp').setAttribute('maxlength', 20);
    switch (panjang) {
        case 2:
            input += '.';
            break;
        case 6:
            input += '.';
            break;
        case 10:
            input += '.';
            break;
        case 12:
            input += '-';
            break;
        case 16:
            input += '.';
            break;
    }
    document.getElementById('npwp').value = input;
    alert.innerHTML = panjang;
});
/* -------------------------------------------------------------------------- */


// $(document).on('input', function () {
//     this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');

//     var num = $('.phone').val();
//     if (num.indexOf('0') !== 0) {
//         alert('First number must be 62');
//         $('.phone').val('');
//     }
// });