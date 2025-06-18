@extends($activeTemplate . 'layouts.frontend')
<style>
    .tcs-primary-btn {
    background: #2469BC;
    border-radius: 6.25rem;
    font-size: 1.5em;
    color: #fff !important;
    letter-spacing: .03125rem;
    padding: 12px 30px;
    /* new brand guideline changes done*/
    transition: all 0.4s ease;
    text-decoration: none;
    display: inline-block;
    border: none;
    width: auto;
}

.tcs-primary-btn:hover {
    background: #005B9C;
    transition: all 0.4s ease;
    text-decoration: none;
    color: #fff !important;
}
.tcs-custom-container {
    margin: auto;
}

.secondary-btn {
    background: #ffffff;
    color: #2469BC !important;
    border: 1px solid #2469BC;
}

.secondary-btn:hover {
    color: #005B9C !important;
    background-color: #ebf4ff;
    border-color: #005B9C;
}


/* new brand guideline changes start */

.btn-primary:focus,
.btn-primary.focus {
    box-shadow: 0 0 0 0.2rem #2469bc7a;
}
.career-question {
    display: block;
}

.career-question .col-sm-4 {
    text-align: center;
}

.career-question .col-sm-4 img {
    display: block;
    width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.col-sm-8 p {
    text-align: justify !important;
}

.col-sm-8 p span {
    font-size: 2.8em;
    position: absolute;
    left: 0px;
    top: -11px;
    color: #2469BC;
}

</style>
@section('content')
<section class="about-us text-center about py-5 bg-light">
    <div class="container">
                <div class="row">
       <div class="col-sm-4">
        <img alt="Take our free career assessment test today!" src="https://www.tcsion.com/per/g01/pub/1016/iDH/instance/1/template/301/final/image/career-img.webp?version=-1279960280" title=""> <a href="javascript:void(0)" onclick="subscribeFreeProducts();" class="tcs-primary-btn ion_compassprofes_btns_Enrol hideclass" title="Take the Free Test">Take the Free Test</a>
       </div>
       <div class="col-sm-8" style="text-align:justify">
        <p>The need for effective career guidance has never been more critical, especially for students transitioning from high school to higher education or vocational training. The objective of this test is to provide a  psychometric test tailored to the unique cultural and educational context of Indian students from classes 9th to 12th. This test aims to provide scientifically validated career guidance, helping students make informed career choices that align with their strengths, interests, and future goals.</p>

        <p>Every educational institution and career counseling organization aims to provide unique value to its students. By developing a customized Career Psychometric test, organizations can differentiate themselves by offering tailored career guidance solutions. These signature tests, designed to meet specific needs and preferences, will enhance the credibility and impact of the career guidance provided..</p>
        <h6>The Career Psychometric test involves test on :-</h6>
        <p> 
1.	Aptitude<br>2.	Personality<br>3.	Interest<br>4.	Values<br>5.	Learning style<br>6.	Goal Orientation<br>
</p>
<h6>Using theories of :-</h6>
<p>
    1. John Holland's theory of Career Choices <br>
2. Big Five Personality theory by McCrae and Costa<br>
3. Schwartz theory of Human Values<br>
4. VARK model of learning styles by Neil Fleming<br>
5. Goal Orientation is proposed by the researcher (by us). Not following any established theory.<br>

</p>
        <p>This test is a significant tool for educators, counselors, and students. By focusing on day to day career barriers faced by children , we can ensure that the guidance provided is accurate, reliable, and impactful. This Career Psychometric test will ultimately help students make informed career choices, leading to more fulfilling and successful career paths</p>
        <p style="color:red"><strong>“Take the following career psychometric inventory to discover a wide range of career paths that align with your strengths, interests, and values!"</strong></p>
       </div>
      </div>
     </div>
     </section>
@endsection
