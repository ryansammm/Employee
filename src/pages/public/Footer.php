<!------- Footer ------->
<div class="container-fluid " style="background-color: #141414 !important;">
    <footer class="row py-4 mt-5 border-top">

        <div class="col-md-2" style="margin-top: auto;margin-bottom: auto;">
            <img class="d-flex mx-auto mb-2" src="/assets/logo/PTA-logo.png" alt="" width="80">
            <p class=" m-0" style="color: #c1c1c1;">Panca Teknologi Aksesindo</p>
        </div>

        <div class="col-md-2 pe-3">
            <h6 style="color: #c1c1c1;border-bottom: 1.3pt solid #c1c1c1;">Asosiasi</h6>
            <div class="row">
                <?php foreach ($GLOBALS['asosiasi']->items as $key => $data) { ?>
                    <div class="col-4 mb-2" style="padding-left: 0.7rem; padding-right: 0.7rem;">
                        <img class="rounded-circle" src="/assets/media/<?= $data['path_media'] ?>" alt="" width="100%">
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="col-md-2 pe-3">
            <h6 style="color: #c1c1c1;border-bottom: 1.3pt solid #c1c1c1;">Akreditasi</h6>
            <div class="row">
                <?php foreach ($GLOBALS['akreditasi']->items as $key => $data) { ?>
                    <div class="col-4 mb-2" style="padding-left: 0.7rem; padding-right: 0.7rem;">
                        <img class="rounded-circle" src="/assets/media/<?= $data['path_media'] ?>" alt="" width="100%">
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="col-md-2 text-center" style="margin-top: auto;margin-bottom: auto;">
            <div class="d-flex-column justify-content-end">
                <a href="">
                    <img class="mb-2" src="/assets/logo/playstore.png" alt="" style="width: 120pt;">
                </a>
                <a href="">
                    <img src="/assets/logo/appstore.png" alt="" style="width: 120pt;">
                </a>
            </div>
        </div>

        <div class="col-md-2" style="margin-bottom: auto; width: 12% !important;">
            <h6 style="color: #c1c1c1;border-bottom: 1.3pt solid #c1c1c1;">Social Media</h6>
            <ul class="nav flex-column">
                <li class="nav-item "><a href="#" class="nav-link p-0 text" style="color: #c1c1c1;"><i class="bi bi-facebook"></i> Facebook</a></li>
                <li class="nav-item "><a href="#" class="nav-link p-0 text" style="color: #c1c1c1;"><i class="bi bi-instagram"></i> Instagram</a></li>
                <li class="nav-item "><a href="#" class="nav-link p-0 text" style="color: #c1c1c1;"><i class="bi bi-twitter"></i> Twitter</a></li>
                <li class="nav-item "><a href="#" class="nav-link p-0 text" style="color: #c1c1c1;"><i class="bi bi-youtube"></i> Youtube</a></li>
            </ul>
        </div>

        <div class="col-md-2" style="margin-bottom: auto;width: 18% !important;">
            <h6 style="color: #c1c1c1;border-bottom: 1.3pt solid #c1c1c1;">Lainnya</h6>
            <ul class="nav flex-column">
                <?php foreach ($GLOBALS['menu_footer'] as $key1 => $data1) { ?>
                    <li class="nav-item "><a href="<?= arr_offset($data1, 'link_url') ?>" class="nav-link p-0 text" style="color: #c1c1c1;" target="_blank" aria-label="<?= arr_offset($data1, 'menu') ?>"><?= arr_offset($data1, 'menu') ?></a></li>
                <?php } ?>
                
            </ul>
        </div>

    </footer>
</div>
<div class="container-fluid justify-content-center text-center py-3" style="background-color: #101010 !important;">
    <p class="text-muted mb-0">2021 &copy; Panca Teknologi Aksesindo</p>
</div>



<!------- Bootstrap JS ------->
<script src="/assets/public/js/bootstrap.bundle.min.js"></script>
<script src="/assets/public/js/bootstrap.min.js"></script>
<script src="/assets/public/js/bootstrap.js"></script>

<!------- Fontawesome ------->
<script src="https://kit.fontawesome.com/997e36de6c.js" crossorigin="anonymous"></script>

<!------- Owl Carousel ------->
<script src="/assets/plugins/owl-carousel/js/owl.carousel.min.js"></script>
<script src="/assets/plugins/owl-carousel/js/owl.carousel.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>




</body>

</html>