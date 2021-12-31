<!------- Footer ------->
<div class="container-fluid " style="background-color: #141414 !important;">
    <footer class="row py-4 mt-5 border-top">

        <div class="col-md-2 col-12" style="margin-top: auto;margin-bottom: auto;">
            <img class="d-flex mx-auto mb-2" src="/assets/logo/PTA-logo.png" alt="" style="width: 110px;">
            <p class="text-center m-0" style="color: #c1c1c1;font-weight: 600;">Panca Teknologi Aksesindo</p>
        </div>

        <div class="col-md-2 pe-3 mb-3">
            <h6 style="color: #c1c1c1;border-bottom: 1.3pt solid #c1c1c1;">Asosiasi</h6>
            <div class="row">
                <?php foreach ($GLOBALS['asosiasi']->items as $key => $data) { ?>
                    <div class="col-md-4 col-2 mb-2 mt-2" style="padding-left: 0.7rem; padding-right: 0.7rem;">
                        <img class="rounded-circle" src="/assets/media/<?= $data['path_media'] ?>" alt="" width="100%">
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="col-md-2 pe-3 mb-3">
            <h6 style="color: #c1c1c1;border-bottom: 1.3pt solid #c1c1c1;">Akreditasi</h6>
            <div class="row">
                <?php foreach ($GLOBALS['akreditasi']->items as $key => $data) { ?>
                    <div class="col-md-4 col-2 mb-2 mt-2" style="padding-left: 0.7rem; padding-right: 0.7rem;">
                        <img class="rounded-circle" src="/assets/media/<?= $data['path_media'] ?>" alt="" width="100%">
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="col-md-2 col-12 text-center d-sm-block d-none" style="margin-top: auto;margin-bottom: auto;">
            <div class="d-flex-column justify-content-end">
                <div class="row">
                    <div class="col-md-12 col-6">
                        <a href="https://play.google.com/store/apps/dev?id=5430770932615639149" target="_blank">
                            <img class="mb-2" src="/assets/logo/playstore.png" alt="" style="width: 90%">
                        </a>
                    </div>
                    <div class="col-md-12 col-6">
                        <a href="https://play.google.com/store/apps/dev?id=5430770932615639149" target="_blank">
                            <img src="/assets/logo/appstore.png" alt="" style="width: 90%">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2 col-12 mb-3" style="margin-bottom: auto; ">
            <!-- <div class="col-md-2 col-12" style="margin-bottom: auto; width: 12% !important;"> -->
            <h6 style="color: #c1c1c1;border-bottom: 1.3pt solid #c1c1c1;">Social Media</h6>
            <ul class="nav flex-column">
                <?php foreach ($GLOBALS['sosial_media']->items as $key => $data) { ?>
                    <li class="nav-item "><a href="<?= $data['link_sosial_media'] ?>" class="nav-link p-0 text" style="color: #c1c1c1;" target="_blank"><i class="<?= $data['icon_sosial_media'] ?>"></i> <?= $data['nama_sosial_media'] ?></a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="col-md-2 col-12" style="margin-bottom: auto;">
            <!-- <div class="col-md-2 col-12" style="margin-bottom: auto;width: 18% !important;"> -->
            <h6 style="color: #c1c1c1;border-bottom: 1.3pt solid #c1c1c1;">Lainnya</h6>
            <ul class="nav flex-column">
                <?php foreach ($GLOBALS['menu_footer'] as $key1 => $data1) { ?>
                    <li class="nav-item "><a href="<?= arr_offset($data1, 'link_url') ?>" class="nav-link p-0 text" style="color: #c1c1c1;" target="_blank" aria-label="<?= arr_offset($data1, 'menu') ?>"><?= arr_offset($data1, 'menu') ?></a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="col-md-2 col-12 mt-3 text-center d-sm-none d-block" style="margin-top: auto;margin-bottom: auto;">
            <div class="d-flex-column justify-content-end">
                <div class="row">
                    <div class="col-md-12 col-6">
                        <a href="https://play.google.com/store/apps/dev?id=5430770932615639149" target="_blank">
                            <img class="mb-2" src="/assets/logo/playstore.png" alt="" style="width: 90%">
                        </a>
                    </div>
                    <div class="col-md-12 col-6">
                        <a href="https://play.google.com/store/apps/dev?id=5430770932615639149" target="_blank">
                            <img src="/assets/logo/appstore.png" alt="" style="width: 90%">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</div>
<div class="container-fluid justify-content-center text-center py-3" style="background-color: #101010 !important;">
    <p class="text-muted mb-0">2021 &copy; Panca Teknologi Aksesindo</p>
</div>

<!------- Popper ------->
<script src="/assets/js/popper.min.js"></script>

<!-- jQuery UI -->
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!------- Bootstrap JS ------->
<script src="/assets/public/js/bootstrap.bundle.min.js"></script>
<script src="/assets/public/js/bootstrap.min.js"></script>
<script src="/assets/public/js/bootstrap.js"></script>

<!------- Fontawesome ------->
<script src="https://kit.fontawesome.com/997e36de6c.js" crossorigin="anonymous"></script>

<!------- Owl Carousel ------->
<script src="/assets/plugins/owl-carousel/js/owl.carousel.min.js"></script>
<script src="/assets/plugins/owl-carousel/js/owl.carousel.js"></script>

<!------- Full Calendar ------->
<script src="/assets/plugins/fullcalendar/main.js"></script>
<script src="/assets/plugins/moment/moment.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<script>
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>

<script>
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listYear'
            },

            displayEventTime: false, // don't show the time column in list view

            // THIS KEY WON'T WORK IN PRODUCTION!!!
            // To make your own Google API key, follow the directions here:
            // http://fullcalendar.io/docs/google_calendar/
            googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',

            // US Holidays
            events: 'en.usa#holiday@group.v.calendar.google.com',

            eventClick: function(arg) {
                // opens events in a popup window
                window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

                arg.jsEvent.preventDefault() // don't navigate in main tab
            },

            loading: function(bool) {
                document.getElementById('loading').style.display =
                    bool ? 'block' : 'none';
            }

        });

        calendar.render();
    });
</script>

</body>

</html>