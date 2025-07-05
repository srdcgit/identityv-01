@php
    $about = getContent('theme_five_about.content', true);
    $aboutElements = getContent('theme_five_about.element', false, 7);
@endphp

<style>
    .slick-slide {
        width: 150px !important;
        border: 1px solid #c0c0c0;
        border-radius: 5px;
        margin: 2px;
        /* animation: marquee 30s linear infinite; */
    }

    @media (max-width: 768px) {
        .brand img {
            height: 40px;
        }
    }

    .back {
        text-align: center;
        height: 100vh;
        float: left;
        background: linear-gradient(to bottom, #fffef9 0, #fefffa 100%);

    }

    @media (max-width: 480px) {
        .brand img {
            height: 30px;
        }
    }

    .brand-slider .slick-track {
        display: flex;
        align-items: center;
    }

    .brand-slider .slick-slide {
        width: auto;
        /* Let the width adjust based on content */
        display: inline-block;
        float: none;
        /* Remove float to avoid alignment issues */
        margin-right: 10px;
        /* Adjust spacing between slides if needed */
    }

    .mt_20 {
        margin-top: 20px !important;
    }


    /* code by sumit */

    .about-ul {
        list-style-type: none;
        width: fit-content;
        position: relative;
        padding-left: 15px !important;
    }

    .about-ul::before {
        content: "";
        width: 3px;
        height: 90%;
        position: absolute;
        left: 0;
        top: 10px;
        background: var(--template-color);
    }

    .about-ul li:first-child {
        border-bottom: 2px solid #f3eeee;
        padding-block: 10px;
    }

    .about-ul li:last-child {

        padding-block: 10px;
    }

    .more-about-btn svg {
        width: 10px;
        height: 10px;
        margin-left: 5px;

    }

    .more-about-btn {
        width: 150px;
        height: 40px;
        border-radius: 10px;
        background: var(--template-color);
        color: white;
        font-size: 14px;
    }


    @media only screen and (max-width:991px){
        .ed-about .title-primary{
            text-align:center;
        }

        .ed-about h1{
            width:95vw !important;
            margin:auto;
            line-height:37px !important;
        }

        .ed-about p{
            width:95vw !important;
            margin:auto;
        }

        .ed-about img{
            height:350px !important;
        }

        .about-ul{
            width:95vw !important;
            margin:20px auto;
        }

         .ed-about a{
           display: block;
           text-align: center;
           margin-top:20px;
         }

          .ed-about{
            padding-block:35px !important;
          }

    }


</style>



<!--========================== About Start ==========================-->
{{-- <section class="ed-about ed-about__page section-gap position-relative">
    <div class="container ed-container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12"style="margin-left:-50px">
                <!-- About Images  -->
                <div class="ed-about__images">
                    <div class="ed-about__main-img">
                        <img src="{{ getImage(getFilePath('frontend') . '/theme_five_about' . '/' . @$about->data_values->about_image) }}"
                            alt="@lang('image')">
                    </div>

                    <div class="ed-about__shapes">
                        <img class="ed-about__shape-1" src="assets/images/about/about-1/shape-1.svg" alt="shape-1" />

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <!-- About Content  -->
                <div class="ed-about__content" style="margin-top:30px;">
                    <div class="title mt-3 mt-lg-0">
                        <h4>{{ __(@$about->data_values->heading) }}</h4>
                    </div>
                    <div class="ed-about__feature" style="width:110%">
                        <ul class="ed-about__features-list">
                            <li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />
                                One and only Career Counseling organization in Odisha impacting over 2 million students
                                from class 9th to 12th over 30 districts.</li>

                            <li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />
                                Technical partner to UNICEF for executing career guidance project all over Odisha</li>

                            <li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />
                                Known for setting up NEP 2020 aligned Career Counseling Cells all over Odisha</li>

                            <li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />
                                Career Guidance services rendered to Dept. of School &amp; Mass Education, Government of
                                Odisha.</li>

                            <li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />
                                We enable students to decide their future career, university/colleges, programs and
                                different courses.</li>

                            <li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />
                                We offer mentorship assistance throughout the academic year for the students.</li>

                            <li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />
                                Awarded by CSR forum, Odisha and Youth Leadership Award by PPL News for contribution to
                                the youth of Odisha in Career Counselling.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img class="ed-about__shape-4" src="assets/images/abstracts/abstract-element-regular.svg" alt="shape-4" />
</section> --}}


<section class="ed-about ed-about__page section-gap position-relative"
    style="height:auto; padding-block:100px; background:#f8f6f6;">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <img class="img" src="{{ getImage(getFilePath('frontend') . '/theme_five_about' . '/' . @$about->data_values->about_image) }}" alt="about-image"
                style="width:90%; height:650px; margin:auto;object-fit:fill; display:block;" />
        </div>
        <div class="col-lg-6 pt-3">
            <h6 class="title-primary">{{ __(@$about->data_values->top_heading) }}</h6>

            <h1 style="text-transform:unset; width:30vw; line-height:60px;">{{ __(@$about->data_values->heading) }}</h1>

            <p style="width:30vw; line-height:24px; font-size:14px;" class="mt-4">{{ __(@$about->data_values->short_description) }}</p>


            @php
                $aboutElements = \App\Models\Frontend::where('data_keys', 'theme_five_about.element')->limit(4)->get();
            @endphp
            <ul class="about-ul">
                @for ($i = 0; $i < count($aboutElements); $i += 2)
                    <li>
                        <h4 style="width: 65%;font-size:17px;">{{ @$aboutElements[$i]->data_values->content }}</h4>
                        @if (isset($aboutElements[$i + 1]))
                            <span style="font-size:14px;width: 65%"
                                class="text-dark">{{ @$aboutElements[$i + 1]->data_values->content }}</span>
                        @endif
                    </li>
                @endfor
            </ul>

            <a href="{{ route('about') }}">
                <button class="more-about-btn">More About 
                <svg fill="#ffffff" height="200px" width="200px" version="1.1"
                    id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 512 512" xml:space="preserve" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <g>
                                <path
                                    d="M511.894,19.228c-0.031-0.316-0.09-0.622-0.135-0.933c-0.054-0.377-0.098-0.755-0.172-1.13 c-0.071-0.358-0.169-0.705-0.258-1.056c-0.081-0.323-0.152-0.648-0.249-0.968c-0.104-0.345-0.234-0.678-0.355-1.015 c-0.115-0.319-0.22-0.641-0.35-0.956c-0.13-0.315-0.284-0.616-0.428-0.923c-0.153-0.324-0.297-0.651-0.467-0.969 c-0.158-0.294-0.337-0.574-0.508-0.86c-0.186-0.311-0.362-0.626-0.565-0.93c-0.211-0.316-0.447-0.613-0.674-0.917 c-0.19-0.253-0.366-0.513-0.568-0.76c-0.443-0.539-0.909-1.058-1.402-1.551c-0.004-0.004-0.007-0.008-0.011-0.012 c-0.004-0.004-0.008-0.006-0.011-0.01c-0.494-0.493-1.012-0.96-1.552-1.403c-0.247-0.203-0.507-0.379-0.761-0.569 c-0.303-0.227-0.6-0.462-0.916-0.673c-0.304-0.203-0.619-0.379-0.931-0.565c-0.286-0.171-0.565-0.35-0.859-0.508 c-0.318-0.17-0.644-0.314-0.969-0.467c-0.307-0.145-0.609-0.298-0.923-0.429c-0.315-0.13-0.637-0.236-0.957-0.35 c-0.337-0.121-0.669-0.25-1.013-0.354c-0.32-0.097-0.646-0.168-0.969-0.249c-0.351-0.089-0.698-0.187-1.055-0.258 c-0.375-0.074-0.753-0.119-1.13-0.173c-0.311-0.044-0.617-0.104-0.933-0.135C492.072,0.037,491.37,0,490.667,0H213.333 C201.551,0,192,9.551,192,21.333c0,11.782,9.551,21.333,21.333,21.333h225.83L6.248,475.582c-8.331,8.331-8.331,21.839,0,30.17 c8.331,8.331,21.839,8.331,30.17,0L469.333,72.837v225.83c0,11.782,9.551,21.333,21.333,21.333S512,310.449,512,298.667V21.335 C512,20.631,511.963,19.928,511.894,19.228z">
                                </path>
                            </g>
                        </g>
                    </g>
                </svg>
            </button>
            </a>
            

        </div>
    </div>
</section>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        $('.brand-slider').slick({
            slidesToShow: 5, // Number of logos to show at once
            slidesToScroll: 1, // Scroll one logo at a time
            infinite: true, // Enable infinite scrolling
            arrows: false, // Hide arrows
            autoplay: true, // Enable autoplay
            autoplaySpeed: 0, // No delay between slides
            speed: 3000, // Control the speed of the sliding motion
            cssEase: 'linear', // Smooth, continuous scrolling
            pauseOnHover: false, // Do not pause on hover
            variableWidth: true, // Allow variable width for slides to avoid gaps
        });
    });
</script>
