@extends($activeTemplate . 'layouts.auth')
@section('content')


    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        html,
        body {
            overflow-x: hidden;
        }

        .google-btn {
            width: 100% !important;
            height: 45px !important;
            border-radius: 30px !important;
            color: black !important;
            background: white !important;
            border: 2px solid #ece9e9 !important;
            margin-top: 35px;
            font-weight: 600;
            cursor: pointer;

        }

        .facebook-btn {
            margin-top: 10px !important;
            cursor: pointer;
        }

        .google-btn svg {
            width: 15px;
            height: 15px;
            margin-right: 5px;
        }

        .facebook-btn svg {
            width: 15px;
            height: 15px;
            margin-right: 5px;
        }

        .sign-email-text {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding-inline: 10px;
        }

        #login-form .input-box {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            gap: 5px;

        }

        #login-form .input-box input {
            width: 100%;
            height: 45px;
            border-radius: 30px;
            color: black;
            background: white;
            border: 2px solid #ece9e9;
            padding-left: 20px;
        }

        #login-form .input-box label {
            font-weight: bolder;
        }

        .form-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-info label {
            font-weight: bolder;
        }

        .form-info span a {
            color: var(--template-color);
            font-weight: 600;
        }

        .login-btn {
            width: 100%;
            height: 45px;
            background: var(--template-color);
            color: white;
            border-radius: 30px;
            margin-top: 30px;
        }

        select {
            border-radius: 30px !important;
        }

        /* right-part */

        .swiper {
            width: 100%;
            height: 690px;
            position: relative;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            /* background: #444; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 70% !important;
            /* height: 100%; */
            object-fit: cover;
            margin: auto !important;
        }

        .register-right-part {
            position: relative;
        }

        .career-slogan {

            color: transparent;
            background: linear-gradient(45deg, rgb(238, 238, 238), orange, rgb(157, 223, 243), rgb(253, 136, 136));
            -webkit-background-clip: text;
            font-weight: bolder;
            width: 36vw;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            margin: 30px auto 0px;
            font-size: 30px;
            top: 30px;

        }


        .swiper-slogan {
            position: absolute;
            bottom: 50px !important;
            left: 50%;
            transform: translateX(-50%);
            color: transparent;
            background: linear-gradient(45deg, rgb(153, 232, 238), rgb(250, 199, 89));
            -webkit-background-clip: text;
            font-weight: bolder;
            width: 26vw;
            display: inline-block;
            text-align: center;
            margin: 30px auto;



        }

        .sticky {
            position: fixed !important;
            top: 0px !important;
            right:0px !important;
            height:100% !important;
            overflow:hidden !important;
        }

        .adjust{
            position:relative !important;
            
            right:-6px !important;
        }

        .input-box {
            position: relative;
        }

        .input-box input[type="password"],
        .input-box input[type="text"] {
            padding-right: 40px;
            /* Space for the eye icon */
        }

        .toggle-password {
            position: absolute;
            top: 70%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #555;
            /* make it visible */
            height: 20px;
            width: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

          .toggle-password {
            color: #555;
            /* or use black: #000 */
        }

        .toggle-password:hover {
            color: var(--template-color);
            /* or any brand color you use */
        }

       

        @media only screen and (max-width:991px) {
            .register-right-part-container {
                display: none;
            }

            .register-left-part {
                margin-top: 45px;
            }

            .sign-email-text {
                font-size: 11px;
            }

            .sign-email-text {
                top: -9px;
            }

            #login-form .input-box {
                margin-bottom: 20px;
            }

            .remember-me-div input[type="checkbox"]{
                margin-bottom:24px;
            }

            .register-left-part{
                padding-inline:5vw;
            }

        }

      

        
    </style>

    @php
        $policyPages = getContent('policy_pages.element', false, null, true);
        $credentials = $general->socialite_credentials;
    @endphp

    <section class="register-section" style="height:100%;">

        <div class="row align-items-stretch" style="height:100%;">
            <div class="col-lg-6" style="padding-inline:7vw;">

                <div class="register-left-part">



                    <div class="logo mt-2">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/general/logo.png') }}" alt=""
                                style="width:200px; height:70px;object-fit:contain; margin-left:-17px;">
                        </a>

                    </div>
                    <h3 class="mt-3 fw-bolder mb-0">@lang('Sign Up')</h3>
                    <span class="d-block mt-2">See your growth and consulting support</span>


                    <form action="{{ route('user.register') }}" method="POST" id="login-form">
                        @csrf

                        @if ($credentials->google->status == 1 || $credentials->facebook->status == 1 || $credentials->linkedin->status == 1)
                            @if ($credentials->google->status == 1)
                                <button class="google-btn">
                                    <a href="{{ route('user.social.login', 'google') }}">
                                        <svg viewBox="-0.5 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>Google-color</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs> </defs>
                                                <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <g id="Color-" transform="translate(-401.000000, -860.000000)">
                                                        <g id="Google" transform="translate(401.000000, 860.000000)">
                                                            <path
                                                                d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24"
                                                                id="Fill-1" fill="#FBBC05"> </path>
                                                            <path
                                                                d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333"
                                                                id="Fill-2" fill="#EB4335"> </path>
                                                            <path
                                                                d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667"
                                                                id="Fill-3" fill="#34A853"> </path>
                                                            <path
                                                                d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24"
                                                                id="Fill-4" fill="#4285F4"> </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        Sign in with Google
                                    </a>
                                </button>
                            @endif

                            @if ($credentials->facebook->status == 1)
                                <button class="google-btn facebook-btn">
                                    <a href="{{ route('user.social.login', 'facebook') }}">
                                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill="#1877F2"
                                                    d="M15 8a7 7 0 00-7-7 7 7 0 00-1.094 13.915v-4.892H5.13V8h1.777V6.458c0-1.754 1.045-2.724 2.644-2.724.766 0 1.567.137 1.567.137v1.723h-.883c-.87 0-1.14.54-1.14 1.093V8h1.941l-.31 2.023H9.094v4.892A7.001 7.001 0 0015 8z">
                                                </path>
                                                <path fill="#ffffff"
                                                    d="M10.725 10.023L11.035 8H9.094V6.687c0-.553.27-1.093 1.14-1.093h.883V3.87s-.801-.137-1.567-.137c-1.6 0-2.644.97-2.644 2.724V8H5.13v2.023h1.777v4.892a7.037 7.037 0 002.188 0v-4.892h1.63z">
                                                </path>
                                            </g>
                                        </svg>
                                        Sign in with Facebook
                                    </a>
                                </button>
                            @endif
                        @endif


                        <div style="width:100%;border:0.5px solid #ece9e9; margin-block:40px; position:relative;">
                            <span class="sign-email-text">or Sign up with Email</span>
                        </div>





                        <div class="row my-lg-4">
                            <div class="col-lg-6">
                                <div class="input-box">
                                    <label for="username">@lang('Username')</label>
                                    <input type="text" id="username" name="username" value="{{ old('username') }}"
                                        placeholder="@lang('Username')" required autocomplete="username">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="input-box">
                                    <label for="email">@lang('E-Mail Address')</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        placeholder="@lang('Email')" required>
                                </div>
                            </div>
                        </div>

                        <div class="row my-lg-4">
                            <div class="col-lg-6">
                                <div class="input-box">
                                    <label for="country">@lang('Country')</label>
                                    <select name="country_id" id="country" class="form-select">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value=" {{ $country->id }} ">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="input-box">
                                    <label for="state">@lang('State')</label>
                                    <select name="state_id" id="getState" class="form-select">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row my-lg-4">
                            <div class="col-lg-6">
                                <div class="input-box">
                                    <label for="district">@lang('District')</label>
                                    <select name="dist_id" id="getDistrict" class="form-select">
                                        <option value="">Select District</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="input-box">
                                    <label for="mobile">@lang('Mobile')</label>
                                    <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}"
                                        placeholder="Enter Mobile Number" required>
                                </div>
                            </div>
                        </div>


                        <div class="row my-lg-4">
                            <div class="col-lg-6">
                                <div class="input-box position-relative">
                                    <label for="password">@lang('Password')</label>
                                    <input type="password" id="password" name="password"
                                        placeholder="@lang('Password')" required>
                                    <span class="fa-solid fa-eye-slash toggle-password" data-target="password"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="input-box position-relative">
                                    <label for="cpassword">@lang('Confirm Password')</label>
                                    <input type="password" id="cpassword" name="password_confirmation"
                                        placeholder="@lang('Confirm Password')" required>
                                    <span class="fa-solid fa-eye-slash toggle-password" data-target="cpassword"></span>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="input-box mt-3">
                            <label for="password">Password*</label>
                            <input type="password" id="password" name="" placeholder="Min. 8 character" required
                                autocomplete="current-password">
                        </div> --}}
                        @if ($general->agree)
                            <div class="form-info mt-3">
                                <div class="remember-me-div d-flex justify-content-center align-items-center gap-2">
                                    <input type="checkbox" @checked(old('agree')) name="agree" required
                                        id="agree" style="accent-color:var(--template-color)">
                                    <label for="agree">@lang('I agree with')
                                        @foreach ($policyPages as $policy)
                                            <a
                                                href="{{ route('policy.pages', [slug($policy->data_values->title), $policy->id]) }}">
                                                <span
                                                    style="color:var(--template-color);">{{ __($policy->data_values->title) }}</span>
                                            </a>
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </label>
                                </div>
                                {{-- <span><a href="#">Forgot Password?</a></span> --}}
                            </div>
                        @endif

                        <button type="submit" class="login-btn" id="recaptcha">@lang('Sign Up')</button>

                        <p class="mt-3 mb-5"><span class="text-black fw-bold">@lang('Already Have An Account')?</span> <a
                                href="{{ route('user.login') }}"
                                style="color:var(--template-color); font-weight:600;">@lang('Login Now')</a>
                        </p>

                    </form>

                </div>

            </div>


            <div class="col-lg-6 register-right-part-container" style="background:rgb(121, 69, 69);">
                {{-- <div class="col-lg-6" style="background:var(--template-color);"> --}}
                <div class="register-right-part" >

                    <h2 class="position-absolute career-slogan mb-2">"Your Career, Your Journey, Our Expertise."</h2>

                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="swiper-image mt-2">
                                    <img src="{{ asset('assets/images/general/img11.png') }}" alt=""
                                        style="width:100%; height:50%;object-fit:cover;">

                                    <span class="position-absolute swiper-slogan mb-2">Consistent Quality and experience
                                        across all verticals</span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-image mt-2">
                                    <img src="{{ asset('assets/images/general/img21.png') }}" alt=""
                                        style="width:100%; height:50%;object-fit:cover;">
                                    <span class="position-absolute swiper-slogan mb-2">Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Placeat, deserunt.</span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-image mt-2">
                                    <img src="{{ asset('assets/images/general/img31.png') }}" alt=""
                                        style="width:100%; height:50%;object-fit:cover;">

                                    <span class="position-absolute swiper-slogan mb-2">Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Placeat, deserunt.</span>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>



                </div>
            </div>

        </div>






    </section>



    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script>

        const register_right_part=document.querySelector(".register-right-part-container");
        const right_part=document.querySelector(".register-right-part");

        window.addEventListener("scroll",function(){

            if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
                register_right_part.classList.add("sticky");
                right_part.classList.add("adjust");
            }else{
                 register_right_part.classList.remove("sticky");
                 right_part.classList.remove("adjust");
            }

        });



    </script>

    <script>
        document.querySelectorAll('.toggle-password').forEach(function(toggleIcon) {
            toggleIcon.addEventListener('click', function() {
                const inputId = this.getAttribute('data-target');
                const input = document.getElementById(inputId);

                this.classList.toggle("fa-eye");

                if (input.type === "password" && this.classList.contains("fa-eye-slash")) {
                    input.type = "text";

                } else {
                    input.type = "password";

                }
            });
        });
    </script>



    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
            },
            autoplay: true,
        });
    </script>

    @push('script')
        <script>
            $(document).ready(function() {
                $(document).on('change', '#country', function() {
                    var country_id = $(this).val();
                    console.log(country_id);
                    $.ajax({
                        type: "POST",
                        url: '{{ route('admin.getState') }}',
                        data: {
                            'country_id': country_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('#getState').empty();
                            $('#getState').html(
                                '<option value="">Select State</option>');
                            $.each(response, function(key, value) {
                                $('#getState').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#getDistrict').html(
                                '<option value="">Select District</option>');
                        },
                    });
                });

                $(document).on('change', '#getState', function() {
                    var state_id = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: '{{ route('admin.getDistrict') }}',
                        data: {
                            'state_id': state_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('#getDistrict').empty();
                            $('#getDistrict').html(
                                '<option value="">Select District</option>');
                            $.each(response, function(key, value) {
                                $('#getDistrict').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        },
                    });
                });
            });
        </script>
    @endpush
@endsection
