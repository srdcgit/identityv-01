@extends($activeTemplate . 'layouts.frontend')
<style>
 .category-card {
        transition: transform 0.3s, border-color 0.3s;
        border: 2px solid transparent;
    }

    .category-card:hover {
        transform: scale(1.05);
        border-color: hsl(var(--base));
    }

    .crown-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 40px;
        height: auto;
        z-index: 2;
    }
.educate-btn {
  display: inline-block;
  vertical-align: middle;
  -webkit-appearance: none;
  border: none;
  outline: none !important;
  background-color: #9f2d26;
  color: #fefcfb;
  font-size: 16px;
  font-weight: 600;
  border-radius: 5px;
  text-transform: capitalize;
  padding: 12px 24px;
  overflow: hidden;
  width: fit-content;
  z-index: 2;
  position: relative;
  -webkit-transition: all ease 0.3s;
  -moz-transition: all ease 0.3s;
  transition: all ease 0.3s;
}
.educate-btn .educate-btn__curve {
  position: absolute;
  right: -15px;
  top: 0;
  width: 33px;
  height: 100%;
  background: #F6F5F5;
  opacity: 0.2;
  z-index: 0;
  -webkit-transform: skewX(-22deg);
  transform: skewX(-22deg);
  transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -webkit-transition: all 0.5s ease;
  -ms-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
}
.educate-btn:hover {
  color: #fefcfb;
}
.educate-btn:hover .educate-btn__curve {
  right: 0;
  width: 100%;
  -webkit-transform: skewX(0deg);
  transform: skewX(0deg);
}
.educate-btn.sec {
  background-color: #fefcfb;
  color: #2a322d;
  border: 2px solid #fefcfb;
}
.educate-btn.sec:hover {
  color: #fefcfb !important;
  background-color: #0aa6d7;
  border: 2px solid #0aa6d7;
}
.educate-btn.sec-2 {
  background-color: transparent;
  color: #2a322d;
  border: 2px solid #0aa6d7;
}
.educate-btn.sec-2:hover {
  color: #fefcfb !important;
  background: #0aa6d7;
}
.educate-btn.sm {
  padding: 8px 16px;
}

.educate_link_btn {
  display: flex;
  align-items: center;
  gap: 8px;
}

.about {
    position: relative;
    overflow: hidden;
}
.shadow {
  box-shadow: 2px 1px 5px 0px rgba(2, 69, 122, 0.04), 9px 4px 10px 0px rgba(2, 69, 122, 0.03), 19px 10px 13px 0px rgba(2, 69, 122, 0.02), 35px 17px 15px 0px rgba(2, 69, 122, 0.01), 54px 27px 17px 0px rgba(2, 69, 122, 0) !important;
}
.br-15 {
  border-radius: 15px;
}
.about .shape1 {
    position: absolute;
    right: 14rem;
}
.mb-16 {
    margin-bottom: 16px;
}

.color-primary {
    color: #0aa6d7 !important;
}
.about .shape2 {
    position: absolute;
    right: 14rem;
    bottom: 10rem;
}

.about .title h6 {
    text-align: start;
}

.about .title h4 {
    text-align: start;
}

.about .title p {
    text-align: start;
    width: 100%;
}

.about .shape {
    position: absolute;
    left: 5rem;
}

.about .thumb {
    position: relative;
}

.about .thumb img {
    width: auto;
    display: flex;
    height: 30rem;
}

.about .thumb .experience {
    background-color: hsl(var(--base));
    width: fit-content;
    padding: 15px 15px;
    text-align: center;
    border: 10px solid hsl(var(--white));
    position: absolute;
    bottom: -1rem;
    left: -3rem;
}

@media only screen and (max-width: 768px) {
    .about .thumb .experience {
        left: 10px;
        bottom: 0;
    }
}

.about .thumb .experience h1 {
    margin-bottom: 0;
    color: hsl(var(--white));
}

.about .thumb .experience p {
    color: hsl(var(--white));
    text-transform: uppercase;
}

.about .info {
    margin-top: 20px;
    margin-bottom: 20px;
}

.about .info p {
    margin-bottom: 10px;
    position: relative;
    padding: 0 20px 0 20px;
    text-align: left;
}

