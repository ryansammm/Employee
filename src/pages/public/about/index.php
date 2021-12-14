<?php include __DIR__ . '/../Header.php' ?>

<!------- About Us ------->
<section id="about-us" class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?php foreach ($data_profil->items as $key => $value) { ?>
                        <?php if ($value['jenis_dokumen'] == 'profil_foto') { ?>
                            <div style="background-image: url('/assets/media/<?= arr_offset($value, 'path_media') ?>');width:410pt;height: 240pt;background-size: cover;background-position: center;border-radius: 0.25rem;"></div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                        <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Tentang Kami</h4>
                    </div>
                    <hr>
                    <div class="description ms-3">
                        <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br(arr_offset($data_profil->items[0], 'deskripsi_profil'))) ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!------- Visi Misi ------->
<section id="visi-misi">
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                    <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Visi Misi</h4>
                </div>
                <hr>
                <div class="description ms-3">
                    <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br(arr_offset($data_profil->items[0], 'visi_misi'))) ?></h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!------- Struktur Organisasi ------->
<section id="visi-misi">
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                    <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Sturktur Organinasi</h4>
                </div>
                <div class="description ms-3">
                    <?php foreach ($data_profil->items as $key => $value) { ?>
                        <?php if ($value['jenis_dokumen'] == 'struktur_organisasi') { ?>
                            <img src="/assets/media/<?= arr_offset($value, 'path_media') ?>" alt="" style="width: 100%;">
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../Footer.php' ?>