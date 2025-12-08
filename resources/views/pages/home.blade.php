@extends('layouts.page')

@section('title', 'Home')

@section('content')
    <div class="banner-carousel banner-carousel-1 mb-0">
        <div class="banner-carousel-item" style="background-image:url({{ asset('assets/img/slider1.jpg') }})">
            <div class="slider-content">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <!--<div class="col-md-12 text-center">
                    <h2 class="slide-title" data-animation-in="slideInLeft">CMS Website</h2>
                    <h3 class="slide-sub-title" data-animation-in="slideInRight">CMS Website</h3>
                    <p data-animation-in="slideInLeft" data-duration-in="1.2">
                        <a href="#" class="slider btn btn-primary">Our Services</a>
                        <a href="#" class="slider btn btn-primary border">Contact Now</a>
                    </p>
                  </div>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-carousel-item" style="background-image:url({{ asset('assets/img/slider1.jpg') }})">
            <div class="slider-content text-left">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <!--<div class="col-md-12">
                    <h2 class="slide-title-box" data-animation-in="slideInDown">CMS Website</h2>
                    <h3 class="slide-title" data-animation-in="fadeIn">CMS Website</h3>
                    <h3 class="slide-sub-title" data-animation-in="slideInLeft">CMS Website</h3>
                    <p data-animation-in="slideInRight">
                        <a href="#" class="slider btn btn-primary border">Our Services</a>
                    </p>
                  </div>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-carousel-item" style="background-image:url({{ asset('assets/img/slider1.jpg') }})">
            <div class="slider-content text-right">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <!--<div class="col-md-12">
                    <h2 class="slide-title" data-animation-in="slideInDown">CMS Website</h2>
                    <h3 class="slide-sub-title" data-animation-in="fadeIn">CMS Website</h3>
                    <p class="slider-description lead" data-animation-in="slideInRight">CMS Website</p>
                    <div data-animation-in="slideInLeft">
                        <a href="#" class="slider btn btn-primary" aria-label="contact-with-us">Get Free Quote</a>
                        <a href="#" class="slider btn btn-primary border" aria-label="learn-more-about-us">Learn more</a>
                    </div>
                  </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="call-to-action-box no-padding">
        <div class="container">
            <div class="action-style-box">
                <div class="row align-items-center">
                    <div class="col-md-8 text-center text-md-left">
                        <div class="call-to-action-text">
                            <h3 class="action-title">CMS Website</h3>
                        </div>
                    </div><!-- Col end -->
                    <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                        <div class="call-to-action-btn">
                            <a class="btn btn-dark" href="{{ url('contact') }}">Contact Us</a>
                        </div>
                    </div><!-- col end -->
                </div><!-- row end -->
            </div><!-- Action style box -->
        </div><!-- Container end -->
    </section><!-- Action end -->

    <section id="ts-features" class="ts-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ts-intro">
                        <h2 class="into-title">About Us</h2>
                        <h3 class="into-sub-title">CMS <span class="text-primary">Website</span> Laravel</h3>
                        <p>CMS Website is dedicated to supporting Higher Education Institutions
                            (HEIs) in achieving academic excellence, enhancing national and global visibility,
                            is a website skeleton project for building CMS website from scratch using Laravel framework.that has following features:</p>
                    </div><!-- Intro box end -->

                    <div class="gap-20"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-trophy"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">Built-in CMS theme</h3>
                                </div>
                            </div><!-- Service 1 end -->
                        </div><!-- col end -->

                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-sliders-h"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">Adapt to Various Needs</h3>
                                </div>
                            </div><!-- Service 2 end -->
                        </div><!-- col end -->
                    </div><!-- Content row 1 end -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-thumbs-up"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">No CSS Required</h3>
                                </div>
                            </div><!-- Service 1 end -->
                        </div><!-- col end -->

                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">Multi level menus</h3>
                                </div>
                            </div><!-- Service 2 end -->
                        </div><!-- col end -->
                    </div><!-- Content row 1 end -->
                </div><!-- Col end -->

                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="accordion accordion-group" id="our-values-accordion">
                        <img loading="lazy" class="img-fluid" src="{{ asset('assets/img/best-template.jpg') }}"
                            alt="service-avater-image">


                    </div>
                    <!--/ Accordion end -->

                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- Feature are end -->

    <section id="main-container" class="main-container pb-2">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="flex flex-col space-y-1.5 p-6 text-center pb-4 border rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 duration-300 group bg-white dark:bg-[#151515]">
                        <!-- Icon -->
                        </br>
                        <div class="w-16 h-16 bg-emerald/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open w-8 h-8 text-emerald"><path d="M12 7v14"></path><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path></svg>
                        </div>

                        <!-- Title -->
                        <h3 class="tracking-tight text-2xl font-bold text-foreground">
                            <a href="#" class="hover:text-primary">HTML Template</a>
                        </h3>

                        <!-- Description -->
                        <p class="text-muted-foreground text-lg">Lorem ipsum dolor sit amet</p>
                        <p>Consectetur adipiscing elit</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <p>Consectetur adipiscing elit</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <!-- Learn More -->
                        <a
                            href="#"class="inline-flex items-center justify-center mt-2 text-primary font-medium hover:underline">
                            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full mt-6 bg-gradient-hero border-0 hover:opacity-90">Learn More</button>
                        </a>
                    </div>
                </div>
                <!-- Col 1 end -->

                <div class="col-lg-4 col-md-6 mb-5">
                    <div
                        class="flex flex-col space-y-1.5 p-6 text-center pb-4 border rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 duration-300 group bg-white dark:bg-[#151515]">
                        <!-- Icon -->
                        </br>
                        <div
                            class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award w-8 h-8 text-primary"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path><circle cx="12" cy="8" r="6"></circle></svg>
                        </div>

                        <!-- Title -->
                        <h3 class="tracking-tight text-2xl font-bold text-foreground">
                            <a href="#" class="hover:text-primary">Laravel 11</a>
                        </h3>

                        <!-- Description -->
                        <p class="text-muted-foreground text-lg">Lorem ipsum dolor sit amet</p>
                        <p>Consectetur adipiscing elit</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <p>Consectetur adipiscing elit</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <!-- Learn More -->
                        <a href="#"
                            class="inline-flex items-center justify-center mt-2 text-primary font-medium hover:underline">
                            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full mt-6 bg-gradient-hero border-0 hover:opacity-90">Learn More</button>
                            </a>
                    </div>
                </div>
                <!-- Col 2 end -->

                <div class="col-lg-4 col-md-6 mb-5">
                    <div
                        class="flex flex-col space-y-1.5 p-6 text-center pb-4 border rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 duration-300 group bg-white dark:bg-[#151515]">
                        <!-- Icon -->
                        </br>
                        <div
                            class="w-16 h-16 bg-gold/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-8 h-8 text-gold"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>
                        </div>

                        <!-- Title -->
                        <h3 class="tracking-tight text-2xl font-bold text-foreground">
                            <a href="#" class="hover:text-primary">Loosely Coupled HTML, CSS</a>
                        </h3>
                        <!-- Description -->
                        <p class="text-muted-foreground text-lg">Lorem ipsum dolor sit amet</p>
                        <p>Consectetur adipiscing elit</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <p>Consectetur adipiscing elit</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <!-- Learn More -->
                        <a href="#"
                            class="inline-flex items-center justify-center mt-2 text-primary font-medium hover:underline">
                            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full mt-6 bg-gradient-hero border-0 hover:opacity-90">Learn More</button>
                        </a>
                    </div>
                </div>
                <!-- Col 3 end -->

                <div class="col-lg-4 col-md-6 mb-5">
                    <div
                        class="flex flex-col space-y-1.5 p-6 text-center pb-4 border rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 duration-300 group bg-white dark:bg-[#151515]">
                        <!-- Icon -->
                        <br>
                        <div
                            class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award w-8 h-8 text-primary"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path><circle cx="12" cy="8" r="6"></circle></svg>
                        </div>

                        <!-- Title -->
                        <h3 class="tracking-tight text-2xl font-bold text-foreground">
                            <a href="#" class="hover:text-primary">Fast &amp; Secure</a>
                        </h3>

                        <!-- Description -->
                        <p class="text-muted-foreground text-lg">
                            Powered by Laravel 11 framework for speed and security
                        </p>

                        <!-- Learn More -->
                        <a href="#"
                            class="inline-flex items-center justify-center mt-2 text-primary font-medium hover:underline">
                            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full mt-6 bg-gradient-hero border-0 hover:opacity-90">Learn More</button>
                        </a>
                    </div>
                </div>
                <!-- Col 4 end -->

                <div class="col-lg-4 col-md-6 mb-5">
                    <div
                        class="flex flex-col space-y-1.5 p-6 text-center pb-4 border rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 duration-300 group bg-white dark:bg-[#151515]">
                        <!-- Icon -->
                        </br>
                        <div
                            class="w-16 h-16 bg-emerald/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open w-8 h-8 text-emerald"><path d="M12 7v14"></path><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path></svg>
                        </div>

                        <!-- Title -->
                        <h3 class="tracking-tight text-2xl font-bold text-foreground">
                            <a href="#" class="hover:text-primary">
                                Tested with Real Websites
                            </a>
                        </h3>

                        <!-- Description -->
                        <p class="text-muted-foreground text-lg">
                            Successfully deployed in several websites in production
                        </p>

                        <!-- Learn More -->
                        <a href="#"
                            class="inline-flex items-center justify-center mt-2 text-primary font-medium hover:underline">
                                <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full mt-6 bg-gradient-hero border-0 hover:opacity-90">Learn More</button>
                        </a>
                    </div>
                </div>
                <!-- Col 5 end -->

                <div class="col-lg-4 col-md-6 mb-5">
                    <div
                        class="flex flex-col space-y-1.5 p-6 text-center pb-4 border rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 duration-300 group bg-white dark:bg-[#151515]">
                        <!-- Icon -->
                        <br>
                        <div
                            class="w-16 h-16 bg-gold/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-8 h-8 text-gold"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>
                        </div>

                        <!-- Title -->
                        <h3 class="tracking-tight text-2xl font-bold text-foreground">
                            <a href="#" class="hover:text-primary">
                               CSS integration @ BEST
                            </a>
                        </h3>

                        <!-- Description -->
                        <p class="text-muted-foreground text-lg">
                            Integrates with Tailwind CSS, Bootstrap, Bulma, Foundation, and more
                        </p>

                        <!-- Learn More -->
                        <a href="#"
                            class="inline-flex items-center justify-center mt-2 text-primary font-medium hover:underline">
                                <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full mt-6 bg-gradient-hero border-0 hover:opacity-90">Learn More</button>
                        </a>
                    </div>
                </div>
                <!-- Col 6 end -->

            </div><!-- Main row end -->
        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
@endsection
