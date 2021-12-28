<?php include __DIR__ . '/../Header.php' ?>


<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Booking
                    </button>
                </div>

            </div>
            <!-- Modal -->
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

        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>

<script>
    $.ajax({
        url: '/appointment/get',
        success: function(doc) {
            var appointment = [

            ];
            console.log(appointment);


            doc.datas.items.forEach(element => {
                appointment.push({
                    id: element.id_appointment,
                    title: element.title,
                    start: element.start,
                    end: element.end
                })
            });
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [{
                    title: 'event1',
                    start: '2021-12-12'
                },
                {
                    title: 'event2',
                    start: '2021-12-05',
                    end: '2021-12-07'
                },
                {
                    title: 'event3',
                    start: '2021-12-09T12:30:00',
                    allDay: false // will make the time show
                }
            ],
        });
        calendar.render();
    });
</script>

<?php include __DIR__ . '/../Footer.php' ?>