@php
    $links = getContent('policy_pages.element');
    $importantLinks = getContent('footer_important_links.element', false, null, true);
    $companyLinks = getContent('footer_company_links.element', false, null, true);
    $contact = getContent('contact_us.content', true);
    $socialIcons = getContent('social_icon.element', false);
@endphp

<style>

ul li{
    list-style-type:none !important;
}

</style>


<!-- ==================== Footer Start ==================== -->
<footer class="footer-area">
    <div class="shape1">
        <img src="{{ asset($activeTemplateTrue . 'images/shape/shape13.png') }}" alt="@lang('shape')">
    </div>
    <div class="shape2">
        <img src="{{ asset($activeTemplateTrue . 'images/shape/shape14.png') }}" alt="@lang('shape')">
    </div>
    <div class="container">
        {{-- <div class="logo-area">
            <a class="logo" href="{{route('home')}}">
                <img src="{{ getImage(getFilePath('logoIcon').'/logo_white.png', '?'.time()) }}" alt="{{config('app.name')}}">
            </a>
        </div> --}}
        <div class="row justify-content-center g-5">

            <div class="col-xl-3 col-sm-6">
                <div class="footer-item">
                    <p class="footer-item__desc">
                        @if (strlen(__(strip_tags(@$contact->data_values->short_description))) > 60)
                            {{ substr(__(strip_tags(@$contact->data_values->short_description)), 0, 60) . '...' }}
                        @else
                            {{ __(strip_tags(@$contact->data_values->short_description)) }}
                        @endif
                    </p>
                    <ul class="social-list mt-3" style="padding-left:0px !Important;">
                        @foreach ($socialIcons as $item)
                            <li class="social-list__item"><a href="{{ $item->data_values->url }}"
                                    class="social-list__link">@php echo $item->data_values->social_icon; @endphp</a> </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="footer-item">
                    <h5 class="footer-item__title">@lang('Important Links')</h5>
                    <ul class="footer-menu" style="padding-left:0px !Important;">
                        @foreach ($importantLinks as $key => $item)
                            <li class="footer-menu__item"><a href="{{ url('/') . $item->data_values->url }}"
                                    class="footer-menu__link">{{ __($item->data_values->title) }} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>



            <div class="col-xl-3 col-sm-6">
                <div class="footer-item">
                    <h5 class="footer-item__title">@lang('Address')</h5>
                    <ul class="footer-menu"style="padding-left:0px !Important;">
                        <li class="footer-menu__item"><a
                                href="tel:{{ $contact->data_values->contact_number }}">{{ $contact->data_values->contact_number }}</a>
                        </li>
                        <li class="footer-menu__item"><a
                                href="mailto:{{ $contact->data_values->email_address }}">{{ $contact->data_values->email_address }}</a>
                        </li>
                        <li class="footer-menu__item">
                            {{ __(@$contact->data_values->contact_details) }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="footer-item">
                    <h5 class="footer-item__title">@lang('Newsletter')</h5>
                    <p>@lang('Subscribe our latest update')</p>
                    <form action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form--control" name="email" placeholder="@lang('Email')">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="copyright" style="text-align:center">
        <p>Copyright 2025. All rights reserved.Designed & Developed by "Zenprateck India Pvt ltd"</p>
    </div>
</footer>
@include('presets.themesFive.components.botman')
<!-- ==================== Footer End ==================== -->
