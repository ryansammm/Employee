<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>PT. Panca Teknologi Aksesindo</title>

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

<script>
    $(document).on('click', function() {
        $('.collapse').collapse('hide');
    })
    feather.replace()
</script>

<style>
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

    #calendar {
        max-width: 1100px;
        margin: 0 auto;
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
        font-size: 12px;
        font-family: 'Poppins', sans-serif !important;
    }
</style>

<body>
    <div class="container-fluid px-4">
        <div class="card mb-3">

            <!------- Header ------->
            <div class="">
                <div class="row mx-auto" style="background-color: #1c1c1c;padding: 0.5rem;">
                    <div class="col-md-4 my-auto">
                        <div class="text-center">
                            <img class="" src="/assets/logo/tristek.png" alt="" style="width: 35%;">
                        </div>
                    </div>
                    <div class="col-md-4 text-center my-auto">
                        <div>
                            <h3 class="text-light">Data Karyawan</h3>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left: 8rem;">
                        <div class="text-white">
                            <table class="table text-white" style="border-color: #00000000;">
                                <tr>
                                    <td>Kode Form</td>
                                    <td>:</td>
                                    <td>F.ADIUM-TMK.001/270821/R.01.3</td>
                                </tr>
                                <tr>
                                    <td>Last Update</td>
                                    <td>:</td>
                                    <td><?= date_format(date_create($detail['updated_at']), "d F Y") ?></td>
                                </tr>
                                <tr>
                                    <td>Update By</td>
                                    <td>:</td>
                                    <td>Ryan Samsudin</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!------- End Header ------->

            <div class="card-body container ps-2">
                <div class="row">

                    <!------- Profile Image ------->
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h6><?= $karyawan['nama_lengkap'] ?></h6>
                                <div class="mb-2" style="border: 1px solid #dfdfdf;">
                                    <img class="img-fluid p-3" src="/assets/media/<?= $karyawan['path_media'] ?>" alt="">
                                </div>
                                <div class="text-center">
                                    <div class="mb-3">Nama Panggilan :</div>
                                    <h4><?= $karyawan['nama_panggilan'] ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------- End Profile Image ------->

                    <div class="col-md-9">
                        <!------- Identitas Karyawan ------->
                        <div class="row">
                            <div class="col-md-6">
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
                                        <td><b><?= $karyawan['nama_jabatan'] ?></b></td>
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
                            <div class="col-md-6">
                                <table class="table" style="margin-top: 1.2rem;">
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
                                        <td><?= posted_at($karyawan['tgl_mulai_kerja'], 4) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!------- End Identitas Karyawan ------->

                        <hr>

                        <!------- Data Pribadi ------->
                        <div class="em-title">Data Pribadi</div>
                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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

                </div>

                <nav class="nav justify-content-end">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-bottom: 0px;">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Data Sebelum Bergabung</button>
                        <button class="nav-link" id="nav-setelah-tab" data-bs-toggle="tab" data-bs-target="#nav-setelah" type="button" role="tab" aria-controls="nav-setelah" aria-selected="true">Data Setelah Bergabung</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Dokumen Pendukung</button>
                    </div>
                </nav>


                <hr class="mt-0" style="background-color: red;">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="em-title mb-2">Alamat Sesuai KTP</div>
                                <div>
                                    <?= $karyawan['alamat_ktp'] ?><br>
                                    <?= $karyawan['kode_pos_ktp'] ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="em-title mb-2">Alamat Tinggal Saat Ini</div>
                                <div>
                                    <?= $karyawan['alamat_tinggal'] ?><br>
                                    <?= $karyawan['kode_pos_tinggal'] ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="em-title mb-3">Asuransi</div>
                                <table class="table">
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
                            <div class="col-md-4">
                                <div class="em-title mb-3">Perbankan</div>
                                <table class="table">
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
                            <div class="col-md-4">
                                <div class="em-title mb-3">Perpajakan</div>
                                <table class="table">
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
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="em-title">Pendidikan Formal</div>

                                <table class="table" style="margin-top: 1.2rem;">

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
                            <div class="col-md-6">
                                <div class="em-title text-nowrap">Pendidikan Non Formal,
                                    <span> Sebelum Bergabung</span>
                                    <br>
                                    <span style="font-weight: normal;text-transform: none;font-style: italic;">(Sertifikasi, Pelatihan Kerja, Kursus/Seminar dll)</span>
                                </div>

                                <?php foreach ($pendidikan_non_formal->items as $key => $value) { ?>
                                    <table class="table mb-3">
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
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">

                                <!-- <div>Kemampuan :</div> -->
                                <div class="em-title mb-3">Kemampuan :</div>
                                <div style="margin-left: 1rem;">
                                    <table class="table">
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

                            <div class="col-md-3">
                                <div class="em-title mb-3">Hobi :</div>
                                <div class="border-bottom">
                                    <span><?= $karyawan['hobi'] ?></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="em-title mb-3">Karakter :</div>
                                <div class="border-bottom">
                                    <span><?= $karyawan['karakter'] ?></span>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-nowrap em-title mb-3">Keluarga Yang Bisa Dihubungi</div>
                                <table class="table">
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
                            <div class="col-md-6">
                                <div class="em-title mb-3 text-nowrap">Pengalaman Organisasi,<span> Sebelum Bergabung</span></div>

                                <?php foreach ($pengalaman_organisasi->items as $key => $value) { ?>
                                    <table class="table mb-3">
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
                        </div>

                    </div>

                    <div class="tab-pane fade" id="nav-setelah" role="tabpanel" aria-labelledby="setelah-tab">
                        <?php if (empty($pendidikan_non_formal_bergabung->items)) { ?>
                        <?php } else { ?>
                            <div class="em-title mb-3 text-nowrap">Pendidikan Non Formal,
                                <span> Setelah Bergabung</span>
                                <br>
                                <span style="font-weight: normal;text-transform: none;font-style: italic;">(Sertifikasi, Pelatihan Kerja, Kursus/Seminar dll)</span>
                            </div>
                            <div class="row">
                                <?php foreach ($pendidikan_non_formal_bergabung->items as $key => $value) { ?>
                                    <div class="col-md-6">
                                        <table class="table mb-3">
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
                            <hr>
                        <?php } ?>

                        <?php if (empty($pengalaman_organisasi_bergabung->items)) { ?>
                        <?php } else { ?>
                            <div class="em-title mb-3 text-nowrap">Pengalaman Organisasi,
                                <span> Setelah Bergabung</span>
                            </div>
                            <div class="row">
                                <?php foreach ($pengalaman_organisasi_bergabung->items as $key => $value) { ?>
                                    <div class="col-md-6">
                                        <table class="table mb-3">
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
                            <hr>
                        <?php } ?>

                        <div class="em-title mb-3 text-nowrap">Pengalaman Pekerjaan</div>
                        <div class="row">
                            <?php foreach ($pengalaman_pekerjaan->items as $key => $value) { ?>
                                <div class="col-md-6">
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
                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!------- Dokumen Pendukung ------->
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <?php foreach ($dokumen_pendukung as $key => $value) { ?>

                                        <?php if ($value['name'] == 'file_sertifikat') { ?>
                                            <?php foreach ($media_sertifikat->items as $key2 => $value2) { ?>
                                                <tr>
                                                    <td><?= $key += 1 ?>.</td>
                                                    <td><?= $value['label'] ?> <?= $key2 += 1 ?></td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="">
                                                            <button style="font-size: 12px;" type="button" class="btn btn-sm pratinjau btn-outline-primary" data-bs-file="<?= $selectMedia($karyawan['id_karyawan'], $value['name'])['path_media'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> Pratinjau</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td><?= $key += 1 ?>.</td>
                                                <td><?= $value['label'] ?></td>
                                                <td>:</td>
                                                <td>
                                                    <div class="">
                                                        <button style="font-size: 12px;" type="button" class="btn btn-sm pratinjau btn-outline-primary" data-bs-file="<?= $selectMedia($karyawan['id_karyawan'], $value['name'])['path_media'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> Pratinjau</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded p-2">
                                    <img src="" alt="" class="img-fluid fileSakip d-none rounded">
                                    <iframe class="rounded" src="" frameborder="0" toolbar="true" id="fileSakipPDF" style="display: block;width:100%;height:574px;"></iframe>
                                </div>
                            </div>
                        </div>
                        <!------- End Dokumen Pendukung ------->
                    </div>
                </div>

            </div>


            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- <a href="/employee/<?= $karyawan['id_karyawan'] ?>/export" class="btn btn-sm btn-outline-primary me-2" type="button" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export</a> -->
                    <a href="/employee/<?= $karyawan['id_karyawan'] ?>/print" class="btn btn-sm btn-outline-primary" type="button" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Print & <i class="fa fa-file-pdf-o" aria-hidden="true"> Export PDF</i></a>
                </div>
            </div>

        </div>
    </div>
</body>


<script>
    $(".pratinjau").on('click', function(event) {
        var file = $(this).attr("data-bs-file");
        var extFile = file.split(".");

        if (extFile[1] != 'pdf') {
            $("#fileSakipPDF").addClass("d-none");
            $(".fileSakip").removeClass("d-none");
            $(".fileSakip").prop("src", '/assets/media/' + file);
        } else {
            $(".fileSakip").addClass("d-none");
            $("#fileSakipPDF").removeClass("d-none");
            $("#fileSakipPDF").prop("src", '/assets/media/' + file);
        }

    });
</script>

<!------- Popper ------->
<script src="/assets/js/popper.min.js"></script>

<!-- jQuery UI -->
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!------- Bootstrap JS ------->
<script src="/assets/public/js/bootstrap.bundle.min.js"></script>
<script src="/assets/public/js/bootstrap.min.js"></script>
<script src="/assets/public/js/bootstrap.js"></script>

<!------- Fontawesome ------->
<script src="https://kit.fontawesome.com/997e36de6c.js" crossorigin="anonymous"></script>

<!------- Owl Carousel ------->
<script src="/assets/plugins/owl-carousel/js/owl.carousel.min.js"></script>
<script src="/assets/plugins/owl-carousel/js/owl.carousel.js"></script>

<!------- Full Calendar ------->
<script src="/assets/plugins/fullcalendar/main.js"></script>
<script src="/assets/plugins/moment/moment.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<script>
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>

<script>
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listYear'
            },

            displayEventTime: false, // don't show the time column in list view

            // THIS KEY WON'T WORK IN PRODUCTION!!!
            // To make your own Google API key, follow the directions here:
            // http://fullcalendar.io/docs/google_calendar/
            googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',

            // US Holidays
            events: 'en.usa#holiday@group.v.calendar.google.com',

            eventClick: function(arg) {
                // opens events in a popup window
                window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

                arg.jsEvent.preventDefault() // don't navigate in main tab
            },

            loading: function(bool) {
                document.getElementById('loading').style.display =
                    bool ? 'block' : 'none';
            }

        });

        calendar.render();
    });
</script>

</html>