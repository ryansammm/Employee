<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/appointment-approval" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Persetujuan Pertemuan</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Persetujuan Pertemuan</a></li>
                        <li class="breadcrumb-item"><a href="#">Persetujuan</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/appointment-approval/<?= $detail['id_appointment'] ?>/approval" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Pengguna</label>
                                            <select name="id_user" class="form-control" required disabled>
                                                <option value=""> -- Pilih Pengguna -- </option>
                                                <?php foreach ($users->items as $key => $user) { ?>
                                                    <option value="<?= $user['id_user'] ?>" <?= $user['id_user'] == $detail['id_user'] ? 'selected' : '' ?>><?= $user['nama_user'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Uraian Agenda</label>
                                            <input type="text" class="form-control" name="agenda_appointment" required value="<?= $detail['agenda_appointment'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi_appointment" class="form-control" required disabled><?= $detail['deskripsi_appointment'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label>Waktu Mulai</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control timestart_appointment" id="timestart_appointment" name="timestart_appointment" required autocomplete="off" value="<?= $detail['timestart_appointment'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="">Waktu Berakhir</label>
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control timeend_appointment" id="timeend_appointment" name="timeend_appointment" required autocomplete="off" value="<?= $detail['timeend_appointment'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Apakah waktu appointment menggunakan jam ?</label>
                                            <div class="col-12">
                                                <div class="d-block">
                                                    <input type="radio" name="time_option" value="1" <?= $detail['time_option'] == '1' ? 'checked' : '' ?> disabled> Ya
                                                </div>
                                                <div class="d-block">
                                                    <input type="radio" name="time_option" value="2" <?= $detail['time_option'] == '2' ? 'checked' : '' ?> disabled> Tidak
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah Partisipan</label>
                                            <input type="number" min="1" class="form-control" name="partisipan_appointment" required value="<?= $detail['partisipan_appointment'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <h5 class="">Detail Data Appointment</h5>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Akun Zoom</label>
                                            <select name="id_zoom" class="form-control id_zoom" disabled>
                                                <option value="">-- Pilih Akun Zoom --</option>
                                                <?php foreach ($zoom->items as $key => $data) { ?>
                                                    <option value="<?= $data['id_zoom'] ?>"><?= $data['nama_zoom'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Ruangan</label>
                                            <select name="id_ruangan" class="form-control id_ruangan" disabled>
                                                <option value="">-- Pilih Ruangan --</option>
                                                <?php foreach ($ruangan->items as $key => $data) { ?>
                                                    <option value="<?= $data['id_ruangan'] ?>"><?= $data['nama_ruangan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Link Zoom Meeting</label>
                                            <input type="text" class="form-control" name="link_zoom" value="<?= $detail['link_zoom'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Meeting ID</label>
                                            <input type="text" class="form-control" name="meeting_id" value="<?= $detail['meeting_id'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Password Meeting</label>
                                            <input type="text" class="form-control" name="password_meeting" value="<?= $detail['password_meeting'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Link Daftar Hadir</label>
                                            <input type="text" class="form-control" name="link_daftar_hadir" value="<?= $detail['link_daftar_hadir'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Link Kuisioner</label>
                                            <input type="text" class="form-control" name="link_kuisioner" value="<?= $detail['link_kuisioner'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah Snack</label>
                                            <input type="text" class="form-control" name="jumlah_snack" value="<?= $detail['jumlah_snack'] ?>">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mt-3">Approval Appointment</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Setujui Pertemuan?</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-block">
                                            <input type="radio" name="status_appointment" value="1" <?= $detail['status_appointment'] == '1' ? 'checked' : '' ?>> Setujui
                                        </div>
                                        <div class="d-block">
                                            <input type="radio" name="status_appointment" value="2" <?= $detail['status_appointment'] == '2' ? 'checked' : '' ?>> Tidak Setujui
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="detail_id_zoom" value="<?= $detail['id_zoom'] ?>" class="detail_id_zoom">
                                <input type="hidden" name="detail_id_ruangan" value="<?= $detail['id_ruangan'] ?>" class="detail_id_ruangan">

                                <div class="row my-4">
                                    <div class="col-md d-flex justify-content-end">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
</div>

<!-- Modal Dokumen -->
<div class="modal fade" id="dokumenPersyaratan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Dokumen ORMAS</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-fluid fileSakip d-none">
                <iframe src="" frameborder="0" id="fileSakipPDF" style="display: block;width:100%;height:400px;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/app/file-preview.js"></script>
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#isi_berita_ind').summernote({
            placeholder: 'Start writing or type',
            height: 500,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });
    });
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js" integrity="sha512-s5u/JBtkPg+Ff2WEr49/cJsod95UgLHbC00N/GglqdQuLnYhALncz8ZHiW/LxDRGduijLKzeYb7Aal9h3codZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#timestart_appointment').datetimepicker({
        timeFormat: "HH:mm",
        dateFormat: 'yy-mm-dd'
    });
    $('#timeend_appointment').datetimepicker({
        timeFormat: "HH:mm",
        dateFormat: 'yy-mm-dd'
    });
</script>
<script src="/assets/admin/js/appointment.js"></script>
<script>
    cek_appointment(function(idZoom, idRuangan) {
        setIdZoom(idZoom);
        setIdRuangan(idRuangan);
    }, '<?= $detail['id_zoom'] ?>', '<?= $detail['id_ruangan'] ?>');
</script>

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>