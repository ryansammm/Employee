<?php include __DIR__ . '/../Header.php' ?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal create event -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/appointment/store" method="POST">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengajuan Fasilitas Teleconference</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control create-tanggal-mulai" id="tanggal" value="" name="timestart_appointment" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control create-tanggal-selesai" id="tanggal" value="" name="timeend_appointment" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Akun Zoom</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option>-- Pilih Akun Zoom --</option>
                                    <option value="1">Akun Zoom 1 (Tersedia)</option>
                                    <option value="2">Akun Zoom 2 (Tersedia)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="agenda" class="form-label">Agenda</label>
                                <input type="text" class="form-control nama-agenda" id="agenda" placeholder="Contoh : Pertemuan atau Sosialiasi" name="agenda_appointment">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" rows="3" placeholder="Deskripsi dari Agenda" name="deskripsi_appointment"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="partisipan" class="form-label">Partisipan</label>
                                <input type="number" class="form-control" id="partisipan" placeholder="Jumlah Partisipan" name="partisipan_appointment	">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="sertifikat" name="">
                                    <label class="form-check-label" for="sertifikat">
                                        Sertifikat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="daftar-hadir" name="status_appointment">
                                    <label class="form-check-label" for="daftar-hadir">
                                        Daftar Hadir
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="kuesioner" name="">
                                    <label class="form-check-label" for="kuesioner">
                                        Kuesioner
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary simpan-entri">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div id="detailEventModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan Fasilitas Teleconference</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Mulai</label>
                            <input type="text" class="form-control tanggal-mulai" id="tanggal" value="" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Selesai</label>
                            <input type="text" class="form-control tanggal-selesai" id="tanggal" value="" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Akun Zoom</label>
                            <select class="form-select" id="id_zoom" aria-label="Default select example" disabled>
                                <option value="">-- Akun Zoom --</option>
                                <?php foreach ($datas_zoom->items as $key => $value) { ?>
                                    <option value="<?= $value['id_zoom'] ?>"><?= $value['nama_zoom'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruangan</label>
                            <select class="form-select" id="id_ruangan" aria-label="Default select example" disabled>
                                <option value="">-- Ruangan --</option>
                                <?php foreach ($datas_ruangan->items as $key => $value) { ?>
                                    <option value="<?= $value['id_ruangan'] ?>"><?= $value['nama_ruangan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="agenda" class="form-label">Agenda</label>
                            <input type="text" class="form-control nama-agenda" id="agenda" value="" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control deskripsi-agenda" id="deskripsi" rows="3" aria-valuemax="" disabled></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="partisipan" class="form-label">Partisipan</label>
                            <input type="number" class="form-control partisipan" id="partisipan" value="" disabled>
                        </div>
                    </div>
                </div>
                <h5>Detail Data</h5>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Link Zoom Meeting</label>
                            <input type="text" class="form-control link_zoom" name="link_zoom" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Meeting ID</label>
                            <input type="text" class="form-control meeting_id" name="meeting_id" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Password Meeting</label>
                            <input type="text" class="form-control password_meeting" name="password_meeting" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Link Daftar Hadir</label>
                            <input type="text" class="form-control link_daftar_hadir" name="link_daftar_hadir" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Link Kuisioner</label>
                            <input type="text" class="form-control link_kuisioner" name="link_kuisioner" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="mb-3">
                            <label class="form-label">Jumlah Snack</label>
                            <input type="text" class="form-control jumlah_snack" name="jumlah_snack" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="ModalId">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            height: 'auto',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
            views: {
                listDay: {
                    buttonText: 'list day'
                },
                listWeek: {
                    buttonText: 'list week'
                }
            },
            initialView: 'dayGridMonth',

            eventClick: function(arg) {
                var modal = $('#detailEventModal');

                $('#detailEventModal').modal('show');

                $.ajax({
                    url: "/appointment/detail/" + arg.event._def.publicId,
                    method: "get",
                }).done(function(data) {
                    modal.find('.tanggal-mulai').val(moment(data.detail.start).format('D-MM-YYYY'));
                    modal.find('.tanggal-selesai').val(moment(data.detail.end).format('D-MM-YYYY'));
                    modal.find('.nama-agenda').val(data.detail.agenda_appointment);
                    modal.find('.deskripsi-agenda').val(data.detail.deskripsi_appointment);
                    modal.find('.partisipan').val(data.detail.partisipan_appointment);
                    modal.find('.id_zoom').val(data.detail.id_zoom);
                    modal.find('.id_ruangan').val(data.detail.id_ruangan);
                    modal.find('.link_zoom').val(data.detail.link_zoom);
                    modal.find('.meeting_id').val(data.detail.meeting_id);
                    modal.find('.password_meeting').val(data.detail.password_meeting);
                    modal.find('.link_daftar_hadir').val(data.detail.link_daftar_hadir);
                    modal.find('.link_kuisioner').val(data.detail.link_kuisioner);
                    modal.find('.jumlah_snack').val(data.detail.jumlah_snack);

                    if (data.detail.sertifikat == 1) {
                        modal.find('.sertifikat').prop('checked', true);
                    } else {
                        modal.find('.sertifikat').prop('checked', false);
                    }
                    if (data.detail.daftar_hadir == 1) {
                        modal.find('.daftar-hadir').prop('checked', true);
                    } else {
                        modal.find('.daftar-hadir').prop('checked', false);
                    }
                    if (data.detail.kuisioner == 1) {
                        modal.find('.kuesioner').prop('checked', true);
                    } else {
                        modal.find('.kuesioner').prop('checked', false);
                    }
                });

                $('.hapus-entri').click(function(events) {
                    $('#detailEventModal').modal('hide');
                    arg.event.remove()
                });
            },
            events: []
        });
        calendar.render();

        $.ajax({
            url: '/appointment/get',
            success: function(doc) {
                doc.datas.items.forEach(element => {
                    calendar.addEvent({
                        id: element.id_appointment,
                        title: element.title,
                        start: element.start,
                        end: element.end
                    })
                });
            }
        });
    });
</script>

<?php include __DIR__ . '/../Footer.php' ?>