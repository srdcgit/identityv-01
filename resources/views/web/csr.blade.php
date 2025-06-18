@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>

    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {}

        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }

        a,
        a:active,
        a:focus {
            color: #6f6f6f;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        section {
            padding: 30px 0;
            /* min-height: 100vh;*/
        }

        .sec-title {
            position: relative;
            z-index: 1;
            /* margin-bottom:60px; */
        }

        .sec-title .title {
            position: relative;
            display: block;
            font-size: 18px;
            line-height: 24px;
            color: #1495a6;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .sec-title h2 {
            position: relative;
            display: block;
            font-size: 20px;
            line-height: 1.28em;
            color: #9fcd3e;
            font-weight: 600;
            padding-bottom: 18px;
        }

        .sec-title h2:before {
            position: absolute;
            content: '';
            left: 0px;
            bottom: 0px;
            width: 50px;
            height: 3px;
            background-color: #d1d2d6;
        }

        .sec-title .text {
            position: relative;
            font-size: 16px;
            line-height: 26px;
            color: #848484;
            font-weight: 400;
            margin-top: 35px;
        }

        .sec-title.light h2 {
            color: #ffffff;
        }

        .sec-title.text-center h2:before {
            left: 50%;
            margin-left: -25px;
        }

        .list-style-one {
            position: relative;
        }

        .list-style-one li {
            position: relative;
            font-size: 16px;
            line-height: 26px;
            color: #222222;
            font-weight: 400;
            padding-left: 35px;
            margin-bottom: 12px;
        }

        .list-style-one li:before {
            content: "\f058";
            position: absolute;
            left: 0;
            top: 0px;
            display: block;
            font-size: 18px;
            padding: 0px;
            color: #ff2222;
            font-weight: 600;
            -moz-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1.6;
            font-family: "Font Awesome 5 Free";
        }

        .list-style-one li a:hover {
            color: #1495a6;
        }

        .btn-style-one {
            position: relative;
            display: inline-block;
            font-size: 17px;
            line-height: 30px;
            color: #ffffff;
            padding: 10px 30px;
            font-weight: 600;
            overflow: hidden;
            letter-spacing: 0.02em;
            background-color: #1495a6;
        }

        .btn-style-one:hover {
            background-color: #1495a6;
            color: #ffffff;
        }

        .about-section {
            position: relative;
            padding: 60px 0 10px;
        }

        .about-section .sec-title {
            /* margin-bottom: 45px; */
        }

        .about-section .content-column {
            position: relative;
            margin-bottom: 50px;
        }

        .about-section .content-column .inner-column {
            position: relative;
            padding-left: 30px;
        }

        .about-section .list-style-one {
            margin-bottom: 45px;
        }

        .about-section .btn-box {
            position: relative;
        }

        .about-section .btn-box a {
            padding: 15px 50px;
        }

        .about-section .image-column {
            position: relative;
        }

        .about-section .image-column .text-layer {
            position: absolute;
            right: -110px;
            top: 50%;
            font-size: 325px;
            line-height: 1em;
            color: #ffffff;
            margin-top: -175px;
            font-weight: 500;
        }

        .about-section .image-column .inner-column {
            position: relative;
            padding-left: 80px;
            padding-bottom: 0px;
        }

        .about-section .image-column .inner-column .author-desc {
            position: absolute;
            bottom: 0px;
            z-index: 1;
            background: #9fcd3e;
            padding: 15px 15px;
            left: 80px;
            width: calc(100% - 80px);
            border-radius: 50px;
            /* width: 100%; */
        }

        .about-section .image-column .inner-column .author-desc h2 {
            font-size: 21px;
            letter-spacing: 1px;
            text-align: center;
            color: #fff;
            margin: 0;
            font-weight: 900;
        }

        .about-section .image-column .inner-column .author-desc span {
            font-size: 16px;
            letter-spacing: 6px;
            text-align: center;
            color: #fff;
            display: block;
            font-weight: 400;
        }

        .about-section .image-column .inner-column:before {
            content: '';
            position: absolute;
            width: calc(50% + 80px);
            height: calc(100% + 160px);
            top: -80px;
            left: -3px;
            background: transparent;
            z-index: 0;
            border: 44px solid #1495a6;
        }

        .about-section {
            position: relative;
            padding: 90px 0 10px;
        }

        .about-section .image-column .image-1 {
            position: relative;
        }

        .about-section .image-column .image-2 {
            position: absolute;
            left: 0;
            bottom: 0;
        }

        .about-section .image-column .image-2 img,
        .about-section .image-column .image-1 img {
            box-shadow: 0 30px 50px rgba(8, 13, 62, .15);
            border-radius: 46px;
        }

        .about-section .image-column .video-link {
            position: absolute;
            left: 70px;
            top: 170px;
        }

        .about-section .image-column .video-link .link {
            position: relative;
            display: block;
            font-size: 22px;
            color: #191e34;
            font-weight: 400;
            text-align: center;
            height: 100px;
            width: 100px;
            line-height: 100px;
            background-color: #ffffff;
            border-radius: 50%;
            box-shadow: 0 30px 50px rgba(8, 13, 62, .15);
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            transition: all 300ms ease;
        }

        .readless {
            display: none;
        }

        #readLessBtn {
            border-radius: 50%;
        }

        #readMoreBtn {
            border-radius: 50%;
        }


        .focus-area {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 100px 50px;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 100px;
            padding-bottom: 50px;
        }

        .focus-area .card {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 350px;
            max-width: 100%;
            height: 300px;
            background: white;
            border-radius: 20px;
            transition: 0.5s;
            box-shadow: 0 35px 80px rgba(0, 0, 0, 0.15);
        }

        .focus-area .card:hover {
            height: 400px;
        }

        .v .card .img-box {
            position: absolute;
            top: 20px;
            width: 300px;
            height: 220px;
            background: #333;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.5s;
        }

        .focus-area .card:hover .img-box {
            top: -100px;
            scale: 0.75;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
        }

        .focus-area .card .img-box img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
        }

        .focus-area .card .content {
            position: absolute;
            top: 252px;
            width: 100%;
            height: 35px;
            padding: 0 10px;
            text-align: center;
            overflow: hidden;
            transition: 0.5s;
        }

        .focus-area .card:hover .content {
            top: 130px;
            height: 250px;
        }

        .focus-area .card .content h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--clr);
        }

        .focus-area .card .content p {
            color: #333;
        }

        .focus-area .card .content a {
            position: relative;
            top: 15px;
            display: inline-block;
            padding: 12px 25px;
            text-decoration: none;
            background: var(--clr);
            color: white;
            font-weight: 500;
        }

        .focus-area .card .content a:hover {
            opacity: 0.8;
        }

        @media (max-width: 480px) {
            .about-section .content-column {
                position: relative;
                margin-bottom: 50px;
                margin-top: 100px;
            }

            .focus-area .card {

                border-radius: 15px;
            }

            .focus-area .card .img-box {
                width: 185px;
                border-radius: 10px;
            }

            .focus-area .card .content p {
                font-size: 0.8rem;
            }

            .focus-area .card .content a {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 1399px) {
            .focus-area {
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                gap: 100px 100px;
                padding-left: 30px;
                padding-right: 30px;
                padding-top: 100px;
                padding-bottom: 50px;
            }
        }
    </style>

    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2 wow fadeInRight" data-wow-delay='1000ms'>
                    <div class="inner-column">
                        <h3>Identity Foundation Trust</h3>
                        <h5>(An Initiative of Identity Group)</h5>
                        <div class="readmore">
                            <p data-aos="fade-left" data-aos-delay="500" data-aos-duration="1500">Shaping the future of our
                                nation by empowering students to make informed career choices, overcome challenges, and
                                embrace opportunities, in alignment with NEP 2020.</p>
                        </div>
                        <h4><u>Our Mission</u></h4>
                        <p data-aos="fade-left" data-aos-delay="300" data-aos-duration="1200">To equip students with the
                            tools, knowledge, and confidence to navigate their career paths while fostering social and
                            economic empowerment through innovative programs.</p>

                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft" data-wow-delay='1000ms'>
                        <!-- <div class="author-desc">
                            <h2>Wellnex</h2>

                          </div> -->
                        <figure class="image-1"><a href="#" class="lightbox-image"
                                data-fancybox="images"><img title="Career Map"
                                    src="https://identity.zpsdemo.in/assets/images/frontend/banner/CSR.jpeg"
                                    alt=""></a></figure>

                    </div>
                </div>

            </div>

        </div>

        <div class="container focus-area">
            <div class="col-md-3 card" style="--clr: #009688">
                <div class="img-box">
                    <img src="https://www.collidu.com/media/catalog/product/img/4/a/4a6f65bdf3cf5d8e8cabc415c146c09fa9487c1d44f09e163697b63c59bb6b32/career-guidance-slide1.png"
                        alt="">
                    <!-- <img src="https://www.collidu.com/media/catalog/product/img/4/a/4a6f65bdf3cf5d8e8cabc415c146c09fa9487c1d44f09e163697b63c59bb6b32/career-guidance-slide1.png"> -->
                </div>
                <div class="content">
                    <h5 style="color:  #009688;">Career and Education Guidance</h5>
                    <p>Provide diverse options for college, university, and career selection. </p>
                    <p>Highlight emerging opportunities in higher education and modern AI ecosystems.</p>
                    <p>Enhance decision-making for career planning and job selection.</p>
                    <!-- <a href="">Read More</a> -->
                </div>
            </div>
            <div class="col-md-3 card" style="--clr: #009688">
                <div class="img-box">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGb_hCZ7pGogWDVNsxjiPzVlI3jVwQeFad_Q&s alt="">
                    <!-- <img src="https://www.collidu.com/media/catalog/product/img/4/a/4a6f65bdf3cf5d8e8cabc415c146c09fa9487c1d44f09e163697b63c59bb6b32/career-guidance-slide1.png"> -->
                </div>
                <div class="content">
                    <h5 style="color:  #009688;">Empowerment and Support</h5>
                    <p>Reduce societal pressures and improve educational quality.</p>
                    <p>Ensure financial limitations do not hinder career development by guiding students toward affordable
                        options and financial assistance.</p>
                    <!-- <a href="">Read More</a> -->
                </div>
            </div>
            <div class="col-md-3 card" style="--clr: #FF3E7F">
                <div class="img-box">
                    <img src="https://www.augmentir.com/wp-content/uploads/2023/10/skills-development-and-training-in-manufacturing.webp"
                        alt="">
                </div>
                <div class="content">
                    <h5 style="color:  #009688;">Skill Development and Tracking</h5>
                    <p>Identify students’ aspirations and aptitudes for tailored skill-building programs.</p>
                    <p>Deliver ongoing motivation and counseling to build confidence and resilience.</p>
                    <!-- <a href="">Read More</a> -->
                </div>
            </div>
            <div class="col-md-3 card" style="--clr: #03A9F4">
                <div class="img-box">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGHVpfQY4dovhR_ogIScgYSKrEue9QraNf9w&s"
                        alt="">
                </div>
                <div class="content">
                    <h5 style="color:  #009688;">CSR Collaboration</h5>
                    <p>Extend our expertise in human capital development to support corporate CSR initiatives, creating
                        people-oriented, sustainable communities.
                    </p>
                    <!-- <a href="">Read More</a> -->
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <h3 class="text-center"><u>Our Philosophy</u></h3>
                <div class="details" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1500">
                    <p>Through our flagship Career Counseling for School Students, we aim to inspire a generation that is
                        better prepared to face the future, fostering progress for individuals and society alike.</p>
                    <p>We call upon corporates to join us in this transformative mission to empower young minds and build a
                        stronger, brighter future.</p>
                </div>
            </div>
        </div>
    </section>
    <script>
        AOS.init();
    </script>
@endsection