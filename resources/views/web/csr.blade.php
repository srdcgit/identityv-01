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
            border: 44px solid #9f2d26;
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
                        <h3>Core Focus Areas</h3>
                        <div class="readmore" style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">
                            <p data-aos="fade-left" data-aos-delay="500" data-aos-duration="1500" ><li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Career Counseling: Providing comprehensive career guidance for students from Class 9 to 12.</li>
<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Advanced Learning Programs: Offering structured learning modules for students in Class 1 to 8. 
<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	STEM Education: Delivering both online and offline coaching for students in Class 8 to 10, with a focus on Science, Technology, Engineering, and Mathematics (STEM).</li>
<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Life Skills Training: Empowering rural women and underprivileged youth through tailored life skills development programs.</li>
<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Placement-Oriented Skilling Programs: Specialized training in Artificial Intelligence (AI), Digital Marketing, Event Management, BPO, and Front & Back Office Executive roles, aimed at economically weaker sections, particularly youth and women.</li>
<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Competitive Exam Coaching: Offering targeted coaching for NDA and Agni veer aspirants.</li>
<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Livelihood & Sustainability Initiatives: Providing vocational training and sustainable livelihood opportunities for rural women and unemployed youth.</li>
<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Institutional Collaborations: Partnering with universities and organizations for training, placement assistance, and scholarship programs.</li>
</p>
                        </div>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12" style="margin: auto;display: block;">
                    <div class="inner-column wow fadeInLeft" data-wow-delay='1000ms'>
                        <!-- <div class="author-desc">
                            <h2>Wellnex</h2>

                          </div> -->
                        <figure class="image-1"><a href="#" class="lightbox-image"
                                data-fancybox="images"><img title="Career Map"
                                    src="assets/images/frontend/banner/CSR.jpeg"
                                    alt=""></a></figure>

                    </div>
                </div>

            </div>

        </div>
        <div class="container">
<div class="row">
                    <div class="col-lg-6 ">
               <h3>Key Achievements</h3>
                        <p class="mb-24" style="text-align:justify;">
                            <li style="list-style:none; font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Career Guidance Initiatives: Successfully conducted career counseling sessions for Class 9 to 12 students.
                            <li style="list-style:none; font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Awareness & Orientation Programs: Organized large-scale career awareness and orientation workshops all over Odisha. 
                            <li style="list-style:none; font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Career Engagement Activities: Hosted career quizzes and published Vruti Pustika, a career guidance book which is accessible to all students of Secondary and higher Secondary Schools
                            <li style="list-style:none; font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Career Fair: Successfully organized Career Fairs to guide students for choosing the befitting Career Options. 
                            <li style="list-style:none; font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	Virtual Career Webinars : Reached out to more than 15 lakhs students through  Career Webinars by consistent and continuous efforts 
                            <li style="list-style:none; font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" />	UNICEF Collaboration: Partnered with UNICEF for a career development initiative across 30 districts, covering 399 secondary schools, 76 higher secondary colleges, and reaching over 75,000 students.

                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="educate-tilt"
                            data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 2, "speed": 700, "scale": 1 }'>
                            <img src="{{ asset('assets/images/frontend/about/csr2.jpg') }}" alt="" class="br-20 mb-24">
                        </div>
                    </div>
                </div>
                </div>
                <div class="container">
                    <div class="row">
                    <div class="col-lg-6" style="padding-top:25px">
               <div style="height:80px;border-bottom:1px dotted #c0c0c0;"><h4 style="padding:10px">Impact Created</h4></div>
                        <p class="mb-24" style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">
                            <li style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">	Scholarship Facilitation: Assisted students in securing scholarship opportunities.</li>
                            <li style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">	Confidence Building: Enhanced self-esteem and career confidence, especially among female students.</li>
                            <li style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">	Career Clarity: Provided clear guidance on diverse career pathways.</li>
                            <li style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">	Higher Education Awareness: Increased awareness about higher education opportunities.</li>
                            <li style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">	Annual Mentorship Program: Implemented long-term mentorship support for students.</li>


                        </p>
                    </div>
                    <div class="col-lg-6 " style="padding-top:25px">
              <div style="height:80px;border-bottom:1px dotted #c0c0c0;"><h4 style="padding:10px">Our Collaborations and Industry Partnerships</h4></div>
                        <p class="mb-24" style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">
                            <li style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">	UNICEF, Odisha</li>
                            <li style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">	Odisha School Education Program Authority (OSEPA)</li>
                            <li style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">	Directorate of Higher Secondary Education (DHSE)</li>
                            <li style="text-align:justify;font-family: Open Sans;font-size: 14px;font-weight: 400;word-break: break-word;color: #000;line-height: 30px;">	TRL Krosaki Refractories Limited, Belpahar</li>



                        </p>
                    </div>
                </div>
                </div>
        </div>
    </section>
    <script>
        AOS.init();
    </script>
@endsection