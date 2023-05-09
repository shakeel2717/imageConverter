@extends('layout.app')
@section('content')
<section id="about" class="about pt-0 mt-5">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            <div class="col-lg-6">
                <img src="{{ asset('assets/img/ocr.svg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 content order-last  order-lg-first">
                <h3>About Us</h3>
                <p>
                    We are a team of professionals committed to providing high-quality conversion services for images, videos, and audio files. Our goal is to make it easy for our users to convert their media files without having to create an account or go through a complex process. We understand the importance of your time and resources, and we strive to deliver fast and reliable services that meet your needs.
                </p>
                <ul>
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-diagram-3"></i>
                        <div>
                            <h5>Upload Any Kind of Image</h5>
                            <p>Upload any image of your choice and let our system convert it for you.</p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-fullscreen-exit"></i>
                        <div>
                            <h5>Select Output (Text, Audio, Video)</h5>
                            <p>Choose the output format of your preference - text, audio or video.</p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-broadcast"></i>
                        <div>
                            <h5>Share the Result with your Friends</h5>
                            <p>Share the converted result with your friends easily.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>
<section id="service" class="services pt-0">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <span>Our Services</span>
            <h2>Our Services</h2>
            <div class="col-md-8 mx-auto">
                <p>We offer a range of conversion services that include image to text, image to audio, and image to video. Our platform is designed to handle files up to 5 MB, ensuring that you can convert your media files easily and quickly. We use advanced technologies and tools to ensure that the quality of the output files is high and meets your expectations.</p>
            </div>
        </div>

        <div class="row gy-4">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card">
                    <div class="card-img">
                        <img src="{{ asset('assets/img/text.png') }}" alt="" class="img-fluid">
                    </div>
                    <h3><a href="{{ route('img-to-text') }}" class="stretched-link">IMAGE TO TEXT</a></h3>
                    <p>Convert any image to text with our advanced OCR technology. Simply upload your image and get a downloadable text file. Perfect for digitizing documents or extracting text from images.</p>
                </div>
            </div><!-- End Card Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card">
                    <div class="card-img">
                        <img src="{{ asset('assets/img/audio.png') }}" alt="" class="img-fluid">
                    </div>
                    <h3><a href="{{ route('img-to-audio') }}" class="stretched-link">IMAGE TO AUDIO</a></h3>
                    <p>Transform any image into an audio file with our cutting-edge technology. Choose from different audio formats and adjust the speed and pitch of the audio to fit your needs. Great for creating podcasts or audiobooks.</p>
                </div>
            </div><!-- End Card Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card">
                    <div class="card-img">
                        <img src="{{ asset('assets/img/video.png') }}" alt="" class="img-fluid">
                    </div>
                    <h3><a href="{{ route('img-to-video') }}" class="stretched-link">IMAGE TO VIDEO</a></h3>
                    <p>Easily convert your image to a video with our powerful software. Add background music, captions, and transitions to create a professional-looking video. Ideal for creating slideshows or social media content.</p>
                </div>
            </div><!-- End Card Item -->

        </div>

    </div>
</section>
<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <span>Frequently Asked Questions</span>
            <h2>Frequently Asked Questions</h2>

        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-10">

                <div class="accordion accordion-flush" id="faqlist">

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                <i class="bi bi-question-circle question-icon"></i>
                                What file types do you support for conversion?
                            </button>
                        </h3>
                        <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                We support a range of file types, including JPEG, PNG and BMP.
                            </div>
                        </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                <i class="bi bi-question-circle question-icon"></i>
                                What is the maximum file size I can upload?
                            </button>
                        </h3>
                        <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                The maximum file size you can upload is 5 MB.
                            </div>
                        </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                <i class="bi bi-question-circle question-icon"></i>
                                How long does it take to convert a file?
                            </button>
                        </h3>
                        <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                The conversion time depends on the size of the file and the conversion service you require. However, we strive to provide fast and efficient services, so you can expect your file to be converted in a matter of minutes.
                            </div>
                        </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                                <i class="bi bi-question-circle question-icon"></i>
                                Can I convert multiple files at once?
                            </button>
                        </h3>
                        <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                Yes, you can convert multiple files at once by selecting the batch conversion option.
                            </div>
                        </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                                <i class="bi bi-question-circle question-icon"></i>
                                Is my data secure?
                            </button>
                        </h3>
                        <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                Yes, we take the security of your data seriously and ensure that all files uploaded to our platform are secure and protected. We also delete all files from our server after the conversion process is complete.
                            </div>
                        </div>
                    </div><!-- # Faq item-->

                </div>

            </div>
        </div>

    </div>
</section>
@endsection