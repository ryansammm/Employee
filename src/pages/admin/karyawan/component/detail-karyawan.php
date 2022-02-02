<section id="detail-karyawan">
    <!------- Header ------->
    <div class="row mx-auto" style="background-color: #d3d3d3;padding: 0.5rem;border-bottom: 1px solid red;border-radius: 0.25rem 0.25rem 0rem 0rem;">
        <div class="col-md-4 my-auto">
            <div class="text-center">
                <img class="" src="/assets/logo/tristek-black.png" alt="" style="width: 135px;">
            </div>
        </div>
        <div class="col-md-4 text-center my-auto">
            <div>
                <h3 class="text-dark">Data Karyawan</h3>
            </div>
        </div>
        <div class="col-md-4 my-auto">
            <div class="text-white">
                <table class="table text-dark mb-0" id="table-header">
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
    <!------- End Header ------->
    <div class="card mb-3">
        <div class="card-body container ps-2">
            <div class="row">

                <!------- Profile Image ------->
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h6><?= $karyawan['nama_lengkap'] ?></h6>
                            <div class="mb-2 mx-auto" style="border: 1px solid #dfdfdf;width: 189px;">
                                <img class="img-fluid p-2" src="<?= asset($karyawan['path_media']) ?>" alt="">
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
                            <div class="em-title mb-2">Identitas Karyawan</div>
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
                            <table class="table" style="margin-top: 1.6rem;">
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

                    <hr>

                    <!------- Data Pribadi ------->
                    <div class="em-title mb-2">Data Pribadi</div>
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
                                    <td>Tinggi Badan</td>
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

            <!------- Start Navigation ------->
            <nav class="d-flex flex-nowrap justify-content-end mt-3" id="nav-panel" style="flex-wrap: nowrap !important;margin-bottom: -1px;">
                <div class="nav flex-nowrap nav-tabs mb-0" id="nav-tab" role="tablist">
                    <button class="nav-link active text-nowrap" id="nav-home-tab" data-toggle="tab" href="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Data Sebelum Bergabung</button>
                    <button class="nav-link text-nowrap" id="nav-setelah-tab" data-toggle="tab" href="#nav-setelah" type="button" role="tab" aria-controls="nav-setelah" aria-selected="false">Data Setelah Bergabung</button>
                    <button class="nav-link text-nowrap" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Dokumen Pendukung</butt>
                </div>
            </nav>
            <!------- End Navigation ------->

            <hr class="mt-0" style="background-color: red;">

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="home-tab">

                    <!------- Start ALamat ------->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="em-title mb-2">Alamat Sesuai KTP</div>
                            <div class="border-bottom">
                                <?= $karyawan['alamat_ktp'] ?><br>
                                <?= $karyawan['kode_pos_ktp'] ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="em-title mb-2">Alamat Tinggal Saat Ini</div>
                            <div class="border-bottom">
                                <?= $karyawan['alamat_tinggal'] ?><br>
                                <?= $karyawan['kode_pos_tinggal'] ?>
                            </div>
                        </div>
                    </div>
                    <!------- End Start ------->

                    <hr>

                    <!------- Start Asuransi ------->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="em-title mb-2">Asuransi</div>
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
                            <div class="em-title mb-2">Perbankan</div>
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
                            <div class="em-title mb-2">Perpajakan</div>
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
                    <!------- End Asuransi ------->

                    <hr>


                    <div class="row">
                        <!------- Start Pendidikan Formal ------->
                        <div class="col-md-6">
                            <div class="em-title mb-2">Pendidikan Formal</div>
                            <table class="table no-padding">
                                <?php foreach ($pendidikan_formal->items as $key => $value) { ?>
                                    <tr>
                                        <td style="width: 135px;"><?= $value['nama_pendidikan'] ?></td>
                                        <td>:</td>
                                        <td><?= $value['nama_sekolah'] ?></td>
                                        <td>Tahun Lulus</td>
                                        <td>:</td>
                                        <td><?= $value['tahun_lulus'] ?></td>
                                    </tr>
                                    <?php if ($value['jenis_pendidikan'] > 2) { ?>
                                        <tr>
                                            <td><span style="margin-left: 0.5rem !important;display: block;"> Jurusan, Bila Ada</span></td>
                                            <td>:</td>
                                            <td><?= $value['jurusan'] ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </table>
                        </div>
                        <!------- End Pendidikan Formal ------->

                        <!------- Start Pendidikan Non Formal ------->
                        <div class="col-md-6">
                            <div class="em-title mb-2 text-nowrap">Pendidikan Non Formal,
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
                        <!------- End Pendidikan Non Formal ------->
                    </div>

                    <hr>

                    <div class="row">
                        <!------- Start Kemampuan ------->
                        <div class="col-md-6">
                            <div class="em-title mb-2">Kemampuan :</div>
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
                        <!------- End Kemampuan ------->

                        <!------- Start Hobi ------->
                        <div class="col-md-3">
                            <div class="em-title mb-2">Hobi :</div>
                            <div class="border-bottom" style="margin-top: 13px;">
                                <span><?= $karyawan['hobi'] ?></span>
                            </div>
                        </div>
                        <!------- End Hobi ------->

                        <!------- Start Karakter ------->
                        <div class="col-md-3">
                            <div class="em-title mb-2">Karakter :</div>
                            <div class="border-bottom" style="margin-top: 13px;">
                                <span><?= $karyawan['karakter'] ?></span>
                            </div>
                        </div>
                        <!------- End Karakter ------->

                    </div>

                    <hr>

                    <div class="row">
                        <!------- Start Keluarga Yang Bisa Dihubungi ------->
                        <div class="col-md-6">
                            <div class="text-nowrap em-title mb-2">Keluarga Yang Bisa Dihubungi</div>
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
                                    <td colspan="3">
                                        <span style=" margin-left: 0.5rem !important;display: block;"><?= $karyawan_kontak_alt['alamat_kontak_alt'] ?></span>
                                    </td>
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

                        <!------- Start Pengalaman Organisasi ------->
                        <div class="col-md-6">
                            <div class="em-title mb-2 text-nowrap">Pengalaman Organisasi,<span> Sebelum Bergabung</span></div>
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
                        <!------- End Pengalaman Organisasi ------->
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-setelah" role="tabpanel" aria-labelledby="setelah-tab">

                    <!------- Start Pendidikan Non Formal Setelah Bergabung ------->
                    <?php if (empty($pendidikan_non_formal_bergabung->items)) { ?>
                    <?php } else { ?>
                        <div class="em-title mb-2 text-nowrap">Pendidikan Non Formal,
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
                    <!------- End Pendidikan Non Formal Setelah Bergabung ------->

                    <!------- Start Pengalaman Organisasi Setelah Bergabung ------->
                    <?php if (empty($pengalaman_organisasi_bergabung->items)) { ?>
                    <?php } else { ?>
                        <div class="em-title mb-2 text-nowrap">Pengalaman Organisasi,
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
                    <!------- End Pengalaman Organisasi Setelah Bergabung ------->

                    <!------- Start Pengalaman Pekerjaan ------->
                    <div class="em-title mb-2 text-nowrap">Pengalaman Pekerjaan</div>
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
                    <!------- End Pengalaman Pekerjaan ------->
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
                <a href="/employee/<?= $karyawan['id_karyawan'] ?>/print" class="btn btn-sm btn-outline-primary" type="button" target="_blank">Print & Export PDF</a>
            </div>
        </div>
    </div>
</section>