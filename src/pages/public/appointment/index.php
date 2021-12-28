<?php include __DIR__ . '/../Header.php' ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Add event modal-->
<div id="createEventModal" class="modal fade">
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
                            <label for="tanggal" class="form-label">Akun Zoom</label>
                            <select class="form-select" aria-label="Default select example" disabled>
                                <option>-- Pilih Akun Zoom --</option>
                                <option value="1">Akun Zoom 1 (Tersedia)</option>
                                <option value="2">Akun Zoom 2 (Tersedia)</option>
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
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="sertifikat" disabled>
                                <label class="form-check-label" for="sertifikat">
                                    Sertifikat
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="daftar-hadir" disabled>
                                <label class="form-check-label" for="daftar-hadir">
                                    Daftar Hadir
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="kuesioner" disabled>
                                <label class="form-check-label" for="kuesioner">
                                    Kuesioner
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="ModalId">
                <button type="button" class="btn btn-danger hapus-entri" data-bs-dismiss="modal">Hapus</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Simpan</button> -->
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
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listDay,listWeek'
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
            dayMaxEvents: true,
            navLinks: true,
            selectable: true,
            selectMirror: true,
            editable: true,
            dayMaxEvents: true,

            select: function(arg) {
                var modal = $('#createEventModal');
                $('#createEventModal').modal('show');
                $('.nama-agenda').val('');

                console.log(arg.end);
                modal.find('.create-tanggal-mulai').val(arg.startStr);
                // modal.find('.create-tanggal-selesai').val(arg.endStr);

                $('.simpan-entri').click(function(events) {
                    $('#createEventModal').modal('hide');
                    var title = $('.nama-agenda').val();
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: arg.start,
                            end: arg.end,
                            allDay: arg.allDay
                        })
                    }

                });

                calendar.unselect()

            },


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