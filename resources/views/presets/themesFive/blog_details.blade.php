@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <!-- ==================== Blog Start Here ==================== -->
    <section class="blog-detials py-60">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-details" >
<h2 class="blog-details__title">{{ __($blog->data_values->title) }}</h2>
                                <ul style="margin-left:-25px">
                                    <li class="text-list__item"> <span class="text-list__item-icon"><i
                                                class="fas fa-calendar-alt"></i></span>{{ showDateTime($blog->created_at) }}
                                    </li>
                                </ul>
                        <div class="blog-item">
                            <div class="blog-item__thumb">
                                <img src="{{ getImage(getFilePath('blog') . '/' . $blog->data_values->blog_image) }}"
                                    alt="blog-img">
                            </div>

                            <div class="blog-item__content pt-2">

                            </div>
                        </div>
                        <div class="blog-details__content">
                            
                            <div class="blog-details__desc ul-li-update wyg">
                                {!! $blog->data_values->description ?? 'Not Set' !!}
                            </div>
                            <div class="blog-details__share mt-4 d-flex align-items-center flex-wrap mb-4">
                                <h5 class="social-share__title mb-0 me-sm-3 me-1 d-inline-block">@lang('Share This')</h5>
                                <ul class="social-list blog-details">
                                    <li class="social-list__item" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Facebook"> <a class="social-list__link" target="_blank"
                                            href="https://www.facebook.com/share.php?u={{ Request::url() }}&title={{ slug(@$blog->data_values->title) }}"><i
                                                class="fab fa-facebook-f"></i></a> </li>
                                    <li class="social-list__item" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Linkedin"> <a class="social-list__link" target="_blank"
                                            href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{ slug(@$blog->data_values->title) }}"><i
                                                class="fab fa-linkedin-in"></i></a> </li>
                                    <li class="social-list__item" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Twitter"> <a class="social-list__link" target="_blank"
                                            href="https://twitter.com/intent/tweet?status={{ slug(@$blog->data_values->title) }}+{{ Request::url() }}"><i
                                                class="fa-brands fa-x-twitter"></i></a> </li>
                                            
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- ============================= Blog Details Sidebar Start ======================== -->
                    <div class="blog-sidebar-wrapper">
                        <div class="blog-sidebar">
                            <h5 class="blog-sidebar__title">@lang('Latests')</h5>
                            @foreach ($latests as $item)
                                <div class="latest-blog">
                                    <div class="latest-blog__thumb">
                                        <a
                                            href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id]) }}">
                                            <img src="{{ getImage(getFilePath('blog') . '/' . $item->data_values->blog_image) }}"
                                                alt="latest blog"></a>
                                    </div>
                                    <div class="latest-blog__content">
                                        <h6 class="latest-blog__title"><a
                                                href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id]) }}">
                                                @if (strlen(__(@$item->data_values->title)) > 50)
                                                    {{ substr(__(@$item->data_values->title), 0, 50) . '...' }}
                                                @else
                                                    {{ __(@$item->data_values->title) }}
                                                @endif
                                            </a></h6>
                                        <span class="latest-blog__date">{{ showDateTime($item->created_at) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- ============================= Blog Details Sidebar End ======================== -->
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== Blog End Here ==================== -->


    <style>
        .ul-li-update ul li,
        .ul-li-update ul {
            list-style-type: unset !important;
            font-family: var(--poppins) !important;
            font-size: 14px !important;
        }

        .ul-li-update ul li a, .ul-li-update ol li a {
            color: blue !important;
        }

        .ul-li-update ol li,
        .ul-li-update ol {
            font-family: var(--poppins) !important;
            font-size: 14px !important;
        }
    </style>
@endsection


@push('style')
    <style>
        .wyg h1,
        .wyg h2,
        .wyg h3,
        .wyg h4 {
            color: hsl(var(--black));
        }

        .wyg p {
            color: hsl(var(--black));
        }

        .wyg ul,
        .wyg ol {
            margin: 25px;
        }

        .wyg ul li {
            list-style-type: disc;
            color: hsl(var(--black));
            font-family: var(--poppins) !important;
        }

        .wyg ol li {
            /* list-style-type: disc; */
            color: hsl(var(--black));
            font-family: var(--poppins) !important;
        }
    </style>
@endpush
