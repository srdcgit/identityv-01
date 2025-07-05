@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $banner = getContent('theme_five_banner.content', true);
        $highlightedText = $banner->data_values->highlighted_heading_text;
    @endphp
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <style>
        .hero-caption {
            text-align: left;
            position: absolute;
            top: 16rem;
            margin-top: -1rem;
            left: 6.25rem;
            right: 0;
            width: 27rem;
            z-index: 5
        }

        .video {
            border-top-left-radius: 100px 100px;
            width: auto;
            height: 500px !important"

        }

        .product-slider {
            width: 500px;
            padding: 30px 30px 30px 30px;
            position: absolute;
            left: -15%;
            /* top: 27%; */
            z-index: 99;
            bottom: 20%;
            height: 430px;
        }

        .product-slider h1 {
            font-size: 38px;
            margin: 0;
            padding-top: 10px;
            text-align: center;
        }

        .product-slider h5 {
            font-size: 20px;
            margin: 0;
            padding-top: 10px;
            text-align: center;
        }

        .slide h6 {
            font-size: 20px;
            margin: 0;
            padding-top: 10px;
            text-align: center;
        }

        /* Slick slider custom styles */
        .product-slider .slick-slide {
            height: 270px !important;
            width: 550px !important;
            border: 0px !important;
        }

        .product-slider .slick-slide img {
            height: 150px !important;
            width: 450px !important;
        }

        .child {
            display: inline-block;
            vertical-align: middle;
            float: right;
        }


        .child2 {
            display: inline-block;
            margin-top: 10%;
        }

        .parent {
            text-align: center;
            height: 80vh;
            float: left;
            background: linear-gradient(to bottom, #fffef9 0, #fefffa 100%);

        }

        .title em {
            position: relative;
            display: inline-block;
            font-family: 'Gloria Hallelujah', cursive;
            color: #ab2931;
            font-size: 35px;
            !important font-weight: 600
        }

        .title h2 {
            color: #484848;
            text-transform: none !important;
            font-size: 35px;
            !important font-weight: 600;
            !important word-spacing: 10px;
            line-height: 50px !important;
        }

        .rel-wrapper {
            position: relative
        }

        /* image slider  */


        .swiper {
            width: 100%;
            padding-top: 20px;
            padding-bottom: 20px;

        }

        .swiper-slide {
            width: 300px !important;
            height: 500px !important;

            filter: blur(0px) !important;
            border-radius: 10px !important;
            display: flex;
            flex-direction: column;
            justify-content: end;
            align-items: self-start;
            background-repeat: no-repeat !important;
        }

        .swiper-slide-active {
            filter: blur(0px) !important;
        }

        .swiper-pagination-bullet,
        .swiper-pagination-bullet-active {
            background: #fff;
        }

        .swiper-slide span {
            text-transform: uppercase;
            color: #fff;
            background: #1b7402;
            padding: 7px 18px 7px 25px;
            display: inline-block;
            border-radius: 0 20px 20px 0px;
            letter-spacing: 2px;
            font-size: 0.8rem;
            font-family: "Open Sans", sans-serif;
        }

        .swiper-slide--one span {
            background: #62667f;
        }

        .swiper-slide--two span {
            background: #087ac4;
        }

        .swiper-slide--three span {
            background: #b45205;
        }

        .swiper-slide--four span {
            background: #087ac4;
        }

        .swiper-slide h2 {
            color: #000;
            font-family: "Roboto", sans-serif;
            font-size: 1rem;
            line-height: 1;
            margin-bottom: -10px;
            padding: 25px 45px 25px 25px;
            position: absolute;
            bottom: 10px;
            background: #fff;
            width: 100%;
            text-align: center;
        }

        .swiper-3d .swiper-slide-shadow-left,
        .swiper-3d .swiper-slide-shadow-right {
            background-image: none;
        }


        .first-word-blue {
            background-color: var(--template-color);
            color: #fff;
            padding: 0 6px;
            border-radius: 4px;
        }

         .swiper-slide{
            transition:scale 0.5s ease !important;
         }

        .swiper-slide:hover:not(.swiper-slide-active){
            scale:1.1 !important;
        }


        @media (max-width: 1199px) and (min-width: 768px) {
            .product-slider .slick-slide {
                width: 100% !important;
                height: auto !important;
            }

            .product-slider .slick-slide img {
                width: 100% !important;
                height: auto !important;
            }
        }

        /* Mobile view */
        @media (max-width: 767px) {


            /* login/register btn */
            .video {
                border-radius: 5px;
                width: auto;
                height: 250px !important"

            }

            .navbar-nav li a {
                display: inline-block !important;
                width: fit-content !important;
                padding-inline: 20px !important;
                padding-block: 5px !important;
                background: brown !important;
                color: white !important;
                border-radius: 10px;
            }

            .navbar-nav li a:active,
            .navbar-nav li a:focus {
                background: brown !important;
                color: white !important;
                display: inline-block !important;
            }

            .header-right {
                margin-top: -40px !important;
                margin-left: auto;
                margin-right: 0;
            }

            .latest-header {
                height: 55px !important;
            }

            /* banner video */

            .ed-hero.ed-hero--style5 .ed-hero__img {
                display: block !important;
                position: relative !important;
                width: 100vw !important;
                height: 250px !important;
                max-width: 100vw !important;
                margin-top: -100px !important;
            }

            .ed-hero.ed-hero--style5 .ed-hero__img video {
                object-fit: fill !important;
                width: 92vw !important;
                height: 100% !important;
                margin: auto !important;
                display: block !important;
            }

            .ed-hero.ed-hero--style5 .ed-hero__content {
                margin-top: 0px !important;
            }

            /* slick slider */
            .product-slider {
                height: 300px !important;

            }

            .product-slider.slick-slider {
                padding: 0px !important;

            }

            .product-slider .slick-slide {
                /* width: 100% !important; */
                height: auto !important;
                width: 167vw !important;
                border: 0px !important;
            }

            .product-slider .slick-slide h1 {
                width: 100vw !important;
                text-align: center !important;
                margin-left: 30px;
                /* font-size:1.7rem; */
            }

            .product-slider .slick-slide img {
                width: 100% !important;
                height: auto !important;
            }

            .ed-hero__content-title {
                font-size: 20px;
                /* Adjust text size for smaller screens */
            }


            /* swiper slide */

            .swiper {
                margin-top: -60px;
                margin-bottom: -32px;
            }

            .p-4 {
                height: 200px !important;
            }

            .swiper-slide {

                width: 30vw !important;
                height: 30vh !important;
            }

            .swiper-slide-active {
                width: 35vw !important;
                height: 35vh !important;

            }

            .swiper-wrapper {
                scale: 0.8 !important;
            }

            .swiper-slide h2 {
                font-size: 0.8rem !important;
                padding: 5px 5px 5px 5px;
                margin-bottom: 0px !important;
            }

            .swiper-wrapper {
                padding-block: 36px !important;
            }

            .home-stats-wrapper {
                padding: 10px !important;
            }

        }
    </style>
    <section class="ed-hero ed-hero--style5">
        <!-- Hero Shapes  -->
        <div class="ed-hero-shapes">
            <img class="shape-1" src="assets/images/hero/home-5/circle-pattern.svg" alt="circle-pattern" />
          
        </div>
        <div class="container ed-container-expand">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <!-- Hero Content -->
                    <div class="ed-hero__content">
                        {{-- <div class="product-slider">
                            @foreach (App\Models\Bannerslider::all() as $index => $slider)
                                <h1>
                                    {{ $slider->title }} <br>
                                    <p
                                        style="font-size:28px;margin-top:20px;text-align:center;font-family: 'Gloria Hallelujah', cursive;color: #ff8200;">
                                        {{ $slider->description }}</p>
                                </h1>
                            @endforeach
                        </div> --}}

                        <div class="product-slider">
                            @foreach (App\Models\Bannerslider::all() as $index => $slider)
                                <h1 style="text-align: left;">
                                    @php
                                        $words = explode(' ', $slider->title, 2);
                                    @endphp
                                    <span class="first-word-blue">{{ $words[0] }}</span>
                                    @if(isset($words[1]))
                                        {{ ' ' . $words[1] }}
                                    @endif
                                    <br>
                                    <p
                                        style="font-size:28px;margin-top:20px;text-align:left;font-family: 'Gloria Hallelujah', cursive;color: #ff8200;">
                                        {{ $slider->description }}
                                    </p>
                                </h1>
                            @endforeach
                        </div>

                        <!-- Hero Team  -->
                    </div>
                </div>
            </div>
            <!-- Hero Bottom -->

        </div>
        <!-- Hero Image -->

        <div class="ed-hero__img">
            <video class="video" data-rellax-speed="0" autoplay="" muted="" loop="" playsinline="">
                <source src="{{ asset('assets/images/frontend/video/Journeyvideo.mp4') }}" type="video/mp4">
            </video>
        </div>
    </section>

    {{-- Image slider  --}}
    <div class="p-4" style="padding:0px !important;background:#fff;">
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach (App\Models\Careerimage::all() as $careerImage)
                    <div class="swiper-slide"
                        style="height: 100vh; background-image: url('{{ asset('careerimages/' . $careerImage->image) }}'); background-size: contain; background-position: center; background-repeat: no-repeat;">
                        <div>
                            <h2>{{ $careerImage->title }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Include jQuery, Swiper JS, and other necessary libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper", {
            effect: "coverflow",
            grabCursor: false,
            centeredSlides: true,
            slidesPerView: "auto",
            autoplay: true,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 130,
                modifier: 2,
                slideShadows: false
            },
            spaceBetween: 10,
            loop: true,
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true
            // }, 
            slideToClickedSlide: true
        });
    </script>


    <!-- Slick slider JS (if needed for another part of the page) -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.product-slider').each(function() {
                var slider = $(this);
                slider.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: false,
                    infinite: true,
                    autoplay: true,
                });
            });
        });
    </script>

    {{-- End Image Slider  --}}

    <!--========================== Banner Section End ==========================-->
    @if ($sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include($activeTemplate . 'sections.' . $sec)
        @endforeach
    @endif

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- Slick slider CSS library files -->

<!-- Slick slider JS library file -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<!-- Slick Lightbox CSS library files -->
