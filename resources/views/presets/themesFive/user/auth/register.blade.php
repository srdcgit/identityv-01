@extends($activeTemplate . 'layouts.auth')
@section('content')
    @php
        $policyPages = getContent('policy_pages.element', false, null, true);
        $credentials = $general->socialite_credentials;
    @endphp

    <!--=======-** Sign Up start **-=======-->
    <section class="account bg-img" data-background="{{ asset($activeTemplateTrue . 'images/banner_bg.png') }}">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-10 col-12">
                    <div class="account-form">
                        <div class="logo">
                            <a href="{{ route('home') }}"><img
                                    src="{{ getImage(getFilePath('logoIcon') . '/logo.png', '?' . time()) }}"
                                    alt="{{ config('app.name') }}"></a>
                        </div>
                        <div>
                            <h3>@lang('Sign Up')!</h3>
                        </div>
                        <form action="{{ route('user.register') }}" method="POST" class="verify-gcaptcha">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="name" class="form--label">@lang('Username')</label>
                                        <input type="text" class="form--control checkUser" id="username" name="username"
                                            value="{{ old('username') }}" placeholder="@lang('Username')" required
                                            autocomplete="username">
                                        <small class="text-danger usernameExist"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="username" class="form--label">@lang('E-Mail Address')</label>
                                        <input type="email" class="form--control checkUser" id="email" name="email"
                                            value="{{ old('email') }}" placeholder="@lang('Email')" required>
                                        <small class="text-danger emailExist"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="form--label">@lang('Country')</label>
                                        <select name="country_id" class="form-select form--control" id="country">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value=" {{ $country->id }} ">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="form--label">@lang('State')</label>
                                        <select name="state_id" class="form-select form--control" id="getState">
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="form--label">@lang('District')</label>
                                        <select name="dist_id" class="form-select form--control" id="getDistrict">
                                            <option value="">Select District</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="form--label">@lang('Mobile')</label>
                                        <div class="input-group ">
                                            {{-- <span class="input-group-text bg--base text-white mobile-code"></span>
                                        <input type="hidden" name="mobile_code">
                                        <input type="hidden" name="country_code"> --}}
                                            <input type="number" name="mobile" value="{{ old('mobile') }}"
                                                class="form-control" required placeholder="Enter Mobile Number">
                                        </div>
                                        <small class="text-danger mobileExist"></small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="your-password" class="form--label">@lang('Password')</label>
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control form--control form--password" name="password"
                                            placeholder="@lang('Password')" required autocomplete="new-password">
                                        <div class="password-show-hide toggle-password-change fas fa-eye-slash"
                                            data-target="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="confirm-password" class="form--label">@lang('Confirm Password')</label>
                                    <div class="input-group">
                                        <input id="confirm-password" type="password"
                                            class="form-control form--control form--password" name="password_confirmation"
                                            placeholder="@lang('Confirm Password')" required autocomplete="new-password">
                                        <div class="password-show-hide toggle-password-change fas fa-eye-slash"
                                            data-target="confirm-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <x-captcha></x-captcha>
                                </div>
                                @if ($general->agree)
                                    <div class="col-sm-12 my-2">
                                        <div class="form--check">
                                            <input class="form-check-input me-2" type="checkbox" id="agree"
                                                @checked(old('agree')) name="agree" required>
                                            <label for="agree"> @lang('I agree with')
                                                @foreach ($policyPages as $policy)
                                                    <a href="{{ route('policy.pages', [slug($policy->data_values->title), $policy->id]) }}"
                                                        class="text--base">{{ __($policy->data_values->title) }}</a>
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </label>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <button type="submit" class="btn--base w-100"
                                        id="recaptcha">@lang('Sign Up')</button>
                                </div>

                                @if ($credentials->google->status == 1 || $credentials->facebook->status == 1 || $credentials->linkedin->status == 1)
                                    <div class="col-12">
                                        <hr class="hr" data-content="OR">
                                    </div>
                                    <div class="col-12">
                                        <div class="social">
                                            @if ($credentials->google->status == 1)
                                                <a href="{{ route('user.social.login', 'google') }}" class="icon">
                                                    <i class="fa-brands fa-google"></i>
                                                </a>
                                            @endif
                                            @if ($credentials->facebook->status == 1)
                                                <a href="{{ route('user.social.login', 'facebook') }}" class="icon">
                                                    <i class="fa-brands fa-facebook"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                <div class="col-12">
                                    <div class="text-center">
                                        <p class="text">@lang('Already Have An Account')? <a href="{{ route('user.login') }}"
                                                class="text--base">@lang('Login Now')</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=======-** Sign Up End **-=======-->

@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#country', function() {
                var country_id = $(this).val();
                console.log(country_id);
                $.ajax({
                    type: "POST",
                    url: '{{ route('admin.getState')}}',
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
