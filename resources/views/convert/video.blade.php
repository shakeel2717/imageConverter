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
                <h3>Your Image: </h3>
                <img src="{{ asset('text/') }}/{{ session('result')['img'] }}" alt="Uploaded Image">
            </div>
            <div class="col-lg-12 text-center">
                <h3>Result</h3>
                <video width="100%" height="auto" autoplay controls>
                    <source src="{{ session('result')['video'] }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</section>
@endif
<section id="service" class="services pt-0">

    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <span>Convert Image to VIDEO</span>
            <h2>Convert Image to VIDEO</h2>
            <div class="col-md-8 mx-auto">
                <p>Experience Fast and Accurate Image Conversion with Our Top-Notch Technology</p>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 mx-auto" data-aos="fade-up" data-aos-delay="100">
                <form action="{{ route('img-to-video.request') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="img">Upload your Image</label>
                        <input type="file" name="img" id="img" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="color">Select Background Image</label>
                        <select name="color" id="color" class="form-control">
                            <option value="pink" selected>Pink</option>
                            <option value="red">Red</option>
                            <option value="orange">Orange</option>
                            <option value="black">Black</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="textColor">Select Text Color</label>
                        <select name="textColor" id="textColor" class="form-control">
                            <option value="pink" selected>Pink</option>
                            <option value="red">Red</option>
                            <option value="orange">Orange</option>
                            <option value="black">Black</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fontSize">Font Size in Video</label>
                        <select name="fontSize" id="fontSize" class="form-control">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50" selected>50</option>
                            <option value="60">60</option>
                            <option value="70">70</option>
                            <option value="80">80</option>
                            <option value="90">90</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="form-group mt-3 row">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Generate VIDEO</button>
                    </div>
                </form>
            </div>
        </div>
</section>
@endsection