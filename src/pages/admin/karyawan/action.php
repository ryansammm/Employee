<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<style>
    td,
    th {
        font-size: 11.5px;
    }

    .fa {
        cursor: pointer !important;
    }

    h1 {
        font-size: 22px !important;
    }

    .breadcrumb {
        font-size: 14px !important;
    }

    footer {
        font-size: 13px !important;
    }

    li a i,
    li a span {
        font-size: 12px;
    }

    .table td,
    .table th {
        padding: 0.2rem 0.75rem 0.2rem 0.75rem;
        vertical-align: middle;
        border-top: none;
        border-bottom: 1px solid #dee2e6;
        /* padding: 0.75rem; */
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 1px solid #dee2e6;
    }
</style>


<div class="content-wrapper">

    <section id="search-bar">
        <div style="background-color: #D3D3D3; padding: 1.7rem;">
            <div class="row">
                <div class="col-md-6">
                    <div class="searchBar">
                        <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Pencarian..." value="" />
                        <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                            <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                <path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="float-right">
                        <img src="/assets/logo/tmk-2-black.png" alt="" style="height: 30px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content-header container pb-1">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Karyawan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content container">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-sm table-hover text-nowrap employee-table">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Divisi</th>
                                <th>Bidang</th>
                                <th>No. Induk Karyawan</th>
                                <th>Tanggal Mulai Kerja</th>
                                <th>Status Kepegawaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $detail['nama_lengkap'] ?></td>
                                <td><?= $detail['nama_bidang'] ?></td>
                                <td><?= $detail['nama_divisi'] ?></td>
                                <td><?= $detail['nama_bidang'] ?></td>
                                <td><?= $detail['no_induk_karyawan'] ?></td>
                                <td><?= date_format(date_create($detail['tgl_mulai_kerja']), "d F Y") ?></td>
                                <td><?= $detail['nama_status_kepegawaian'] ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <script>
                var detail = function(kelas) {
                    $('.btn-action').removeClass('action-active')
                    $(kelas).addClass('action-active')
                    var stepper = new Stepper(document.querySelector('.bs-stepper'))

                    stepper.to(1)
                }

                var editKaryawan = function(kelas) {
                    $('.btn-action').removeClass('action-active')
                    $(kelas).addClass('action-active')
                    var stepper = new Stepper(document.querySelector('.bs-stepper'))

                    stepper.to(2)
                }

                var page3 = function() {
                    var stepper = new Stepper(document.querySelector('.bs-stepper'))

                    stepper.to(3)
                }

                var page4 = function() {
                    var stepper = new Stepper(document.querySelector('.bs-stepper'))

                    stepper.to(4)
                }
            </script>

            <section id="action">
                <div class="card">
                    <div class="card-body p-0">
                        <div id="button-action">
                            <div class="row">
                                <div class="col pr-0">
                                    <div class="d-flex mb-1 pb-2 border-bottom btn-act">
                                        <button type="button" onclick="detail(this)" class="btn btn-sm btn-red btn-action mr-2 step-trigger" role="tab" aria-controls="detail" id="detail-trigger">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                        <span>View Data Karyawan</span>
                                    </div>
                                    <p>Menu untuk Melihat Detail Data Terkini Karyawan</p>
                                </div>
                                <div class="col pr-0">
                                    <div class="d-flex mb-1 pb-2 border-bottom btn-act">
                                        <button type="button" onclick="editKaryawan(this)" class="btn btn-sm btn-red btn-action mr-2 step-trigger" role="tab" aria-controls="detail" id="detail-trigger">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </button>
                                        <span>Ubah Data Karyawan</span>
                                    </div>
                                    <p>Menu untuk Merubah Detail Data Karyawan</p>
                                </div>
                                <div class="col pr-0">
                                    <div class="d-flex mb-1 pb-2 border-bottom btn-act">
                                        <button class="btn btn-sm btn-red btn-action mr-2" data-toggle="modal" data-target="#mutasiModal">
                                            <i class="fas fa-retweet" style="margin-left: -1px;"></i>
                                        </button>
                                        <span>Mutasi Karyawan</span>
                                    </div>
                                    <p>Menu untuk Merubah Kdudukan / Posisi / Jabatan Karyawan</p>
                                </div>
                                <div class="col pr-0">
                                    <div class="d-flex mb-1 pb-2 border-bottom btn-act">
                                        <div class="btn btn-sm btn-red btn-action mr-2">
                                            <i class="fas fa-random"></i>
                                        </div>
                                        <span>Migrasi Karyawan</span>
                                    </div>
                                    <p>Menu untuk Merubah Bidang / Divisi Karyawan</p>
                                </div>
                                <div class="col pr-0">
                                    <div class="d-flex mb-1 pb-2 border-bottom btn-act">
                                        <div class="btn btn-sm btn-red btn-action mr-2" data-toggle="modal" data-target="#modal_status_kepegawaian" data-id="<?= $detail['id_karyawan'] ?>">
                                            <i class="fas fa-exchange-alt"></i>
                                        </div>
                                        <span>Alihkan Status Kepegawaian</span>
                                    </div>
                                    <p>Menu untuk Mengalihkan Status Kepegawaian</p>
                                </div>
                                <div class="col pr-0">
                                    <div class="d-flex mb-1 pb-2 border-bottom btn-act">
                                        <div class="btn btn-sm btn-red btn-action mr-2">
                                            <i class="fas fa-ban"></i>
                                        </div>
                                        <span>Skorsing Karyawan</span>
                                    </div>
                                    <p>Menu untuk Karyawan yang Melakukan Pelanggaran</p>
                                </div>
                                <div class="col pr-0">
                                    <div class="d-flex mb-1 pb-2 border-bottom btn-act">
                                        <div class="btn btn-sm btn-red btn-action mr-2">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                        <span>Resign</span>
                                    </div>
                                    <p>Menu untuk Merubah Status Karyawan yang Berhenti Bekerja</p>
                                </div>
                                <div class="col pr-0">
                                    <div class="d-flex mb-1 pb-2 border-bottom btn-act">
                                        <button type="button" class="btn btn-sm btn-red btn-action mr-2" data-toggle="modal" data-target="#shareModal">
                                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        </button>
                                        <span>Bagikan Data Karyawan</span>
                                    </div>
                                    <p>Menu untuk Membagikan Data Karyawan ke Media Sosial atau Via Email</p>
                                </div>
                                <div class="col pr-0">
                                    <div class="d-flex mb-1 pb-2 border-bottom btn-act">
                                        <div class="btn btn-sm btn-red btn-action mr-2">
                                            <i class="fas fa-history"></i>
                                        </div>
                                        <span>Riwayat Karyawan</span>
                                    </div>
                                    <p>Menu untuk Melihat Riwayat Karyawan Selama Bekerja</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="bs-stepper">
                <div class="bs-stepper-header d-none" role="tablist">
                    <div class="step" data-target="#detail-data-karyawan">
                        <button type="button" class="step-trigger" role="tab" aria-controls="detail-data-karyawan" id="detail-data-karyawan-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Logins</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#ubah-data-karyawan">
                        <button type="button" class="step-trigger" role="tab" aria-controls="ubah-data-karyawan" id="ubah-data-karyawan-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Various information</span>
                        </button>
                    </div>
                </div>

                <div class="bs-stepper-content p-0">
                    <!------- Start Detail Karyawan ------->
                    <div id="detail-data-karyawan" class="content" role="tabpanel" aria-labelledby="detail-data-karyawan-trigger">
                        <?= component('admin/karyawan/component/detail-karyawan', [
                            'detail' => $detail,
                            'karyawan' => $karyawan,
                            'pendidikan_formal' => $pendidikan_formal,
                            'pendidikan_non_formal' => $pendidikan_non_formal,
                            'pendidikan_non_formal_bergabung' => $pendidikan_non_formal_bergabung,
                            'kemampuan' => $kemampuan,
                            'karyawan_kontak_alt' => $karyawan_kontak_alt,
                            'pengalaman_organisasi' => $pengalaman_organisasi,
                            'pengalaman_organisasi_bergabung' => $pengalaman_organisasi_bergabung,
                            'pengalaman_pekerjaan' => $pengalaman_pekerjaan,
                            'dokumen_pendukung' => $dokumen_pendukung,
                            'media_sertifikat' => $media_sertifikat,
                            'selectMedia' => $selectMedia,
                        ]) ?>
                    </div>
                    <!------- End Detail Karyawan ------->

                    <div id="ubah-data-karyawan" class="content" role="tabpanel" aria-labelledby="ubah-data-karyawan-trigger">
                        <?= component('admin/karyawan/component/edit-karyawan', [
                            'detail' => $detail,
                            'karyawan' => $karyawan,
                            'pendidikan_formal' => $pendidikan_formal,
                            'pendidikan_non_formal' => $pendidikan_non_formal,
                            'pendidikan_non_formal_bergabung' => $pendidikan_non_formal_bergabung,
                            'kemampuan' => $kemampuan,
                            'karyawan_kontak_alt' => $karyawan_kontak_alt,
                            'pengalaman_organisasi' => $pengalaman_organisasi,
                            'pengalaman_organisasi_bergabung' => $pengalaman_organisasi_bergabung,
                            'pengalaman_pekerjaan' => $pengalaman_pekerjaan,
                            'dokumen_pendukung' => $dokumen_pendukung,
                            'media_sertifikat' => $media_sertifikat,
                            'selectMedia' => $selectMedia,
                            'status_kepegawaian' => $status_kepegawaian,
                            'bank' => $bank,
                            'jabatan' => $jabatan,
                            'divisi' => $divisi,
                            'bidang' => $bidang,
                        ]) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!------- Start Modal Mutasi ------->
