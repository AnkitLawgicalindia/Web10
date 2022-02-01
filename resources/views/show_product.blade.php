@extends('layouts.app')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Products Details</h2>
        <ol>
          <li><a href={{route('index')}}>Home</a></li>
          <li>Products Details</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide">
                <img src="{{$product->image}}" alt="">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: {{$product->category_name}}</li>
              <li><strong>Client</strong>: {{$product->client}}</li>
              <li><strong>Project date</strong>: {{$product->created_at}}</li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>{{$product->title}}</h2>
            <p>
              {{$product->description}}
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

@endsection