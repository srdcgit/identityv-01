@php
    $plan = getContent('plan.content', true);
    $plans = App\Models\Plan::where('status', 1)->latest()->limit(3)->get();
    $counter = getContent('theme_five_counter.content', true);
    $counterElements = getContent('theme_five_counter.element', false, 5);
@endphp

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<!--========================== Career Plan Start ==========================-->
{{-- <section class="plan py-100">
    <div class="container">
        <div class="title">
            <h6>{{__(@$plan->data_values->top_heading)}}</h6>
            <h4>{{__(@$plan->data_values->heading)}}</h4>
            <p>{{__(@$plan->data_values->sub_heading)}}</p>
        </div>
        @include($activeTemplate.'components.plan')
    </div>
</section> --}}
<style>
    .feature__card {
        position: relative;
    }

    @media (max-width: 575px) {
        .feature__card {
            max-width: 300px;
            margin: 0 auto;
        }
    }

    .feature-area {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .single-feature {
        text-align: center;
        box-shadow: 0px 5px 10px 0px rgb(153 153 153);
        height: 350px;
    }

    .single-feature .title {
        background: #000000;
        border: 1px solid #ffffff;
        padding: 10px 0px;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s
    }

    .single-feature .title h4 {
        color: #fff;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: 600;
    }

    .single-feature .desc-wrap {
        padding: 10px 20px;
        border: 1px solid #ffffff;
        background-color: #ebf2ff;
        box-shadow: 0px 5px 10px 0px rgb(153 153 153);
        /*float: left;*/
        width: 100%;
        float: left;
        height: 350px;
    }

    .single-feature .desc-wrap a {
        font-size: 14px;
        font-weight: 500;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        color: #000000;
        text-align: left;
    }

    .single-feature .desc-wrap a:hover {
        color: #002dab;
    }

    .single-feature:hover {}

    .single-feature:hover .title {}

    .single-feature:hover .desc-wrap a {}

    .facebookBg {
        background: #455791 !important;
    }

    .twitterBg {
        background: #1C9CEB !important;
    }

    .icn-box {
        height: 55px;
        width: 55px;
        border: 1px solid #ececec;
        padding-top: 10px;
        border-radius: 50%;
        color: #fff;
        margin-bottom: 4px;
    }

    .bg-light-blue {
        background-color: #1c9ceb !important;
    }

    .bg-blue {
        background-color: #455791 !important;
    }

    .bg-dark-blue {
        background-color: #0b416f !important;
    }

    .icon-box-text {
        font-size: 13px;
        font-weight: 600;
        color: #000000;
        transition: color .3s linear, background .3s linear;
        height: 20px;
    }

    .latest_bg {
        /*background: #0B416F !important;*/

        background: #135203 !important;
    }

    .feature__card .feature__icon {
        position: relative;
        z-index: 10;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fefcfb;
        border-radius: 50%;
        width: fit-content;
        padding: 25px;
        border: 5px solid rgba(10, 166, 215, 0.2);
        margin: 0 auto;
        box-shadow: 2px 1px 5px 0px rgba(2, 69, 122, 0.04), 9px 4px 10px 0px rgba(2, 69, 122, 0.03), 19px 10px 13px 0px rgba(2, 69, 122, 0.02), 35px 17px 15px 0px rgba(2, 69, 122, 0.01), 54px 27px 17px 0px rgba(2, 69, 122, 0);
        transition: all 0.5s ease;
    }

    .feature__card:hover .feature__icon {
        border: 5px solid rgba(10, 166, 215, 0.4);
        transition: all 0.5s ease;
    }

    .feature__card .feature__content {
        position: relative;
        z-index: 5;
        margin-top: -50px;
        padding: 74px 16px 64px;
        background-color: #fefcfb;
        box-shadow: 2px 1px 5px 0px rgba(2, 69, 122, 0.04), 9px 4px 10px 0px rgba(2, 69, 122, 0.03), 19px 10px 13px 0px rgba(2, 69, 122, 0.02), 35px 17px 15px 0px rgba(2, 69, 122, 0.01), 54px 27px 17px 0px rgba(2, 69, 122, 0);
        text-align: center;
        box-shadow: 2px 1px 5px 0px rgba(2, 69, 122, 0.04), 9px 4px 10px 0px rgba(2, 69, 122, 0.03), 19px 10px 13px 0px rgba(2, 69, 122, 0.02), 35px 17px 15px 0px rgba(2, 69, 122, 0.01), 54px 27px 17px 0px rgba(2, 69, 122, 0);
        border-radius: 15px;
    }

    .feature__card .feature__content .feature-bg-shape {
        position: absolute;
        width: 100%;
        height: 64px;
        bottom: 0;
        right: 0;
        border-radius: 0 0 15px 15px;
    }
</style>
<style>
    .new-success-stories {
        background: #f6f6f6;
        padding: 0px 0px;
        text-align: center;
        display: none;
        padding-bottom: 20px;
    }

    .new-success-stories.for-career {
        display: block;
    }

    .new-success-stories h2 {
        font-size: 30px;
        font-weight: 600;
        color: #484848;
    }

    .new-success-stories .ss-box {
        padding: 0px;
        border: 1px solid #f6f6f6;
        margin-top: 14px;
        border-radius: 2px;
        text-align: left;
        font-size: 14px;
        line-height: normal;
        min-height: 210px;
        -webkit-box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.1);
    }

    .new-success-stories .ss-box.for-video {
        position: relative;
        padding-bottom: 55.8%;
        height: 0;
        overflow: hidden;
    }

    .new-success-stories .ss-box.for-video iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .new-success-stories .ss-box.for-text .sign {
        position: relative;
        padding-left: 75px;
        height: 60px;
        margin-top: 16px;
        padding-top: 8px;
        font-size: 13px;
    }

    .new-success-stories .ss-box.for-text .sign .img {
        display: inline-block;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        overflow: hidden;
        position: absolute;
        left: 0px;
        top: 0px;
    }

    .new-success-stories .ss-box.for-text.for-star {
        background: #fff;
    }

    .new-success-stories .ss-box.for-text.for-star .sign {
        position: relative;
        padding-left: 0px;
        font-size: 13px;
    }

    .new-success-stories .ss-box.for-text.for-star .sign a {
        margin-top: 11px;
        font-weight: 600;
        display: inline-block;
    }

    .new-success-stories .ss-box.for-text.for-star .sign .img {
        right: 0;
        left: inherit;
        width: 68px;
        width: 68px;
        border-radius: initial;
    }

    .new-success-stories .ss-box.for-text .sign strong {
        font-size: 14px;
        font-weight: 600;
        display: block;
    }

    .new-success-stories .ss-box.for-text {
        padding: 30px 35px;
        background: url(https://mindlerimages.imgix.net/tinyimg/new-comma.png) #fff no-repeat bottom 30px right 30px;
    }

    .new-success-stories .row {
        /* margin: 0 -7px; */
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .new-success-stories .row .col-md-4 {
        padding: 0 7px;
    }

    @media only screen and (max-width: 778px) {
        .new-success-stories {
            padding: 30px 0px;
        }

        .new-success-stories .ss-box {
            min-height: 205px;
        }

        .new-success-stories .row .col-md-4 {
            width: 50%;
            float: left;
        }
    }

    @media only screen and (max-width: 556px) {
        .new-success-stories .row .col-md-4 {
            width: 100%;
        }

        .new-success-stories .ss-box {
            min-height: 1px;
        }

        .new-success-stories .ss-box.for-text {
            padding: 25px;
            background: url(https://mindlerimages.imgix.net/tinyimg/new-comma.png) #fff no-repeat bottom 25px right 25px;
            background-size: 40px;
        }
</style>
<style>
    .home-stats-main-wrapper {
        position: relative;
        z-index: 6;
        background: linear-gradient(to bottom, #fffef9 0, #fefffa 100%)
    }

    .home-stats-wrapper {
        position: relative;
        text-align: center;
        z-index: 5;
        padding: 4rem 5% 1rem
    }

    .home-donate-wrapper {
        position: relative;
        display: none;
        background-color: #f9f9f9;
        background: #fffef9;
        padding: 7rem 15% 3rem
    }

    .crayon-strip-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%
    }

    .home-stats-list {
        display: flex;
        flex-wrap: wrap;
        transform: scale(.95);
        justify-content: center;
        margin-top: 50px;
    }

    .home-stats-item {
        transition: all .3s;
        -webkit-transition: all .3s;
        display: inline-block;
        background-color: transparent;
        background-color: #fff;
        border: 1px solid #efefef;
        box-shadow: 0 0 .7rem -.1rem rgba(0, 0, 0, .09);
        border-radius: .5rem;
        vertical-align: top;
        width: calc(33.33% - 6rem - 2px);
        padding: 2rem;
        margin: 0 1rem 3.5rem;
        justify-items: center;
        transform: translateY(0)
    }

    .home-stats-item:hover {
        background-color: #fff;
        box-shadow: rgba(0, 0, 0, .03) 0 2px 2px, rgba(0, 0, 0, .03) 0 4px 4px, rgba(0, 0, 0, .03) 0 8px 8px, rgba(0, 0, 0, .03) 0 16px 16px, rgba(0, 0, 0, .03) 0 32px 32px !important;
        transform: translateY(-.3rem)
    }

    .home-stats-item img {
        display: block;
        width: 5rem;
        margin: -5rem auto 0
    }

    .home-stats-item h3 {
        font-size: 1.5rem;
        font-weight: 500;
        color: #4c4c4c;
        margin-top: .8rem;
        margin-bottom: 0
    }

    .home-stats-item span {
        display: block;
        font-size: 1.2rem;
        font-weight: 500;
        color: #4c4c4c;
        margin-top: .3rem;
        margin-bottom: 0;
    }

    .home-approach-icons-wrapper.animated .animate-card,
    .home-stats-main-wrapper.animated .home-stats-item {
        animation-name: showCard;
        animation-duration: 1s;
        animation-delay: 0s;
        animation-fill-mode: forwards
    }

    .bio {
        display: grid;
        grid-auto-flow: row;
        grid-template-rows: min-content;

        width: 125vh;
    }

    .artist-list {
        display: flex;
        min-height: 200px;
        height: 500px !important;
        margin: 0;
        padding: 0;
        overflow: hidden;
        list-style-type: none;
        width: 100%;
        min-width: 100%;
        flex-direction: column;
    }

    @media only screen and (min-width: 1280px) {
        .artist-list {
            flex-direction: row;
        }
    }

    .artist-item {
        flex: 1;
        display: flex;
        align-items: stretch;
        cursor: pointer;
        transition: all 0.35s ease;
        position: relative;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;
        overflow: hidden;
    }

    .artist-item::before {
        content: "";
        position: absolute;
        z-index: 20;
        top: 0;
        left: 0;
        width: 100%;
        height: 500px;
        background: rgba(15, 15, 15, 0.75);
    }

    .artist-item.active {
        flex: 10;
        cursor: default;
        background-size: contain;
    }

    .artist-item.active::before {
        background: linear-gradient(180deg, rgba(15, 15, 15, 0) 0%, #111111 100%);
    }

    h2 {
        font-size: 36px;
        line-height: 36px;
        font-weight: 700;
        text-transform: uppercase;
    }

    @media only screen and (min-width: 768px) {
        h2 {
            font-size: 48px;
            line-height: 48px;
        }
    }

    @media only screen and (min-width: 1280px) {
        h2 {
            font-size: 30px;

        }
    }

    h3 {
        font-weight: bold;
        white-space: nowrap;
        position: absolute;
        z-index: 30;
        opacity: 1;
        top: 50%;
        left: 50%;
        transition: top 0.35s, opacity 0.15s;
        transform-origin: 0 0;
        font-size: 24px;
        text-transform: uppercase;
        transform: translate(-50%, -50%) rotate(0deg);
    }

    @media only screen and (min-width: 1280px) {
        h3 {
            top: 100%;
            left: 50%;
            font-size: 32px;
            transform: translate(-20px, -50%) rotate(-90deg);
        }
    }

    .artist-item.active h3 {
        opacity: 0;
        top: 200%;
    }

    .section-content {
        position: relative;
        z-index: 30;
        opacity: 0;
        align-self: flex-end;
        width: 100%;
        transition: all 0.35s 0.1s ease-out;
    }

    .artist-item.active .section-content {
        opacity: 10;
    }

    .section-content .inner {
        position: absolute;
        display: grid;
        grid-auto-flow: row;
        grid-template-columns: 1fr;
        grid-column-gap: 0px;
        align-items: flex-end;
        left: 0;
        bottom: 0;
        padding: 0px;
        opacity: 0;
        transition: opacity 0.25s ease-out;
        background-color: #c0c0c0;
        width:100%;
    }

    @media only screen and (min-width: 768px) {
        .section-content .inner {
            grid-auto-flow: column;
            grid-template-columns: calc(100% - 340px) 300px;
            grid-column-gap: 10px;
            padding-left: 30px;
        }
    }

    @media only screen and (min-width: 1280px) {
        .section-content .inner {
            grid-auto-flow: column;
            grid-template-columns: 460px 200px;
            grid-column-gap: 10px;
            padding-left: 30px;
        }
    }

    .artist-item.active .section-content .inner {
        opacity: 1;
    }

    .artist-profile-link {
        pointer-events: none;
    }

    .artist-item.active .artist-profile-link {
        pointer-events: all;
    }

    .artist-item {
        position: relative;
        /* To position the pseudo-element */
        overflow: hidden;
        /* Ensure the pseudo-element doesn't overflow */
    }

    .awards {
        float: left;
        width: 45%;
        padding: 10px;
        height: 300px;
        border: 1px solid #c0c0c0;
        /* Should be removed. Only for demonstration */
    }

    .artist-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-size: cover;
        z-index: 1;
        /* Position it below the text */
    }

    .round-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #ab2931;
        /* Example background color */
        display: flex;
        /* For centering the icon inside */
        justify-content: center;
        /* For centering the icon horizontally */
        align-items: center;
        /* For centering the icon vertically */
    }

    .inner {
        position: relative;
        /* Ensure content is above the blurred background */
        z-index: 2;
        /* Position it above the pseudo-element */
    }

    .view_more {
        /* margin-left: 40px;
    margin-bottom: 15px; */
        width: 150px;
    }

    .mySlides {
        display: none;
    }

    .w3-black,
    .w3-hover-black:hover {
        color: #fff !important;
    }

    .w3-display-right {
        position: absolute;
        top: 50%;
        right: 0%;
        transform: translate(0%, -50%);
        -ms-transform: translate(0%, -50%)
    }

    .w3-display-left {
        position: absolute;
        top: 50%;
        left: 0%;
        transform: translate(0%, -50%);
        -ms-transform: translate(-0%, -50%)
    }

    .w3-btn,
    .w3-button {
        border: none;
        display: inline-block;
        padding: 8px 16px;
        vertical-align: middle;
        overflow: hidden;
        text-decoration: none;
        color: inherit;
        background-color: inherit;
        text-align: center;
        cursor: pointer;
        white-space: nowrap
    }

    .w3-btn:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }

    .w3-btn,
    .w3-button {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }
</style>

<div class="home-stats-main-wrapper animate-section animated">
    <div class="home-stats-wrapper">
        <div class="title" style="text-align:center;">
            <h2 class="title-primary">OUR SERVICES</h2>
        </div>
    </div>
    <ul class="artist-list" id="artist-list">
        @foreach (App\Models\Careerplan::all() as $data)
            <li class="artist-item active" style="background-image: url('{{ asset('careerplan/' . $data->image) }}');"
                role="button">
                <h3 style="color: #fff;font-size:18px;!important;"> {{ $data->title }} </h3>
                <div class="section-content">
                    <div class="inner" style="padding-bottom:0px !important">
                        <div class="bio">
                            <h2 style="color: #fff">{{ $data->title }}</h2>
                            <p style="color: #000">{{ $data->description }}</p>

                        </div>
                    </div>

                </div>
            </li>
        @endforeach
    </ul>
</div>
<div class="home-stats-main-wrapper animate-section animated">
    <div class="home-stats-wrapper">
        <h2 class="title-primary">impacts</h2>
        <ul class="home-stats-list">
            <li class="home-stats-item animate-card">
                <div>
                    <img decoding="async" src="https://identity.zpsdemo.in/assets/images/features/awareness.png"
                        class=" lazyloaded"
                        style="--smush-placeholder-width: 76px; --smush-placeholder-aspect-ratio: 76/76;">
                </div><span>CAREER AWARENESS TO 2 MILLION STUDENTS </span>
            </li>
            <li class="home-stats-item animate-card">
                <div>
                    <img decoding="async" src="https://identity.zpsdemo.in/assets/images/features/counseller.png"
                        class=" lazyloaded"
                        style="--smush-placeholder-width: 76px; --smush-placeholder-aspect-ratio: 76/76;">
                </div><span>110 COUNSELLORS TRAINED AND CERTIFIED</span>
            </li>
            <li class="home-stats-item animate-card">
                <div>
                    <img decoding="async" src="https://identity.zpsdemo.in/assets/images/features/cell.png"
                        class=" lazyloaded"
                        style="--smush-placeholder-width: 76px; --smush-placeholder-aspect-ratio: 76/76;">
                </div><span>15 CAREER CELLS SET UP ALL OVER ODISHA</span>
            </li>
            <li class="home-stats-item animate-card">
                <div>
                    <img decoding="async" src="https://identity.zpsdemo.in/assets/images/features/mou.png"
                        class=" lazyloaded"
                        style="--smush-placeholder-width: 76px; --smush-placeholder-aspect-ratio: 76/76;">
                </div><span>15 MOUs SIGNED WITH KNOWLEDGE PARTNERS</span>
            </li>
            <li class="home-stats-item animate-card">
                <div>
                    <img decoding="async" src="https://identity.zpsdemo.in/assets/images/features/uni.png"
                        class=" lazyloaded"
                        style="--smush-placeholder-width: 76px; --smush-placeholder-aspect-ratio: 76/76;">
                </div><span>55+ ASSOCIATES WITH UNIVERSITIES ALL OVER THE COUNTRY</span>
            </li>
        </ul>
    </div>
</div>

<div class="new-success-stories for-stream home-stats-main-wrapper animate-section animated" style="display: block;">
    <div class="container">
        <h2 class="title-primary">AWARDS <em>&</em> RECOGNITIONS </h2>
        <div class="row">
            <div class="col-md-6">
                <div class="ss-box for-video"style="border-radius:30px">
                    <div>
                        <img class="mySlides1" src="https://identity.zpsdemo.in/assets/images/awards/1.jpeg"
                            style="width:100%">
                        <img class="mySlides1" src="https://identity.zpsdemo.in/assets/images/awards/2.jpeg"
                            style="width:100%">
                        <img class="mySlides1" src="https://identity.zpsdemo.in/assets/images/awards/3.jpeg"
                            style="width:100%">
                        <img class="mySlides1" src="https://identity.zpsdemo.in/assets/images/awards/4.jpeg"
                            style="width:100%">
                        <img class="mySlides1" src="https://identity.zpsdemo.in/assets/images/awards/5.jpeg"
                            style="width:100%">
                        <img class="mySlides1" src="https://identity.zpsdemo.in/assets/images/awards/6.jpeg"
                            style="width:100%">
                        <img class="mySlides1" src="https://identity.zpsdemo.in/assets/images/awards/7.jpeg"
                            style="width:100%">
                        <img class="mySlides1" src="https://identity.zpsdemo.in/assets/images/awards/8.jpeg"
                            style="width:100%">
                        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1, 0)">&#10094;</button>
                        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1, 0)">&#10095;</button>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="ss-box for-video" style="border-radius:30px">
                    <div>
                        <img class="mySlides2" src="https://identity.zpsdemo.in/assets/images/recognition/3.jpeg"
                            style="width:100%">
                        <img class="mySlides2" src="https://identity.zpsdemo.in/assets/images/recognition/1.jpeg"
                            style="width:100%">
                        <img class="mySlides2" src="https://identity.zpsdemo.in/assets/images/recognition/2.jpeg"
                            style="width:100%">
                        <img class="mySlides2" src="https://identity.zpsdemo.in/assets/images/recognition/4.jpeg"
                            style="width:100%">
                        <img class="mySlides2" src="https://identity.zpsdemo.in/assets/images/recognition/5.jpeg"
                            style="width:100%">
                        <img class="mySlides2" src="https://identity.zpsdemo.in/assets/images/recognition/6.jpeg"
                            style="width:100%">
                        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1, 1)">&#10094;</button>
                        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1, 1)">&#10095;</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="new-success-stories for-stream home-stats-main-wrapper animate-section animated" style="display: block;">
    <div class="container col-md-12">
        <h2 class="title-primary">Our Testimonials</h2>
        <div class="row">
            <!-- Left column with text -->
            <div class="col-md-6">
                <div
                    style="height: 100%;padding: 30px; background: #ffffff; border-radius: 16px; box-shadow: 0 6px 20px rgba(0,0,0,0.08);">

                    <h4 style="margin-bottom: 20px; font-weight: 600; color: #333;">What Our Clients Say</h4>

                    @foreach (App\Models\Testimonial::latest()->take(10)->get() as $testimonial)
                        <p style="margin-bottom: 15px; font-size: 15px; line-height: 1.6; color: #555;">
                          "{{ $testimonial->text }}"
                        </p>
                    @endforeach

                </div>
            </div>

            <!-- Right column with scrollable video list -->
            <div class="col-md-6">
                <div style="max-height: 400px; overflow-y: auto; padding-right: 10px;border-radius: 16px; box-shadow: 0 6px 20px rgba(0,0,0,0.08);"">
                    <!-- Loop through each testimonial video URL -->
                    @foreach (App\Models\Testimonial::all() as $testimonial)
                        @if ($testimonial->video)
                            <div class="ss-box for-video">
                                <!-- Embedding YouTube video based on URL -->
                                <iframe
                                    src="https://www.youtube.com/embed/{{ \Str::after($testimonial->video, 'v=') }}?rel=0"
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
                                    allowfullscreen></iframe>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let active = 0;
        const artistListItems = document.querySelectorAll('#artist-list li');

        function updateActiveClass() {
            artistListItems.forEach((item, index) => {
                item.classList.toggle('active', index === active);
            });
        }
        artistListItems.forEach((item, i) => {
            item.addEventListener('click', () => {
                active = i;
                updateActiveClass();
            });
        });

        updateActiveClass();
    });
    var slideIndex = [1, 1];
    var slideId = ["mySlides1", "mySlides2"]
    showDivs(1, 0);
    showDivs(1, 1);

    function plusDivs(n, no) {
        showDivs(slideIndex[no] += n, no);
    }

    function showDivs(n, no) {
        var i;
        var x = document.getElementsByClassName(slideId[no]);
        if (n > x.length) {
            slideIndex[no] = 1
        }
        if (n < 1) {
            slideIndex[no] = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex[no] - 1].style.display = "block";
    }
</script>
<!--========================== Plan End ==========================-->