<div class="modal fade" id="mutasiModal" tabindex="-1" aria-labelledby="mutasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header-tmk text-center">
                    <h5>Mutasi <br> Jabatan Karyawan </h5>
                    <div class="modal-close">
                        <button type="button" class=" btn btn-sm btn-modal-close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body modal-tmk">
                    <div class="row">
                        <div class="col-5">
                            <p class="modal-note">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis adipisci dolore distinctio cum, nobis tempore vel, saepe optio eos nihil itaque suscipit quaerat totam deleniti mollitia. Ullam, temporibus blanditiis magni, tempora explicabo pariatur et a repudiandae, quas reprehenderit eveniet? Officiis rerum voluptas voluptates neque exercitationem debitis quod, amet officia esse commodi facilis reprehenderit nemo blanditiis doloremque consequuntur illum, ullam voluptatem cum nihil aliquid. Impedit incidunt neque laudantium obcaecati porro eos?
                            </p>
                        </div>
                        <div class="col-7">
                            <div class="modal-form">
                                <div class="form-group">
                                    <h6><strong>Nama Karyawan :</strong></h6>
                                    <h6><?= $detail['nama_lengkap'] ?></h6>
                                </div>
                                <div class="form-group">
                                    <h6><strong>Jabatan Sebelumnya :</strong></h6>
                                    <input type="text" class="form-control" value="<?= $detail['nama_jabatan'] ?>" disabled style="margin-bottom: -5px;">
                                    <small>Contoh : Manager Penjualan</small>
                                </div>
                                <div class="form-group">
                                    <h6><strong>Pilihan Mutasi Jabatan : </strong></h6>
                                    <select name="" id="" class="form-control" style="margin-bottom: -5px;">
                                        <option value="">-- Pilih Jabatan --</option>
                                        <?php foreach ($jabatan->items as $key => $value) { ?>
                                            <option value=""><?= $value['nama_jabatan'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <small>Contoh : Direktur Penjualan</small>
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LdRwTMeAAAAALo7_IlCiCFvYwvZ16B0pa-iDQbW"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-secondary-text">Simpan</button>
                    <button type="button" class="btn btn-sm btn-red-text" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!------- End Modal Mutasi ------->

<!------- Start Modal Status Kepegawaian ------->
<div class="modal fade" id="modal_status_kepegawaian" tabindex="-1" aria-labelledby="modal_status_kepegawaianLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header-tmk text-center">
                    <h5>Alihkan <br> Status Kepegawaian Karyawan </h5>
                    <div class="modal-close">
                        <button type="button" class=" btn btn-sm btn-modal-close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body modal-tmk">
                    <div class="row">
                        <div class="col-5">
                            <p class="modal-note">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis adipisci dolore distinctio cum, nobis tempore vel, saepe optio eos nihil itaque suscipit quaerat totam deleniti mollitia. Ullam, temporibus blanditiis magni, tempora explicabo pariatur et a repudiandae, quas reprehenderit eveniet? Officiis rerum voluptas voluptates neque exercitationem debitis quod, amet officia esse commodi facilis reprehenderit nemo blanditiis doloremque consequuntur illum, ullam voluptatem cum nihil aliquid. Impedit incidunt neque laudantium obcaecati porro eos?
                            </p>
                        </div>
                        <div class="col-7">
                            <div class="modal-form">
                                <div class="form-group">
                                    <h6><strong>Nama Karyawan :</strong></h6>
                                    <h6><?= $detail['nama_lengkap'] ?></h6>
                                </div>
                                <div class="form-group">
                                    <h6><strong>Status Kepegawaian Sebelumnya :</strong></h6>
                                    <input type="text" class="form-control" value="<?= $detail['nama_status_kepegawaian'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <h6><strong>Pilihan Status Kepegawaian : </strong></h6>
                                    <select name="" id="" class="form-control">
                                        <option value="">-- Pilih Status Kepegawaian --</option>
                                        <?php foreach ($status_kepegawaian->items as $key => $value) { ?>
                                            <option value=""><?= $value['nama_status_kepegawaian'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LdRwTMeAAAAALo7_IlCiCFvYwvZ16B0pa-iDQbW"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-secondary-text">Simpan</button>
                    <button type="button" class="btn btn-sm btn-red-text" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!------- End Modal Status Kepegawaian ------->

<!-- Start Modal Share -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class=" modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="shareModalLabel">Bagikan</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-center">Bagikan Data Karyawan Ini Melalui Tautan Berikut :</h6>
                <div class="my-3">
                    <div class="d-flex justify-content-center" style="font-size: 13px;">
                        <div id="whatsapp" class="m-2">
                            <a href="" class="text-decoration-none text-dark">
                                <i class="fab fa-whatsapp" style="background-color: #212121;color: white;padding: 5px 6px;border-radius: 0.25rem;"></i>
                                <span>Whatsapp</span>
                            </a>
                        </div>
                        <div id="telegram" class="m-2">
                            <a href="" class="text-decoration-none text-dark">
                                <i class="fab fa-telegram-plane" style="background-color: #212121;color: white;padding: 5px 6px;border-radius: 0.25rem;"></i>
                                <span>Telegram</span>
                            </a>
                        </div>
                        <div id="email" class="m-2">
                            <a href="" class="text-decoration-none text-dark">
                                <i class="fas fa-envelope-open" style="background-color: #212121;color: white;padding: 5px 6px;border-radius: 0.25rem;"></i>
                                <span>Email</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="caption">
                    <h5 class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias aliquid blanditiis deserunt maiores magni ut rem voluptatibus asperiores voluptatum nam.</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Share -->

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

<script>
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'), {
            animation: true
        })
    })
</script>

<script>
    $('#modastatus_kepegawaian').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#form_status_kepegawaian').attr('action', '/admin/karyawan/' + id + '/status')
    })

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>