.about .info p::before {
    position: absolute;
    content: "";
    font-weight: 900;
    background-color: hsl(var(--base));
    width: 8px;
    height: 8px;
    border-radius: 50%;
    left: 0;
    top: 50%;!important
    transform: translateY(-50%);
    color: hsl(var(--base));
    font-size: 10px;
}
    .mb-24 {
  margin-bottom: 24px;
}
@media (max-width: 1199px) {
  .mb-24 {
    margin-bottom: 22px;
  }
}
@media (max-width: 991px) {
  .mb-24 {
    margin-bottom: 22px;
  }
}
@media (max-width: 767px) {
  .mb-24 {
    margin-bottom: 20px;
  }
}
.br-20 {
  border-radius: 20px;
}
</style>
@section('content')
<section class="about-us text-center about py-5 bg-light">
    <div class="container">
                <div class="row">
                    <div class="col-lg-6 ">
               
                        <p class="mb-24" style="text-align:justify;">The <strong>Career Library</strong> is the one stop platform where one  can access information about diverse career options, job scopes and other career-related topics. These websites are typically aimed at helping students, confused students, job seekers, and professionals make informed decisions about their career paths.
                            <br>
                            The <strong>Career Library</strong> includes a wide variety of career paths and job roles, providing a brief overview of what each entails. This can help you explore options you may not have considered and give you an understanding of the skills, education, and experience needed for each role.<br>The platform will help individuals explore different career options, identify potential industries, different educational institutions, coaching or training pathways that align with their interests and skills. Whether it’s overcoming self-doubt, navigating career transitions, or handling setbacks, the Career library offers guidance on how to deal with career challenges and stay on track.
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="educate-tilt"
                            data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 2, "speed": 700, "scale": 1 }'>
                            <img src="{{ asset('assets/images/frontend/about/cl3.jpeg') }}" alt="" class="br-20 mb-24">
                        </div>
                    </div>
                </div>
                
                    <div class="col-lg-9">
                        <div class="tab-content">
                            <div id="overview" class="overview tab-pane active">
                                <h4 class="mb-24" style="text-align:left;"> Domains :-</h4>
                            </div>
                            
                        </div>
                    </div>
<div class="row" style="margin-bottom:50px;justify-content: center;">
                @foreach (App\Models\Stream::all() as $stream)
                    <div class="col-lg-3 col-md-6 mt-3">
                        <div class="card category-card position-relative"
                            style="text-align:center; height:250px; overflow:hidden;border-radius:50%">
                                <a href="{{ route('user.category', $stream->id) }}">
                                    <div class="mt">
                                    <img src="{{ asset('stream/' . $stream->image) }}"
                                        style="height: 180px; width:270px">
                                </div>
                                <div >
                                    <h5 class="card-title" style="margin-top:10px;"> {{ $stream->name }} </h5>
                                    
                                </div>
                                </a>
                        </div>
                    </div>
                @endforeach
</div>
                   <div class="container ed-container">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-12"style="margin-left:-60px">
                                    <!-- About Images  -->
                                    <div class="ed-about__images">
                                        <div class="ed-about__main-img">
                                            <img src="{{ asset('assets/images/frontend/about/cl3.png') }}"
                        alt="@lang('image')">
                                        </div>

                                        <div class="ed-about__shapes">
                                            <img class="ed-about__shape-1" src="assets/images/about/about-1/shape-1.svg" alt="shape-1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12"style="margin-left:50px">
                                    <!-- About Content  -->
                                    <div class="ed-about__content" style="margin-top:30px;">
                                        <div class="title mt-3 mt-lg-0">
                    <h4>Career Details for Each Career:</h4>
                </div>
                                        <div class="ed-about__feature" style="width:110%">
<ul class="ed-about__features-list" style="text-align:justify;margin-bottom: 0px !important;">
<li style="list-style:none"><img src="assets/images/icons/ls.png" alt="icon-check-blue" /><strong>   About the Career:</strong> A general overview of what the career is about..</li>

<li style="list-style:none;m"><img src="assets/images/icons/ls.png" alt="icon-check-blue" /><strong>   Eligibility:</strong> Requirements such as educational qualifications, skills, or certifications needed to pursue the career</li>

<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" /><strong>   Career Pathway:</strong> How someone can progress in that career, from entry-level roles to higher positions.</li>

<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" /><strong>   Top Government Colleges:</strong> Government institutions that offer programs relevant to the career.
</li>

<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" /><strong>   Top Private Colleges:</strong> Private institutions known for their strong programs related to that career.
</li>

<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" /><strong>   Different Specializations:</strong> Specific areas within the career that someone can specialize in.
</li>

<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" /><strong>   Job Scope:</strong> The scope of job opportunities and potential growth in the field.
</li>
<li style="list-style:none;"><img src="assets/images/icons/ls.png" alt="icon-check-blue" /><strong>   Salary Structure:</strong>  The typical salary range, including entry-level and advanced positions, along with possible growth in earnings.

</li>
</ul>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <p style="margin-top:20px">By getting detailed information on careers from the Career Library, we can ensure  that you can pursue a career that aligns with your values and passions and long-term job satisfaction and personal fulfillment.</p>
                        <a href="/user/register" class="educate-btn"><span class="educate-btn__curve"></span>Get in
                            Touch</a>
                        
</section>

@endsection
