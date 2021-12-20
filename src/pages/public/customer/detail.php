<?php include __DIR__ . '/../Header.php' ?>

<style>
    ul li.list-group-item {
        font-size: 14px !important;
    }

    ul li.list-group-item span {
        width: 50%;
        text-align: end;
    }
</style>

<!------- Klien Kami ------->
<section id="klien-kami">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                    <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;"><?= $data_pelanggan['nama_pelanggan'] ?></h4>
                </div>
                <hr>
                <div class="text-center">
                    <a href="<?= $data_pelanggan['link_pelanggan'] ?>" target="_blank">
                        <img src="/assets/media/<?= $data_pelanggan['path_media'] ?>" alt="" style="width: 20%;">
                    </a>
                </div>
                <hr>
                <h6 class="mt-4">Ringkasan Pekerjaan :</h6>
                <div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">Instansi/SKPD <span>PT. Jamkrida Jabar</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Kegiatan <span>Pengadaan Barang</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sub Kegiatan <span>-</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Nama Pekerjaan<span>Upgrading Perangkat PABX PT. Jamkrida Jabar</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Pagu Anggaran<span>-</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Nilai HPS<span>-</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Harga Penwaran<span>37.950.000</span></li>
                        <h6 class="mt-4">Pihak Pertama :</h6>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Nama<span>Muji Rohmad</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Jabatan<span>Kepala Divisi Keuangan dan Umum</span></li>
                        <h6 class="mt-4">Pihak Kedua :</h6>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Nama<span>Sofyan Ali Syahbana</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Jabatan<span>Direktur PT. Tristek Media Kreasindo</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Alamat Kantor<span>Jl. Gelombang Cinta No. 35 RT 004 RW 004, Cisaranten Kulon, Arcamanik, Kota Bandung</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">NPWP<span>82.501.797.7-7.429.000</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Rek. Bank<span>98230-3909</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Nama Perusahaan<span>PT. Tristek Media Kreasindo</span></li>
                        <h6 class="mt-4">Surat Perintah Kerja :</h6>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Nomor<span>SPK-0014/DKU/JJ/X/2021</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Nilai Pekerjaan<span>37.950.000</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Nilai Pembayaran<span>37.450.000</span></li>
                        <h6 class="mt-4">Pembebanan pada Kode Rekening RIncian Obyek Belanja :</h6>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Uraian Pekerjaan<span>Upgrading Perangkat PABX PT. Jamkrida Jabar</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Waktu Pelaksanaan<span>19 Oktober 2021 - 18 November November 2021</span></li>
                    </ul>
                </div>
            </div>
            <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/gallery" class="btn btn-primary me-2">Dokumentasi Pekerjaan</a>
                <a href="" class="btn btn-primary">Website <?= $data_pelanggan['nama_pelanggan'] ?></a>
            </div>
        </div>
    </div>
</section>


<!------- Klien Lainnya ------->
<div class="container">
    <div class="row mt-4">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Klien Lainnya</h5>
                </div>
            </div>
            <div class="card-body" style="padding: 10px 0 0 0;">
                <div class="row">
                    <?php foreach ($datas_pelanggan->items as $key => $value) { ?>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem">
                                    <a href="/customer/<?= $value['id_pelanggan'] ?>/detail" target="_blank">
                                        <div class="img-video" style="background: url('/assets/media/<?= $value['path_media'] ?>');background-size: cover;background-position:  center;">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/../Footer.php' ?>