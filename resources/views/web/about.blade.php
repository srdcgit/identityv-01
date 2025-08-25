@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <style>
        .about-sec-pg {
            padding: 40px 0
        }

        .vision-mission {
            background-color: #f4f4f4;
        }

        .vision-mission .main-title {
            text-align: center;
        }

        .vision-mission .vm-box {
            margin: 15px 0;
        }

        .vision-mission .vm-box .img {
            border-radius: 5px;
            overflow: hidden;
        }

        .vision-mission .vm-box .img img {
            width: 100%;
        }

        .vision-mission .vm-box .txt {
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, .09);
            margin-top: 5px;
            text-align: center;
        }

        .vision-mission .vm-box .txt i img {
            width: 60px;
        }

        .vision-mission .vm-box .txt h3 {
            font-size: 24px;
            margin: 15px 0 10px;
            font-family: 'montserratbold';
            color: #000;
        }

        .vision-mission .vm-box .txt p {
            margin: 0;
        }

        .vision-mission .vm-box .txt li {
            padding: 5px 0;
        }

        .founders-sec {}

        .founders-sec .founder-box {
            margin: 15px 0;
        }

        .founders-sec .founder-box .txt {
            padding: 15px;
            box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, .09);
            background-color: #fff;
        }

        .founders-sec .founder-box .txt h3 {
            font-size: 18px;
            font-family: 'montserratbold';
            margin: 0 0 15px;
        }

        .founders-sec .founder-box .txt h3 span {
            display: block;
            font-size: 14px;
            font-family: 'montserratregular';
            color: #ac2626;
            margin-top: 5px;
        }

        .founders-sec .founder-box .img {
            position: relative;
        }

        .founders-sec .founder-box .img img {
            width: 100%;
        }

        .founders-sec .founder-box .img .img-overlay {
            position: absolute;
            bottom: 0px;
            left: 0;
            right: 0;
            background-color: rgba(172, 38, 38, 0.9);
            overflow: hidden;
            width: 100%;
            height: 0;
            transition: .5s ease;
            cursor: pointer;
        }

        .founders-sec .founder-box .img .img-overlay p {
            padding: 25px;
            color: #fff;
            font-size: 13px;
            margin: 0;
            position: absolute;
            top: 50%;
            left: 0%;
            -webkit-transform: translate(0%, -50%);
            -ms-transform: translate(0%, -50%);
            transform: translate(0%, -50%);
        }

        .founders-sec .founder-box .img:hover .img-overlay {
            height: 100%;
        }

        .board-of-directors {
            background-color: #f1f1f1;
        }

        .board-of-directors .bod-img img,
        .key-professionals .bod-img img {
            width: 100%;
        }

        .board-of-directors .main-title {
            margin: 0 0 30px;
        }

        .bod {
            margin: 30px 0;
            padding: 25px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, .09);
        }

        .bod h3 {
            font-size: 24px;
            margin: 0 0 10px;
        }

        .bod h4 {
            font-size: 16px;
            font-family: 'montserratregular';
            color: #ac2626;
        }

        .bod p {
            font-size: 15px;
            color: #808080;
            margin: 0;
            line-height: 24px;
        }

        .key-professionals {
            background-color: #fff;
        }



        /* code by sumit */

        .vm-box {
            background: #fff;
            box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, .09);
            padding-bottom: 20px;
			min-height:300px;
        }

        .vm-box .txt {

            display: -webkit-box;
            -webkit-line-clamp: 6;
            -webkit-box-orient: vertical;
            overflow: hidden !important;
            text-overflow: ellipsis;
            padding-block: 8px !important;
            box-shadow: unset !important;
        }

        .expanded {
            -webkit-line-clamp: unset !important;
        }

        .read-more {
            color: var(--template-color);
            /* color: white;
            border-radius: 10px;
            width: fit-content;
            padding-inline: 20px;
            padding-block: 10px; */
            /* display: block;
            margin: auto; */
            display: none;
            font-weight:bold;
            width:fit-content;
            margin-left:auto;
            box-shadow:none !important;

        }


        .read-more:hover{
            color:var(--template-color);
        }

    </style>
    <div class="about-sec-pg hb-split-section media-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="industry-img split-img">
                        <img src="{{ asset('assets/images/frontend/about/about.jpeg') }}" style="height:500px">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="industry-txt split-txt">
                        <div class="main-title">

                            <h3 style="color:#707070;!important">About <span> Career Map</span></h3>
                        </div>
                        <p>Are you facing challenges in making informed decisions about your future or strategically
                            developing plans to reach your career aspirations? At Career Map, we are here to guide you every
                            step of the way. Established in 2016 as a unit of Identity Group, Career Map has emerged as the
                            leading professional career counselling organization in Bhubaneswar, Odisha. Our dedicated team
                            of highly qualified and experienced professionals specializes in psychometric assessment-based
                            career counselling, behavioural counselling, comprehensive career guidance, and continuous
                            support for holistic career development.</p>
                        <p>At Career Map, we are driven by passion for your career success, a deep understanding of
                            vocational psychology, and genuine concern for your personal happiness and professional growth.
                            We adopt an integrated approach rather than fragmented solutions, ensuring sustainable career
                            development outcomes. Our extensive experience is evident in our collaborations, including
                            establishing career counselling cells in numerous top educational institutions across
                            Bhubaneswar and serving as the technical partner for prestigious organizations such as UNICEF
                            Odisha and Odisha School Education Programme Authority (OSEPA). Currently, we are focused on
                            expanding our impactful services across the entire state, reaching more students and families.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vision-mission media-pad">
        <div class="container">
            <div class="main-title">
                <h4 style="padding-top:20px"><span class="bluetext" style="color: #ab2931">Vision, Mission </span>
                    Philosophy</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="vm-box">

                        <div class="txt">
                            <i><img src="{{ asset('assets/images/frontend/about/v.png') }}"></i>
                            <h3>Our Vision</h3>
                            <p>We envision becoming a globally recognized and trusted leader in career counselling by
                                providing essential information and guidance on diverse career options, educational
                                institutions, admission processes, and associated opportunities, ensuring informed and
                                confident decision-making.
                            </p>

                        </div>

                        <button class="read-more btn">Read more...</button>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="vm-box">

                        <div class="txt">
                            <i><img src="{{ asset('assets/images/frontend/about/p.png') }}"></i>
                            <h3>Philosophy</h3>
                            <p>Students spend over 70 percent of their adult lives engaged in various professions.
                                Recognizing the magnitude of this commitment, we believe career decisions are among the most
                                critical choices students make. Therefore, these decisions should be guided by expert
                                insights, comprehensive assessments, and attentive care to pave the way for lasting
                                professional fulfillment.  </p>

                        </div>

                        <button class="read-more btn">Read more...</button>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="vm-box">

                        <div class="txt">
                            <i><img src="{{ asset('assets/images/frontend/about/m.png') }}"></i>
                            <h3>Our Mission</h3>
                            <p>Our mission is to empower students and individuals in attaining their desired career goals
                                through scientifically-backed, personalized, and comprehensive career counselling services.
                            </p>


                        </div>

                        <button class="read-more btn">Read more...</button>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Founder Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Founder Image -->
                <div class="col-md-6 mb-4" data-aos="fade-left" data-aos-duration="1000" style="text-align:center">
                    <img src="{{ asset('assets/images/frontend/about/founder.png') }}" alt="Founder" class="img-fluid"
                        style="width: 100%; height: auto;">
                        <br>
                        <span class="text-muted">Jasobant Narayan Singhal<br>Founder & Managing Director - Career Map</span>
                </div>
                <!-- Founder Details -->
                <div class="col-md-6 mb-4" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="text-danger mb-3">About the Founder</h2>
                    
                    <p class="mt-3" style="font-size: 0.8rem;">
                        Jasobant Narayan Singhal is an accomplished educator, trainer, and motivational speaker with over 18
                        years of extensive experience in Bhubaneswar. He is the Founder and Managing Director of the
                        Identity Group, a prominent organization comprising Identity Training, Career Map, and Identity
                        Foundation, dedicated to enhancing employability, education, and personal growth.
                    </p>
                    <p style="font-size: 0.8rem;">
                        With a Master’s in English (Linguistics), Singhal has established himself as an expert in corporate
                        training, employability coaching, and career counseling. His extensive portfolio includes serving as
                        a Corporate Trainer with TCS and holding prestigious positions as an empanelled trainer for renowned
                        organizations such as Indian Oil, Powergrid India, Tata Power, and Aditya Birla Group, among others.
                    </p>
                    <p style="font-size: 0.8rem;">
                        Singhal has significantly contributed to educational development by serving as Head of Learning &
                        Development at ODM Educational Group and Chief Employability Mentor at SOA University. His
                        credentials include certifications in NLP from ANLP, India, and Neuro-Semantics Society, USA, as
                        well as a British Council-certified Language Trainer.
                    </p>
                    <p style="font-size: 0.8rem;">
                        Recognized widely for his contributions, Singhal has received accolades such as the “Youth
                        Leadership Award 2024” and the “Leadership Award 2024” for innovative educational and CSR practices.
                        His ongoing commitment to education and career counseling continues to positively impact numerous
                        individuals and organizations across Odisha.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>


    <script>
        const boxes = document.querySelectorAll(".vm-box .txt");

        window.addEventListener("load", function() {

            boxes.forEach(function(box) {

                let total_lines = Math.round(box.scrollHeight /parseFloat(getComputedStyle(box)['line-height']));
				

                if (total_lines > parseInt(getComputedStyle(box)['-webkit-line-clamp'])+4) {
					box.nextElementSibling.style.display="block";
                    box.nextElementSibling.classList.add("d-block");
                } else {
					box.nextElementSibling.style.display="none";
                    box.nextElementSibling.classList.remove("d-block");
                }

            });

        });

		

    </script>



	{{-- <script>
    window.addEventListener("load", function () {
        const boxes = document.querySelectorAll(".vm-box .txt");

        boxes.forEach(function (box) {
            const computedStyle = window.getComputedStyle(box);
            const lineHeight = parseFloat(computedStyle.lineHeight);

            const lineCount = Math.round(box.scrollHeight / lineHeight);

            const readMoreBtn = box.nextElementSibling;

            if (lineCount > 10) {
                readMoreBtn.style.display = "block";
                readMoreBtn.classList.add("d-block");
            } else {
                readMoreBtn.style.display = "none";
                readMoreBtn.classList.remove("d-block");
            }
        });
    });
</script> --}}




    <script>
        AOS.init({
            duration: 1200,
            once: true,
        });



        $(document).ready(function() {

            $(".read-more").each(function(rm) {

                $(this).click(function() {

                    $(this).prev().toggleClass("expanded");

                    $(this).text($(this).prev().hasClass('expanded') ? "Read Less..." : "Read More...");

                });


            });

        });
    </script>
@endsection
