<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>PT. Tristek Media Kreasindo</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/logo/PTA.png" />

    <!------- Font ------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!------- Bootstrap ------->
    <link href="/assets/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/public/css/bootstrap.css" rel="stylesheet">

    <!------- Bootstrap Icon ------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">

    <!------- Style theme ------->
    <link rel="stylesheet" href="/assets/public/css/style.css">

    <!------- JQuery ------->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>

    <!------- Plugins ------->
    <link rel="stylesheet" href="/assets/plugins/truncate.css">
    <link rel="stylesheet" href="/assets/plugins/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/plugins/owl-carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/plugins/fullcalendar/main.css">

    <!------- Datatable ------->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/b-html5-2.1.1/b-print-2.1.1/fh-3.2.1/r-2.2.9/sb-1.3.0/sp-1.4.0/sl-1.3.4/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/b-html5-2.1.1/b-print-2.1.1/fh-3.2.1/r-2.2.9/sb-1.3.0/sp-1.4.0/sl-1.3.4/datatables.min.js"></script>

    <!------- Captcha ------->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    <link rel="stylesheet" href="/assets/public/css/multi-dropdown.css">
    <link rel="stylesheet" href="/assets/public/css/dropdown-style-custom.css">

    <!------- Owl Carousel ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<style>
    @media print {
        body {
            width: 21cm;
            height: 29.7cm;
            /* change the margins as you want them to be. */
        }
    }

    .tooltip {
        font-size: 11px;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    @font-face {
        font-family: 'Astro-Space';
        src: url('/assets/fonts/Astro-Space.ttf') format('truetype');
    }

    table tr td {
        /* border-bottom: 0px; */
        padding-left: 0px !important;
        padding-bottom: 0px !important;
    }

    .em-title {
        /* border-bottom: 1px solid red; */
        width: 12rem;
        text-transform: uppercase;
        font-weight: bold;
    }

    .em-title span {
        border-bottom: none;
        /* width: 12rem; */
        text-transform: none;
        font-weight: normal;
    }

    hr {
        background-color: red;
        height: 1px;
        opacity: 100;
    }

    body {
        font-size: 8px;
        font-family: 'Poppins', sans-serif !important;
        margin-left: auto;
        margin-right: auto;
    }

    @media print {

        .page-break {
            page-break-after: always;
        }
    }

    td {
        padding: 0.2rem 0.5rem !important;
    }

    /* .foot {
        width: 80.6%;
        position: absolute;
        bottom: 3cm;
        font-size: 6px !important;
        border-top: 1px solid #cfcfcf;
    } */

    .header {
        position: fixed;
        top: 0;
    }

    .footer {
        position: fixed;
        bottom: 0;
        border-top: 1px solid #cfcfcf;
        width: 93%;
        height: 20px;
        margin: 0 1rem 0 1rem;
    }

    .content-page {
        page-break-after: always;
    }

    body {
        counter-reset: page;
    }


    .page-number::before {
        counter-increment: page;
        content: counter(page);

        bottom: 0;
        right: 10px;

        font-size: 20px;
        color: #b1b1b1;
    }
</style>

<body class="m-0 p-0 export content-wrapper">

    <div class="header">
        <div class="row mx-auto" style="background-color: #D3D3D3;padding: 0.5rem;border-bottom: 1px solid red;">
            <div class="col-4 my-auto">
                <div class="">
                    <img class="" src="/assets/logo/tmk-2-black.png" alt="" style="width: 70%;">
                </div>
            </div>
            <div class="col-3 text-center my-auto">
                <div>
                    <h5 style="color: #313131;font-size: 17px;">Data Karyawan</h5>
                </div>
            </div>
            <div class="col-5">
                <div class="text-white ms-5" style="font-size: 7.5px;">
                    <table class="table my-auto" style="border-color: #00000000;color: #313131;">
                        <tr>
                            <td class="pt-0">Kode Form</td>
                            <td class="pt-0">:</td>
                            <td class="pt-0">F.ADIUM-TMK.001/270821/R.01.3</td>
                        </tr>
                        <tr>
                            <td class="pt-0">Last Update</td>
                            <td class="pt-0">:</td>
                            <td class="pt-0"><?= date_format(date_create($detail['updated_at']), "d F Y") ?></td>
                        </tr>
                        <tr>
                            <td class="pt-0">Update By</td>
                            <td class="pt-0">:</td>
                            <td class="pt-0">Ryan Samsudin</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="content-page" style="margin-top: 1.2cm;">
        <!------- Card Body ------->
        <div class="card-body ps-2">

            <!------- Top Content ------->
            <div class="row">
                <!------- Profile Image ------->
                <div class="col-3">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h6 style="font-size: 10px;"><?= $karyawan['nama_lengkap'] ?></h6>
                            <div class="mb-2" style="border: 1px solid #dfdfdf;">
                                <img class="img-fluid p-1" src="/assets/media/<?= $karyawan['path_media'] ?>" alt="" style="height:205px">
                            </div>
                            <div class="text-center">
                                <div class="mb-2">Nama Panggilan :</div>
                                <h6 style="font-size: 13px;"><?= $karyawan['nama_panggilan'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!------- End Profile Image ------->

                <!------- Side Content ------->
                <div class="col-9">
                    <!------- Identitas Karyawan ------->
                    <div class="row">
                        <div class="col-6">
                            <div class="em-title">Identitas Karyawan</div>
                            <table class="table">
                                <tr>
                                    <td style="width: 48%;">Nama Lengkap Sesuai KTP</td>
                                    <td>:</td>
                                    <td><b><?= $karyawan['nama_lengkap'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td><b><?= $karyawan['nama'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Divisi</td>
                                    <td>:</td>
                                    <td><b><?= $karyawan['nama_divisi'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Bidang / Departemen</td>
                                    <td>:</td>
                                    <td><b><?= $karyawan['nama_bidang'] ?></b></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="table" style="margin-top: 0.8rem;">
                                <tr>
                                    <td style="width: 49%;">Status Kepegawaian</td>
                                    <td>:</td>
                                    <td><?= $karyawan['nama_status_kepegawaian'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Induk Karyawan</td>
                                    <td>:</td>
                                    <td><?= $karyawan['no_induk_karyawan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Masa Kerja</td>
                                    <td>:</td>
                                    <td><?= posted_at($karyawan['tgl_mulai_kerja'], 3) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!------- End Identitas Karyawan ------->

                    <hr class="mt-0 mb-2">

                    <!------- Data Pribadi ------->
                    <div class="em-title">Data Pribadi</div>
                    <div class="row">
                        <div class="col-6">
                            <table class="table">
                                <tr>
                                    <td style="width: 48%;">Nomor KTP</td>
                                    <td>:</td>
                                    <td><?= $karyawan['no_ktp'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Kartu Keluarga</td>
                                    <td>:</td>
                                    <td><?= $karyawan['no_kk'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Seluler Pribadi</td>
                                    <td>:</td>
                                    <td><?= $karyawan['no_seluler_pribadi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Seluler Kantor</td>
                                    <td>:</td>
                                    <td><?= $karyawan['no_seluler_kantor'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Email Pribadi</td>
                                    <td>:</td>
                                    <td><?= $karyawan['email_pribadi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Email Kantor</td>
                                    <td>:</td>
                                    <td><?= $karyawan['email_kantor'] ?></td>
                                </tr>
                                <tr>
                                    <td>Kewarganegaraan</td>
                                    <td>:</td>
                                    <td><?= $karyawan['kewarganegaraan'] ?></td>
                                </tr>
                                <tr>
                                    <td>No. Passport, Bila Ada</td>
                                    <td>:</td>
                                    <td><?= $karyawan['no_passport'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Sim C</td>
                                    <td>:</td>
                                    <td><?= $karyawan['no_sim_c'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="table">
                                <tr>
                                    <td style="width: 48%;">Tempat Lahir</td>
                                    <td>:</td>
                                    <td><?= $karyawan['tempat_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= date_format(date_create($karyawan['tgl_lahir']), "d F Y") ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= $karyawan['jenis_kelamin'] == 1 ? 'Laki-Laki' : 'Perempuan' ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><?= $karyawan['status_perkawinan'] == 1 ? 'Sudah Menikah' : 'Belum Menikah' ?></td>
                                </tr>
                                <tr>
                                    <td>Berat Badan</td>
                                    <td>:</td>
                                    <td><?= $karyawan['berat_badan'] ?> KG</td>
                                </tr>
                                <tr>
                                    <td>Alamat Email Kantor</td>
                                    <td>:</td>
                                    <td><?= $karyawan['tinggi_badan'] ?> CM</td>
                                </tr>
                                <tr>
                                    <td>Golongan Darah</td>
                                    <td>:</td>
                                    <td><?= $karyawan['golongan_darah'] ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td><?= $karyawan['agama_detail'] ?></td>
                                </tr>
                                <tr>
                                    <td>No. Sim A/B/B1/B2</td>
                                    <td>:</td>
                                    <td><?= $karyawan['no_sim_lainnya'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!------- Data Pribadi ------->
                </div>
                <!------- End Side Content ------->
            </div>
            <!------- End Top Content ------->

            <hr class="mt-0 mb-2" style="background-color: red;">

            <!------- Alamat ------->
            <div class="row">
                <div class="col-6">
                    <div class="em-title mb-2">Alamat Sesuai KTP</div>
                    <div>
                        <?= $karyawan['alamat_ktp'] ?><br>
                        <?= $karyawan['kode_pos_ktp'] ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="em-title mb-2">Alamat Tinggal Saat Ini</div>
                    <div>
                        <?= $karyawan['alamat_tinggal'] ?><br>
                        <?= $karyawan['kode_pos_tinggal'] ?>
                    </div>
                </div>
            </div>
            <!------- End Alamat ------->

            <hr class="my-2">

            <!------- Asuransi | Perbankan | Perpajakan ------->
            <div class="row">
                <!------- Asuransi ------->
                <div class="col-4 mb-0">
                    <div class="em-title mb-0">Asuransi</div>
                    <table class="table  mb-1">
                        <tr>
                            <td>No. BPJS Ketenagakerjaan</td>
                            <td>:</td>
                            <td><?= $karyawan['no_bpjs_ketenagakerjaan'] ?></td>
                        </tr>
                        <tr>
                            <td>No. BPJS Kesehatan</td>
                            <td>:</td>
                            <td><?= $karyawan['no_bpjs_kesehatan'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Asuransi Lainnya</td>
                            <td>:</td>
                            <td><?= $karyawan['nama_asuransi'] ?></td>
                        </tr>
                        <tr>
                            <td>No. Asuransi</td>
                            <td>:</td>
                            <td><?= $karyawan['no_asuransi'] ?></td>
                        </tr>
                    </table>
                </div>
                <!------- End Asuransi ------->

                <!------- Perbankan ------->
                <div class="col-4 mb-0">
                    <div class="em-title mb-0">Perbankan</div>
                    <table class="table  mb-1">
                        <tr>
                            <td>Nama Bank</td>
                            <td>:</td>
                            <td><?= $karyawan['nama_bank'] ?></td>
                        </tr>
                        <tr>
                            <td>No. Rekening</td>
                            <td>:</td>
                            <td><?= $karyawan['no_rek_bank'] ?></td>
                        </tr>
                        <tr>
                            <td>Cabang</td>
                            <td>:</td>
                            <td><?= $karyawan['cabang_bank'] ?></td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>:</td>
                            <td><?= $karyawan['an_bank'] ?></td>
                        </tr>
                    </table>
                </div>
                <!------- End Perbankan ------->

                <!------- Perpajakan ------->
                <div class="col-4 mb-0">
                    <div class="em-title mb-0">Perpajakan</div>
                    <table class="table mb-1">
                        <tr>
                            <td style="width: 48%;">Nomor NPWP</td>
                            <td style="width: 3%;">:</td>
                            <td><?= $karyawan['no_npwp'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama KPP</td>
                            <td>:</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Tanggal terdaftar</td>
                            <td>:</td>
                            <td><?= $karyawan['tgl_terdaftar_pajak'] ?></td>
                        </tr>
                    </table>
                </div>
                <!------- End Perpajakan ------->
            </div>
            <!------- End Asuransi | End Perbankan | End Perpajakan ------->

            <hr class="my-2">

            <!------- Pendidikan ------->
            <div class="row">
                <!------- Pendidikan Formal ------->
                <div class="col-6">
                    <div class="em-title">Pendidikan Formal</div>
                    <table class="table mb-1 mt-1">
                        <?php foreach ($pendidikan_formal->items as $key => $value) { ?>
                            <tr>
                                <td><?= $value['nama_pendidikan'] ?></td>
                                <td>:</td>
                                <td><?= $value['nama_sekolah'] ?></td>
                                <td>Tahun Lulus</td>
                                <td>:</td>
                                <td><?= $value['tahun_lulus'] ?></td>
                            </tr>
                            <?php if ($value['jenis_pendidikan'] > 2) { ?>
                                <tr>
                                    <td style="margin-left: 2rem !important;display: block;">Jurusan, Bila Ada</td>
                                    <td>:</td>
                                    <td><?= $value['jurusan'] ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </div>
                <!------- End Pendidikan Formal ------->

                <!------- Pendidikan Non Formal ------->
                <div class="col-6">
                    <div class="em-title text-nowrap">Pendidikan Non Formal,
                        <span style="font-weight: normal;text-transform: none;font-style: italic;">(Sertifikasi, Pelatihan Kerja, Kursus/Seminar dll)</span>
                    </div>
                    <?php foreach ($pendidikan_non_formal->items as $key => $value) { ?>
                        <table class="table mt-1">
                            <tr>
                                <td style="width: 49%;">Nama Lembaga</td>
                                <td style="width: 3%;">:</td>
                                <td><?= $value['nama_lembaga'] ?></td>
                            </tr>
                            <tr>
                                <td>Periode Tahun</td>
                                <td>:</td>
                                <td><?= $value['periode_tahun'] ?></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td><?= $value['deskripsi'] ?></td>
                            </tr>
                        </table>
                    <?php } ?>
                </div>
                <!------- End Pendidikan Non Formal ------->
            </div>
            <!------- End Pendidikan ------->

            <hr class="my-2">

            <!------- Kemampuan | Hobi | Karakter ------->
            <div class="row">
                <!------- Kemampuan ------->
                <div class="col-6">
                    <div class="em-title mb-1">Kemampuan :</div>
                    <div style="margin-left: 1rem;">
                        <table class="table mb-2">
                            <?php foreach ($kemampuan->items as $key => $value) { ?>
                                <tr>
                                    <td style="width: 3%;"><?= $key += 1 ?>.</td>
                                    <td style="width: 49%;"><?= $value['nama_kemampuan'] ?></td>
                                    <td style="width: 4%;">:</td>
                                    <td><?= $value['tingkatan'] ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <!------- End Kemampuan ------->

                <!------- Hobi ------->
                <div class="col-3">
                    <div class="em-title mb-1">Hobi :</div>
                    <div class="border-bottom">
                        <span><?= $karyawan['hobi'] ?></span>
                    </div>
                </div>
                <!------- End Hobi ------->

                <!------- Karakter ------->
                <div class="col-3">
                    <div class="em-title mb-1">Karakter :</div>
                    <div class="border-bottom">
                        <span><?= $karyawan['karakter'] ?></span>
                    </div>
                </div>
                <!------- End Karakter ------->
            </div>
            <!------- End Kemampuan | End Hobi | End Karakter ------->

            <hr class="my-2">

            <!------- Keluarga Yang Bisa Dihubungi | Pengalaman Organisasi ------->
            <div class="row">
                <!------- Keluarga Yang Bisa Dihubungi ------->
                <div class="col-6">
                    <div class="text-nowrap em-title mb-1">Keluarga Yang Bisa Dihubungi</div>
                    <table class="table mb-1">
                        <tr>
                            <td style="width: 55%;">Nama Lengkap</td>
                            <td>:</td>
                            <td><b><?= $karyawan_kontak_alt['nama_kontak_alt'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Hubungan Keluarga</td>
                            <td>:</td>
                            <td><b><?= $karyawan_kontak_alt['hubungan_keluarga_kontak_alt'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Alamat Lengkap</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="margin-left: 2rem !important;display: block;"><?= $karyawan_kontak_alt['alamat_kontak_alt'] ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Nomor Seluler Keluarga</td>
                            <td>:</td>
                            <td><?= $karyawan_kontak_alt['no_telp_kontak_alt'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat E-mail Keluarga</td>
                            <td>:</td>
                            <td><?= $karyawan_kontak_alt['email_kontak_alt'] ?></td>
                        </tr>
                    </table>
                </div>
                <!------- End Keluarga Yang Bisa Dihubungi ------->

                <!------- Pengalaman Organisasi ------->
                <div class="col-6">
                    <div class="em-title mb-1 text-nowrap">Pengalaman Organisasi,<span> Sebelum Bergabung</span></div>
                    <?php foreach ($pengalaman_organisasi->items as $key => $value) { ?>
                        <table class="table mb-1">
                            <tr>
                                <td style="width: 48%;">Nama Lembaga / Organisasi</td>
                                <td style="width: 3%;">:</td>
                                <td><?= $value['nama_organisasi'] ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan di Lembaga / Organisasi</td>
                                <td>:</td>
                                <td><?= $value['jabatan_organisasi'] ?></td>
                            </tr>
                            <tr>
                                <td>Periode Keaktifan</td>
                                <td>:</td>
                                <td><?= $value['periode_aktif'] ?></td>
                            </tr>
                        </table>
                    <?php } ?>
                </div>
                <!------- End Pengalaman Organisasi ------->
            </div>
            <!------- End Keluarga Yang Bisa Dihubungi | End Pengalaman Organisasi ------->

        </div>
        <!------- End Card Body ------->
        <div class="page-number" style="position: absolute;bottom: 0.6%;right: 20px;"></div>
    </div>

    <?php if (empty($pendidikan_non_formal_bergabung->items) && empty($pengalaman_organisasi_bergabung->items) && empty($pengalaman_pekerjaan->items)) { ?>
    <?php   } else { ?>
        <div class="content-page" style="margin-top: 1cm;">
            <!------- Card Body ------->
            <div class="card-body ps-2">
                <!------- Pendidikan Non Formal ------->
                <?php if (empty($pendidikan_non_formal_bergabung->items)) { ?>
                <?php } else { ?>
                    <div class="em-title mb-1 text-nowrap mt-2">Pendidikan Non Formal,
                        <span> Setelah Bergabung</span>
                        <br>
                        <span style="font-weight: normal;text-transform: none;font-style: italic;">(Sertifikasi, Pelatihan Kerja, Kursus/Seminar dll)</span>
                    </div>
                    <div class="row">
                        <?php foreach ($pendidikan_non_formal_bergabung->items as $key => $value) { ?>
                            <div class="col-6">
                                <table class="table mb-1">
                                    <tr>
                                        <td style="width: 49%;">Nama Lembaga</td>
                                        <td style="width: 3%;">:</td>
                                        <td><?= $value['nama_lembaga'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Periode Tahun</td>
                                        <td>:</td>
                                        <td><?= $value['periode_tahun'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td><?= $value['deskripsi'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                    <hr class="my-2">
                <?php } ?>
                <!------- End Pendidikan Non Formal ------->

                <!------- Pengalaman Organisasi ------->
                <?php if (empty($pengalaman_organisasi_bergabung->items)) { ?>
                <?php } else { ?>
                    <div class="em-title mb-1 text-nowrap">Pengalaman Organisasi,
                        <span> Setelah Bergabung</span>
                    </div>
                    <div class="row">
                        <?php foreach ($pengalaman_organisasi_bergabung->items as $key => $value) { ?>
                            <div class="col-6">
                                <table class="table mb-1">
                                    <tr>
                                        <td style="width: 48%;">Nama Lembaga / Organisasi</td>
                                        <td style="width: 3%;">:</td>
                                        <td><?= $value['nama_organisasi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan di Lembaga / Organisasi</td>
                                        <td>:</td>
                                        <td><?= $value['jabatan_organisasi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Periode Keaktifan</td>
                                        <td>:</td>
                                        <td><?= $value['periode_aktif'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                    <hr class="my-2">
                <?php } ?>
                <!------- End Pengalaman Organisasi ------->

                <!------- Pengalaman Pekerjaan ------->
                <?php if (empty($pengalaman_pekerjaan->items)) { ?>
                <?php } else { ?>
                    <div class="em-title mb-1 text-nowrap">Pengalaman Pekerjaan</div>
                    <div class="row">
                        <?php foreach ($pengalaman_pekerjaan->items as $key => $value) { ?>
                            <div class="col-6">
                                <table class="table">
                                    <tr>
                                        <td style="width: 30%;">Nama Lembaga</td>
                                        <td style="width: 3%;">:</td>
                                        <td><?= $value['nama_lembaga'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pekerjaan</td>
                                        <td>:</td>
                                        <td><?= $value['nama_pekerjaan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi Pekerjaan</td>
                                        <td>:</td>
                                        <td><?= $value['lokasi_lembaga'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Periode Pelaksanaan </td>
                                        <td>:</td>
                                        <td><?= $value['periode_pelaksanaan'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <!------- End Pengalaman Pekerjaan ------->
            </div>
            <!------- End Card Body ------->
            <div class="page-number" style="position: absolute;bottom: -99.4%;right: 20px;"></div>
        </div>
    <?php } ?>

    <div class="footer">
        <div class="row">
            <div class="col-12">
                <small>
                    PT. Tristek Media Kreasindo <span class="counter"></span>
                </small>
            </div>
        </div>
    </div>


</body>

<script>
    window.print();
</script>

</html>