<?php include __DIR__ . '/../Header.php' ?>
<div class="container">
    <div class="card">
        <div class="card-body p-0">
            <div class="row align-items-stretch no-gutters contact-wrap">
                <!------- Left Panel ------->
                <div class="col-md-6">

                    <div class="card-body">
                        <div class="form h-100">
                            <h3>Kirim Pesan</h3>
                            <hr>
                            <form class="mb-5" method="post" id="contactForm" name="contactForm">
                                <div class="row">
                                    <div class="col-md-6 form-group mb-2">
                                        <label for="" class="col-form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="col-md-6 form-group mb-2">
                                        <label for="" class="col-form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-2">
                                        <label for="" class="col-form-label">Nomor Handphone</label>
                                        <input type="text" class="form-control" name="phone" id="phone">
                                    </div>
                                    <div class="col-md-6 form-group mb-2">
                                        <label for="" class="col-form-label">Perusahaan</label>
                                        <input type="text" class="form-control" name="company" id="company">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group mb-2">
                                        <label for="message" class="col-form-label">Pesan</label>
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="g-recaptcha mb-3" data-sitekey="6Ldif3EdAAAAAG_-wHumRSkNuV8Y2eeLLTYpdoSR"></div>
                                    </div>
                                </div>
                                <div class="row">
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
                <div class="col-md-6 my-auto p-0">

                    <div style="position: absolute;top: 0;">
                        <div style="background-image: url(/assets/logo/maps.webp);width: 557px;height: 606px;background-size: cover;border-radius: 0 0.25rem 0.25rem 0;background-position: center;"></div>
                    </div>

                    <!-- <div class="card-body p-0 my-auto" style="position: relative;left: 100%;">
                        <div class="flex-column">
                            <div class="d-flex text-white">
                                <i class="bi bi-geo-alt"></i>
                                <h6 class="card-title ms-2">Alamat</h6>
                            </div>
                            <div class="d-flex">
                                <p style="color:#c5c5c5 !important">Jln. Kangkung No.18</p>
                            </div>
                            <div class="d-flex text-white">
                                <i class="bi bi-telephone"></i>
                                <h6 class="card-title ms-2">Telepon</h6>
                            </div>
                            <div class="d-flex">
                                <p style="color:#c5c5c5 !important">0811-2020-040</p>
                            </div>
                            <div class="d-flex text-white">
                                <i class="bi bi-envelope"></i>
                                <h6 class="card-title ms-2">Email</h6>
                            </div>
                            <div class="d-flex">
                                <p style="color:#c5c5c5 !important">techoff@sinovatif.com</p>
                            </div>
                        </div>

                        <a href="https://www.google.com/maps/place/RSIA+Harapan+Bunda/@-6.9455455,107.628318,14z/data=!4m5!3m4!1s0x2e68e825ddaa500d:0x38c5353a3b6a52cb!8m2!3d-6.9559466!4d107.6621211" type="button" class="btn btn-outline-light" target="_blank">Google Maps</a>
                    </div> -->

                    <div class="card-body" style="position: relative;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="flex-column">
                                    <div class="d-flex text-white">
                                        <i class="bi bi-geo-alt"></i>
                                        <h6 class="card-title ms-2" style="font-size: 12px !important;">Alamat Kantor Pusat</h6>
                                    </div>
                                    <div class="d-flex ms-4 me-2">
                                        <p style="font-size: 12px;color:#c5c5c5 !important">Jln. Talun Kidul RT.01/RW.06, Kel.Talun, Kec. Sumedang Utara, Kab. Sumedang</p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-4">
                                <div class="flex-column">
                                    <div class="d-flex text-white">
                                        <i class="bi bi-geo-alt"></i>
                                        <h6 class="card-title ms-2" style="font-size: 12px !important;">Alamat Kantor Cabang</h6>
                                    </div>
                                    <div class="d-flex ms-4 me-2">
                                        <p style="font-size: 12px;color:#c5c5c5 !important">Jln. Talun Kidul RT.01/RW.06, Kel.Talun, Kec. Sumedang Utara, Kab. Sumedang</p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-4">
                                <div class="flex-column">
                                    <div class="d-flex text-white">
                                        <i class="bi bi-geo-alt"></i>
                                        <h6 class="card-title ms-2" style="font-size: 12px !important;">Alamat Workshop</h6>
                                    </div>
                                    <div class="d-flex ms-4 me-2">
                                        <p style="font-size: 12px;color:#c5c5c5 !important">Jln. Talun Kidul RT.01/RW.06, Kel.Talun, Kec. Sumedang Utara, Kab. Sumedang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-md-4">
                                <div class="flex-column">
                                    <div class="d-flex text-white">
                                        <i class="bi bi-clock"></i>
                                        <h6 class="card-title ms-2" style="font-size: 12px !important;">Jam Operasional</h6>
                                    </div>
                                    <div class="flex-column ms-4">
                                        <p class="mb-0" style="font-size: 12px;color:#c5c5c5 !important">Senin - Jum'at</p>
                                        <p style=" font-size: 12px;color:#c5c5c5 !important">08.00 s/d 17.00 WIB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flex-column">
                                    <div class="d-flex text-white">
                                        <i class="bi bi-clock"></i>
                                        <h6 class="card-title ms-2" style="font-size: 12px !important;">Jam Operasional</h6>
                                    </div>
                                    <div class="flex-column  ms-4">
                                        <p class="mb-0" style="font-size: 12px;color:#c5c5c5 !important">Senin - Jum'at</p>
                                        <p style=" font-size: 12px;color:#c5c5c5 !important">08.00 s/d 17.00 WIB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flex-column">
                                    <div class="d-flex text-white">
                                        <i class="bi bi-clock"></i>
                                        <h6 class="card-title ms-2" style="font-size: 12px !important;">Jam Operasional</h6>
                                    </div>
                                    <div class="flex-column  ms-4">
                                        <p class="mb-0" style="font-size: 12px;color:#c5c5c5 !important">Senin - Jum'at</p>
                                        <p style=" font-size: 12px;color:#c5c5c5 !important">08.00 s/d 17.00 WIB</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 justify-content-center">
                                <div class="flex-column">
                                    <div class="d-flex justify-content-center text-white">
                                        <i class="bi bi-person"></i>
                                        <h6 class="card-title ms-2" style="font-size: 12px !important;">Customer Service</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="flex-column ms-4">
                                        <p class="mb-0" style="font-size: 12px;color:#c5c5c5 !important">Ryan Samsudin</p>
                                        <p class=" mb-0" style="font-size: 12px;color:#c5c5c5 !important">089-531-123-123</p>
                                        <p style=" font-size: 12px;color:#c5c5c5 !important">ryan@mail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 justify-content-center">
                                <div class="flex-column">
                                    <div class="d-flex justify-content-center text-white">
                                        <i class="bi bi-person"></i>
                                        <h6 class="card-title ms-2" style="font-size: 12px !important;">Customer Service</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="flex-column ms-4">
                                        <p class="mb-0" style="font-size: 12px;color:#c5c5c5 !important">Ryan Samsudin</p>
                                        <p class=" mb-0" style="font-size: 12px;color:#c5c5c5 !important">089-531-123-123</p>
                                        <p style=" font-size: 12px;color:#c5c5c5 !important">ryan@mail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <a href="https://www.google.com/maps/place/RSIA+Harapan+Bunda/@-6.9455455,107.628318,14z/data=!4m5!3m4!1s0x2e68e825ddaa500d:0x38c5353a3b6a52cb!8m2!3d-6.9559466!4d107.6621211" type="button" class="btn btn-outline-light" target="_blank">Google Maps</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/../Footer.php' ?>