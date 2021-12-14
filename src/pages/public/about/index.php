<?php include __DIR__ . '/../Header.php' ?>

<!------- About Us ------->
<section id="about-us" class="container">
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div style="background-image: url('/assets/media/<?= arr_offset($profil, 'path_media') ?>');width:410pt;height: 240pt;background-size: cover;background-position: center;border-radius: 10pt 10pt 10pt 10pt;"></div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                        <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Tentang Kami</h4>
                    </div>
                    <div class="description ms-3">
                        <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br(arr_offset($profil, 'deskripsi_profil'))) ?></h6>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include __DIR__ . '/../Footer.php' ?>