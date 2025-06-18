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
.back{
  text-align: center;
  height: 100vh;
  float: left;
  background: linear-gradient(to bottom,#fffef9 0,#fefffa 100%);
      
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
</style>



<!--========================== About Start ==========================-->
<section class="ed-about ed-about__page section-gap position-relative">
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
<li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />      One and only Career Counseling organization in Odisha impacting over 2 million students from class 9th to 12th over 30 districts.</li>

<li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />      Technical partner to UNICEF for executing career guidance project all over Odisha</li>

<li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />      Known for setting up NEP 2020 aligned Career Counseling Cells all over Odisha</li>

<li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />      Career Guidance services rendered to Dept. of School &amp; Mass Education, Government of Odisha.</li>

<li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />      We enable students to decide their future career, university/colleges, programs and different courses.</li>

<li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />      We offer mentorship assistance throughout the academic year for the students.</li>

<li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />      Awarded by CSR forum, Odisha and Youth Leadership Award by PPL News for contribution to the youth of Odisha in Career Counselling.</li>
</ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img class="ed-about__shape-4" src="assets/images/abstracts/abstract-element-regular.svg" alt="shape-4" />
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
