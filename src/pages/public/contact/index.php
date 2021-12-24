<?php include __DIR__ . '/../Header.php' ?>

<!------- Landscape Banner ------->
<div class="container">
    <?php if (isset($GLOBALS['banner_landscape'][0])) { ?>
        <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($GLOBALS['banner_landscape'][0], 'path_media')]) ?>
    <?php } ?>
</div>

<div class="container mt-4">
    <div class="card">
        <div class="card-body p-0">
            <div class="row align-items-stretch no-gutters contact-wrap">
                <!------- Left Panel ------->
                <div class="col-md-6 col-12">

                    <div class="card-body">
                        <div class="form h-100">
                            <h3>Kirim Pesan</h3>
                            <?php if (isset($success[0])) { ?>
                                <span class="text-success d-block"><b><?= $success[0] ?></b></span>
                            <?php } ?>
                            <hr>
                            <form class="mb-5" method="post" id="contactForm" name="contactForm" action="/contact/kintun">
                                <div class="row">
                                    <div class="col-md-6 form-group mb-2">
                                        <label for="" class="col-form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                        <?php if (isset($errors['name'])) { ?>
                                            <span class="text-danger d-block"><b><?= $errors['name'] ?></b></span>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6 form-group mb-2">
                                        <label for="" class="col-form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email">
                                        <?php if (isset($errors['email'])) { ?>
                                            <span class="text-danger d-block"><b><?= $errors['email'] ?></b></span>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-2">
                                        <label for="" class="col-form-label">Nomor Handphone</label>
                                        <input type="text" class="form-control" name="phone" id="phone">
                                        <?php if (isset($errors['phone'])) { ?>
                                            <span class="text-danger d-block"><b><?= $errors['phone'] ?></b></span>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6 form-group mb-2">
                                        <label for="" class="col-form-label">Perusahaan</label>
                                        <input type="text" class="form-control" name="company" id="company">
                                        <?php if (isset($errors['company'])) { ?>
                                            <span class="text-danger d-block"><b><?= $errors['company'] ?></b></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group mb-2">
                                        <label for="" class="col-form-label">Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject">
                                        <?php if (isset($errors['subject'])) { ?>
                                            <span class="text-danger d-block"><b><?= $errors['subject'] ?></b></span>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group mb-2">
                                        <label for="message" class="col-form-label">Pesan</label>
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="4"></textarea>
                                        <?php if (isset($errors['message'])) { ?>
                                            <span class="text-danger d-block"><b><?= $errors['message'] ?></b></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row" id="captcha">
                                    <div class="col-md-12">
                                        <div class="g-recaptcha" data-sitekey="6Ldif3EdAAAAAG_-wHumRSkNuV8Y2eeLLTYpdoSR"></div>
                                        <?php if (isset($errors[0]['captcha'])) { ?>
                                            <span class="text-danger d-block"><b><?= $errors[0]['captcha'] ?></b></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 form-group">
                                        <input type="submit" value="Kirim Pesan" class="btn btn-primary rounded-0 py-2 px-4">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>

                            <div id="form-message-warning mt-4"></div>
                        </div>
                    </div>

                </div>

                <!------- Right Panel ------->
                <div class="col-md-6 col-12 d-sm-block d-none">

                    <div style="position: relative;background-image: url(/assets/logo/maps.jpg);width: 100%;height: 100%;background-size: cover;background-position: center;">
                        <div class="card-body postion-sm-absolute" style="position: absolute;top: 10%;">
                            <div class="row justify-content-center">
                                <?php foreach ($datas->items as $key => $data) { ?>
                                    <?php if ($data['ishide_kontak'] == '2') { ?>
                                        <div class="col-md pe-0" style=" <?= $key == (count($datas->items) - 1) ? '' : 'border-right: 1pt solid white;' ?>">
                                            <div class="flex-column">
                                                <div class="d-flex text-white">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <h6 class="card-title ms-2" style="font-size: 12px !important;"><?= $data['list_kontak'][0]['nama_kontak'] ?></h6>
                                                </div>
                                                <div class="d-flex ms-4 me-2">
                                                    <p style="font-size: 12px;color:#c5c5c5 !important"><?= $kontak->getKontak($data['list_kontak'], 'alamat')['isi_kontak'] ?></p>
                                                </div>
                                                <div class="d-flex text-white">
                                                    <i class="fas fa-clock"></i>
                                                    <h6 class="card-title ms-2" style="font-size: 12px !important;">Jam Operasional</h6>
                                                </div>
                                                <div class="flex-column ms-4">
                                                    <p class="mb-0" style="font-size: 12px;color:#c5c5c5 !important"><?= $kontak->getKontak($data['list_kontak'], 'jam_operasional', 'normal')['isi_kontak'] ?></p>
                                                    <p style=" font-size: 12px;color:#c5c5c5 !important"><?= $kontak->getKontak($data['list_kontak'], 'jam_operasional', 'libur')['isi_kontak'] ?></p>
                                                </div>
                                                <div class="d-flex text-white">
                                                    <i class="fas fa-user"></i>
                                                    <h6 class="card-title ms-2" style="font-size: 12px !important;">Customer Service</h6>
                                                </div>
                                                <div class="flex-column ms-4">
                                                    <p class="mb-0" style="font-size: 12px;color:#c5c5c5 !important"><?= $kontak->getKontak($data['list_kontak'], 'customer_service', 'nama')['isi_kontak'] ?></p>
                                                    <p class="mb-0" style=" font-size: 12px;color:#c5c5c5 !important"><?= $kontak->getKontak($data['list_kontak'], 'customer_service', 'nomor')['isi_kontak'] ?></p>
                                                    <p style=" font-size: 12px;color:#c5c5c5 !important"><?= $kontak->getKontak($data['list_kontak'], 'customer_service', 'email')['isi_kontak'] ?></p>
                                                </div>
                                                <div class="d-flex text-white">
                                                    <i class="fas fa-user-cog"></i>
                                                    <h6 class="card-title ms-2" style="font-size: 12px !important;">Technical Support</h6>
                                                </div>
                                                <div class="flex-column ms-4">
                                                    <p class="mb-0" style="font-size: 12px;color:#c5c5c5 !important"><?= $kontak->getKontak($data['list_kontak'], 'technical_support', 'nama')['isi_kontak'] ?></p>
                                                    <p class="mb-0" style=" font-size: 12px;color:#c5c5c5 !important"><?= $kontak->getKontak($data['list_kontak'], 'technical_support', 'nomor')['isi_kontak'] ?></p>
                                                    <p style=" font-size: 12px;color:#c5c5c5 !important"><?= $kontak->getKontak($data['list_kontak'], 'technical_support', 'email')['isi_kontak'] ?></p>
                                                </div>

                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                            <div class="text-center mt-5">
                                <div class="d-flex justify-content-center text-white mb-2">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <h6 class="card-title ms-2" style="font-size: 12px !important;"> Lokasi Kami</h6>
                                </div>
                                <a href="https://www.google.com/maps/place/RSIA+Harapan+Bunda/@-6.9455455,107.628318,14z/data=!4m5!3m4!1s0x2e68e825ddaa500d:0x38c5353a3b6a52cb!8m2!3d-6.9559466!4d107.6621211" type="button" class="btn btn-outline-light" target="_blank">Google Maps</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/../Footer.php' ?>