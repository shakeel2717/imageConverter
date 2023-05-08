@extends('layout.app')
@section('content')
@if (session('result'))
<section id="horizontal-pricing" class="horizontal-pricing pt-0">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-header">
            <span>Output Result</span>
            <h2>Output Result</h2>

        </div>

        <div class="row gy-4 pricing-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 w-100 text-center">
                <h3>Your Audio: </h3>
                <img src="{{ asset('text/') }}/{{ session('result')['img'] }}" alt="Uploaded Image">
            </div>
            <div class="col-lg-12 text-center">
                <h3>Result: </h3>
                <audio src="{{ asset(session('result')['audio']) }}" autoplay controls></audio>
            </div>
        </div>
    </div>
</section>
@endif
<section id="service" class="services pt-0">

    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <span>Convert Image to AUDIO</span>
            <h2>Convert Image to AUDIO</h2>
            <div class="col-md-8 mx-auto">
                <p>Experience Fast and Accurate Image Conversion with Our Top-Notch Technology</p>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 mx-auto" data-aos="fade-up" data-aos-delay="100">
                <form action="{{ route('img-to-audio.request') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="img">Upload your Image</label>
                        <input type="file" name="img" id="img" class="form-control">
                    </div>
                    <div class="form-group mt-3 row">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Generate Audio</button>
                    </div>
                </form>
            </div>
        </div>
</section>
@endsection