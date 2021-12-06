<?php include __DIR__ . '/../Header.php' ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-stretch no-gutters contact-wrap">
                <div class="col-md-6">
                    <div class="form h-100">
                        <h3>Send us a message</h3>
                        <form class="mb-5" method="post" id="contactForm" name="contactForm">
                            <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                                </div>
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Email *</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Your email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone #">
                                </div>
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Company</label>
                                    <input type="text" class="form-control" name="company" id="company" placeholder="Company  name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group mb-5">
                                    <label for="message" class="col-form-label">Message *</label>
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="4" placeholder="Write your message"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </form>

                        <div id="form-message-warning mt-4"></div>
                        <div id="form-message-success">
                            Your message was sent, thank you!
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.6639174518555!2d107.62275071420073!3d-6.930713669765374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e87efa30ef29%3A0x32ec20403fe5c6ba!2sJl.%20Kangkung%20Kidul%20No.18%2C%20Lkr.%20Sel.%2C%20Kec.%20Lengkong%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040263!5e0!3m2!1sen!2sid!4v1638766711575!5m2!1sen!2sid" width="520" height="530" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/../Footer.php' ?>