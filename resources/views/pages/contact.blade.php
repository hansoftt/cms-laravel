@extends('layouts.page')

@section('title', 'Contact')

@section('content')
<div id="banner-area" class="banner-area" style="background-image:url({{ asset('assets/img/slider1.jpg') }})">
  {{-- <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end --> --}}
</div><!-- Banner area end -->

<section id="main-container" class="main-container">
  <div class="container">

    <div class="row text-center">
      <div class="col-12">
        <h2 class="section-title">Reaching our Office</h2>
        <h3 class="section-sub-title">Find Our Location</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fas fa-map-marker-alt mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Visit Our Office</h4>
            <p>{{ $contactSettings->address }}</p>
          </div>
        </div>
      </div><!-- Col 1 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-envelope mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Email Us</h4>
            <p><a href="mailto:{{ $contactSettings->email }}">{{ $contactSettings->email }}</a></p>
          </div>
        </div>
      </div><!-- Col 2 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-phone-square mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Call Us</h4>
            <p><a href="tel:{{ $contactSettings->phone }}">{{ $contactSettings->phone }}</a></p>
          </div>
        </div>
      </div><!-- Col 3 end -->

    </div><!-- 1st row end -->

    <div class="gap-60"></div>

    <div class="google-map">
      <div id="map" class="map" data-latitude="11.2259298" data-longitude="78.1482565" data-marker="{{ asset('assets/img/marker.png') }}" data-marker-name="Constra"></div>
    </div>

    <div class="gap-60 mrb-30" id="contact"></div>

    <div class="row">
      <div class="col-md-12">
        @if(session('success'))
          <div class="py-2 alert alert-success">
              {{ session('success') }}
          </div>
        @endif
        <h3 class="column-title">We love to hear</h3>
        <!-- contact form works with formspree.io  -->
        <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
        <form id="contact-form" action="{{ url('/contact') }}" method="post" role="form">
            @csrf
          <div class="error-container"></div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Name of the Institution</label>
                <input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Official Email</label>
                <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email"
                  required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Official Phone Number</label>
                <input class="form-control form-control-name" name="phone" id="phone" placeholder="" type="text"
                  required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Subject</label>
                <input class="form-control form-control-subject" name="subject" id="subject" placeholder="" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10"
              required></textarea>
          </div>
          <div class="text-right"><br>
            <button class="btn btn-primary solid blank" type="submit">Send Message</button>
          </div>
        </form>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->
@endsection
