@extends('layouts.app')

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>Rgi Expert Solutions</h1>
        <h2>Contact us</h2>
        <a href="{{route('about')}}" class="btn-get-started scrollto">Get Started</a>
    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <div class="section-title">
                        <h2>Contact</h2>
                        <p>Monday to Saturday (09:00 AM to 06:00 PM)
                            Sunday Holiday</p>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="info mt-4">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Head Office:</h4>
                        <p>RGI EXPERT SOLUTIONS-Head Office, 10, Shastri Nagar-C, Bajrang Wadi, Pali, 306401, Rajasthan
                            (India)</p>
                    </div>
                    <div class="info mt-4">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Corporate Office:</h4>
                        <p>RGI EXPERT SOLUTIONS, 20, Punayata Road, Shekhawat Nagar, Near Jawahar Nagar, Pali, 306401,
                            Rajasthan
                            (India)</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mt-4">
                            <div class="info">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p><a href="mailto:info@info@rgiexpertsolutions.com">info@rgiexpertsolutions.com</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info w-100 mt-4">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p><a href="tel:+91 979 244 0399">+91 979 244 0399</a> , <a
                                        href="tel:+91 902 415 0951">+91 902 415
                                        0951</a></p>
                            </div>
                        </div>
                    </div>
                    <livewire:mail-livewire />
                    <livewire:scripts />
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->



@endsection