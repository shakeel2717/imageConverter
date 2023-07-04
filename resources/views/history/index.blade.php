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
            <div class="col-lg-12 w-100">
                <h3>Your Image: </h3>
                <img src="{{ asset('text/') }}/{{ session('result')['img'] }}" alt="Uploaded Image">
            </div>
            <div class="col-lg-12">
                <h3>Result: </h3>
                <p>{!! session('result')['data'] !!}</p>
            </div>
        </div>
    </div>
</section>
@endif
<section id="service" class="services pt-0">

    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <span>Recent Conversion History</span>
            <h2>Recent Conversion History</h2>
            <div class="col-md-8 mx-auto">
                <p>Experience Fast and Accurate Image Conversion with Our Top-Notch Technology</p>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 mx-auto" data-aos="fade-up" data-aos-delay="100">

            </div>
        </div>

        <div class="row gy-4">
            <div class="col-md-10 mx-auto" data-aos="fade-up" data-aos-delay="100">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Result</th>
                            <th>Audio</th>
                            <th>Video</th>
                            <th>Convert Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                        <tr>
                            <td>{{ $history->type }}</td>
                            <td><img src="text/{{ $history->attachment }}" alt="Convert Image"></td>
                            <td>{{ $history->result }}</td>
                            <td><?php
                                if (!$history->audio) {
                                    echo "Not Available";
                                } else {
                                ?>
                                    <audio src="{{ $history->audio }}" controls></audio>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?php
                                if (!$history->video) {
                                    echo "Not Available";
                                } else {
                                ?>
                                    <video width="300px" height="100px" controls>
                                        <source src="{{ $history->video }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                <?php
                                }
                                ?>
                            </td>
                            <td>{{ $history->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</section>
@endsection