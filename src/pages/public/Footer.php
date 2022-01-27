<!------- Footer ------->
<div class="container-fluid justify-content-center text-center py-3" style="background-color: #101010 !important;">
    <p class="text-muted mb-0">2022 &copy; PT. Tristek Media Kreasindo</p>
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