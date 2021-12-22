<?php include __DIR__ . '/../Header.php' ?>

<!------- Landscape Banner ------->
<div class="container">
    <?php if (isset($GLOBALS['banner_landscape'][0])) { ?>
        <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($GLOBALS['banner_landscape'][0], 'path_media')]) ?>
    <?php } ?>
</div>

<!------- About Us ------->
<section id="about-us" class="container mt-4">
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
    <div class="container mt-4">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Visi Misi</h4>
                </div>
            </div>
            <div class="card-body px-0 bg-white mt-3" style="border-radius: 0.25rem;">
                <div class="description ms-3">
                    <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br(arr_offset($data_profil->items[0], 'visi_misi'))) ?></h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!------- Struktur Organisasi ------->
<section id="struktur-organisasi">
    <div class="container mt-4">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Struktur Organisasi</h4>
                </div>
            </div>
            <div class="card-body px-0" style="border-radius: 0.25rem;">
                <div class="description">
                    <?php foreach ($data_profil->items as $key => $value) { ?>
                        <?php if ($value['jenis_dokumen'] == 'struktur_organisasi') { ?>
                            <img src="/assets/media/<?= arr_offset($value, 'path_media') ?>" alt="" style="width: 100%;border-radius: 0.25rem;">
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!------- Profil Tim ------->
<section id="profil-tim">
    <div class="container mt-4">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Profil Tim</h4>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="row">


                    <!------- Direksi ------->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                    <h5 class="mb-0">Direksi</h5>
                                </div>
                            </div>
                            <div class="card-body py-0 px-1">

                                <?php foreach ($data_direksi->items as $key => $value) { ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-decoration-none" data-id="<?= arr_offset($value, 'id_profile_team') ?>" data-file="<?= arr_offset($value, 'path_media') ?>">
                                        <div class="<?= $key == (count($data_direksi->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_direksi->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                            <div class="row">
                                                <div class="col-3 px-0">
                                                    <div class="" style="background: url(/assets/media/<?= $value['path_media'] ?>);background-size: cover;background-position: top center;width: 100%;height: 87px;border-radius: 0.25rem;"></div>
                                                </div>
                                                <div class="col-9 pe-0">
                                                    <div class="row">
                                                        <h6 class="card-title"><?= $value['nama_lengkap'] ?></h6>
                                                        <h6 class="card-title" style="font-size: 14px;font-style: italic;font-weight: 400;margin-bottom: 6px;">
                                                            <?php foreach ($value['nama_jabatan'] as $key2 => $value2) { ?>
                                                                <span><?= $value2['nama'] ?></span>
                                                            <?php } ?>
                                                        </h6>
                                                        <div class="truncate-string-2 text-muted" style="font-size: 13px;font-weight: 300;"><?= $value['pengalaman_profesional'] ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>


                    <!------- Manajerial ------->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                    <h5 class="mb-0">Manajerial</h5>
                                </div>
                            </div>
                            <div class="card-body py-0 px-1">

                                <?php foreach ($data_manajerial->items as $key => $value) { ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-decoration-none" data-id="<?= arr_offset($value, 'id_profile_team') ?>" data-file="<?= arr_offset($value, 'path_media') ?>">
                                        <div class="<?= $key == (count($data_manajerial->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_manajerial->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                            <div class="row">
                                                <div class="col-3 px-0">
                                                    <div class="" style="background: url(/assets/media/<?= $value['path_media'] ?>);background-size: cover;background-position: top center;width: 100%;height: 87px;border-radius: 0.25rem;"></div>
                                                </div>
                                                <div class="col-9 pe-0">
                                                    <div class="row">
                                                        <h6 class="card-title"><?= $value['nama_lengkap'] ?></h6>
                                                        <h6 class="card-title" style="font-size: 14px;font-style: italic;font-weight: 400;margin-bottom: 6px;">
                                                            <?php foreach ($value['nama_jabatan'] as $key2 => $value2) { ?>
                                                                <span><?= $value2['nama'] ?></span>
                                                            <?php } ?>
                                                        </h6>
                                                        <div class="truncate-string-2 text-muted" style="font-size: 13px;font-weight: 300;"><?= $value['pengalaman_profesional'] ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>


                    <!------- Staff & Karyawan ------->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                    <h5 class="mb-0">Staff & Karyawan</h5>
                                </div>
                            </div>
                            <div class="card-body py-0 px-1">

                                <?php foreach ($data_staff->items as $key => $value) { ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-decoration-none" data-id="<?= arr_offset($value, 'id_profile_team') ?>" data-file="<?= arr_offset($value, 'path_media') ?>">
                                        <div class="<?= $key == (count($data_staff->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_staff->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                            <div class="row">
                                                <div class="col-3 px-0">
                                                    <div class="" style="background: url(/assets/media/<?= $value['path_media'] ?>);background-size: cover;background-position: top center;width: 100%;height: 87px;border-radius: 0.25rem;"></div>
                                                </div>
                                                <div class="col-9 pe-0">
                                                    <div class="row">
                                                        <h6 class="card-title"><?= $value['nama_lengkap'] ?></h6>
                                                        <h6 class="card-title" style="font-size: 14px;font-style: italic;font-weight: 400;margin-bottom: 6px;">
                                                            <?php foreach ($value['nama_jabatan'] as $key2 => $value2) { ?>
                                                                <span><?= $value2['nama'] ?></span>
                                                            <?php } ?>
                                                        </h6>
                                                        <div class="truncate-string-2 text-muted" style="font-size: 13px;font-weight: 300;"><?= $value['pengalaman_profesional'] ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <!-- <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <div class="row ">

                    <div class="col-9">
                        <div class="row me-2">
                            <h4 class="card-title nama"></h4>
                            <h6 class="card-title jabatan"></h6>
                            <div class="mt-3 riwayat" style="font-size: 14px;text-align: justify;"></div>
                            <div class="mt-3 pengalaman" style="font-size: 14px;text-align: justify;"></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <img class="fileProfile" src="" alt="" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $("#exampleModal").on("show.bs.modal", function(event) {
        var modal = $('#exampleModal');
        var button = event.relatedTarget;
        var id = button.getAttribute("data-id");
        var file = button.getAttribute("data-file");
        var extFile = file.split(".");
        $(this).find(".fileProfile").removeClass("d-none");
        $(this)
            .find(".fileProfile")[0]
            .setAttribute("src", "/assets/media/" + file);

        $.ajax({
            url: "/about/" + id + "/get",
            method: "get",
        }).done(function(data) {
            var jabatan = data.nama_jabatan;
            modal.find('.nama').html(data.nama_lengkap);
            // for (let x = 0; x < jabatan.length; x++) {
            //     const element = jabatan[index];
            //     modal.find('.jabatan').html(data.nama);
            // }
            modal.find('.riwayat').html(data.riwayat_pendidikan);
            modal.find('.pengalaman').html(data.pengalaman_profesional);
        });
    });
</script>


<?php include __DIR__ . '/../Footer.php' ?>