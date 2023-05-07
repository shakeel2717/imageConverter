<footer id="footer" class="footer">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="{{ asset('assets/img/logo-light.png') }}" alt="Logo">
                </a>
                <p>Our image conversion service was founded with the mission to simplify the conversion process for our clients. We understand that the need to convert images to text, audio, or video can be a daunting task. </p>
                <div class="social-links d-flex mt-4">
                    <a href="#" class="twitter"><i class="bi bi-whatsapp"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Image to TEXT</a></li>
                    <li><a href="#">Image to AUDIO</a></li>
                    <li><a href="#">Image to VIDEO</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>
                    {{ env('APP_ADDRESS') }}<br><br>
                    <strong>Phone:</strong> {{ env('APP_PHONE') }}<br>
                    <strong>Email:</strong> {{ env('APP_EMAIL') }}<br>
                </p>

            </div>

        </div>
    </div>

    <div class="container mt-4">
        <div class="copyright">
            &copy; Copyright <strong><span>{{ env('APP_NAME') }}</span></strong>. All Rights Reserved
        </div>
    </div>

</footer>
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>