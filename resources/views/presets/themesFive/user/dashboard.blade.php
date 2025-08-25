@extends($activeTemplate . 'layouts.master')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-hover:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .custom-container {
        max-width: 1400px;
        margin: 0 auto;
        padding-left: 150px;
        padding-right: 150px;
    }

    .body-wrapper {
        padding-left: 0px;
        padding-right: 0px !important;
        transition: all 0.5s;
    }

    .glowing-btn {
        position: relative;
        /* background: linear-gradient(90deg, #ffd700, #f9a602); */
        /* background:#E5E4E2 !important; */
        background:#E5E4E2 !important;
        color: #000;
        font-weight: bold;
        padding: 12px 30px;
        text-align: center;
        text-transform: uppercase;
        border: none;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    a:hover{
        color:white !important;
    }

    .glowing-btn::before {
        content: "";
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        /* background: linear-gradient(90deg, #fffacd, #ffeb3b, #ffdd00); */
        /* background:#E5E4E2 !important; */
        background:#E5E4E2 !important;
        z-index: -1;
        filter: blur(4px);
        opacity: 0;
        transition: opacity 0.3s ease-in-out;

    }

    .glowing-btn:hover {
        transform: scale(1.1);
        background:var(--template-color) !important;
        color:white !important;
    }

     .glowing-btn:hover span{
        color:white !important;
     }

    .glowing-btn:hover::before {
        opacity: 1;
        background:var(--template-color) !important;
        color:white !important;
    }

    .glowing-btn:active {
        transform: scale(0.95);
    }

    .card-hover {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-hover .badge.bg-success {
        position: absolute;
        top: 0;
        right: 0;
        margin: 10px;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .card-body {
        flex-grow: 1;
    }

    .card-body img {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .col-lg-3,
    .col-md-6 {
        display: flex;
        justify-content: center;
    }

    .card {
        width: 100%;
        max-height: 350px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }


    /* code by sumit */

    /* responsive code */

    @media only screen and (max-width:768px) {
        .custom-container {
            padding-left: unset !important;
            padding-right:unset !important;
            width:90vw;
            
        }

        .custom-container-first{
            margin-left:6px;
        }
        .custom-container-first .card img{
            object-fit: fill !important;
        }


    }
</style>
@section('content')
    <section class="home-profile mt-5 mb-5" style="background-color: #32323233; padding-top: 23px;">
        <div class="body-wrapper">
            <div class="custom-container custom-container-first">
                <div class="row">
                    {{-- @foreach ($modules as $module) --}}
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card card-hover"
                            style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="mt-3">
                                <img src="{{ getImage(getFilePath('userProfile') . '/' . @$user->image, getFileSize('userProfile')) }}"
                                    style="height: 170px; width: 170px; object-fit: cover; border-radius: 50%;"
                                    alt="Career Library Image">
                            </div>

                            <div class="card-body text-center">
                                <p>welcome</p>
                                <h5 class="card-title mb-3"> {{ $user->username }} </h5>
                                <a href="{{ route('user.upgradeplanupgrade') }}"
                                    class="btn {{ Auth::check() && Auth::user()->is_upgrade ? 'glowing-btn' : '' }}" style="background:#E5E4E2;">
                                    @if (Auth::check() && Auth::user()->is_upgrade)
                                        {{ Auth::user()->getUpgrade->plan_name }}
                                    @else
                                        @lang('Upgrade')
                                    @endif
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 mb-4">
                        <div class="card card-hover"
                            style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="mt-3">
                                <img src="{{ asset('assets/images/user/default_interest_graph.jpg') }}"
                                    style="height: 230px; width: 100%; object-fit: cover;" alt="Career Library Image">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-3"> </h5>
                                <a href="" class="btn" style="background:var(--template-color); color:white;">Start Assesment<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>

    </section>

    {{-- <div class="body-wrapper">
    <div class="container mt-5 mb-5">
        <div class="row">
            @foreach ($modules as $module)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card card-hover" style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="mt-3" style="margin-top:0px !important;">
                        <img src="{{asset('modules/'. $module->image)}}" style="height: 200px; width: 100%; object-fit: cover;" alt="Career Library Image">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3"> {{ $module->title }} </h5>
                        <a href="{{ $module->url }}" class="btn btn-warning">{{ $module->btn_text }} <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> --}}
    <section class="home mt-5">
        <div class="">
            <div class="custom-container mt-5 mb-5"> <!-- Custom container without Bootstrap -->
                <div class="row">
                    {{-- @foreach ($modules as $module)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card card-hover"
                                style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                <div class="mt-3">
                                    <img src="{{ asset('modules/' . $module->image) }}"
                                        style="height: 200px; width: 100%; object-fit: cover;" alt="Career Library Image">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title mb-3"> {{ $module->title }} </h6>
                                    <a href="{{ $module->url }}" class="btn btn-warning"
                                        style="font-size: small;">{{ $module->btn_text }} <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                    @foreach ($modules as $module)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card card-hover"
                                style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease;border-radius:25px;">
                                <div class="mt-3"style="margin-top:0px !important;">
                                    <img src="{{ asset('modules/' . $module->image) }}"
                                        style="height: 200px; width: 100%; object-fit: cover;" alt="Module Image">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title mb-3">
                                        {{ $module->title }}
                                        @if ($module->is_free)
                                            <span class="badge bg-success ms-2">Free</span>
                                        @endif
                                    </h6>
                                    <a href="{{ $module->url }}" class="btn" style="font-size: small; background:#9f2d26; color:white;border-radius:25px!important">
                                        {{ $module->btn_text }} <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- @foreach ($modules as $module)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card card-hover"
                                style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%;">
                                <div class="position-relative" style="height: 100%;">
                                    @if ($module->is_free)
                                        <!-- Free Module Tag -->
                                        <span
                                            class="badge bg-success text-white position-absolute top-0 end-0 m-2">Free</span>
                                    @endif

                                    <div class="mt-3">
                                        <img src="{{ asset('modules/' . $module->image) }}"
                                            style="height: 200px; width: 100%; object-fit: cover;" alt="Module Image">
                                    </div>

                                    <div class="card-body text-center" style="flex-grow: 1;">
                                        <h6 class="card-title mb-3">{{ $module->title }}</h6>

                                        @if ($module->is_allowed)
                                            <a href="{{ $module->url }}" class="btn btn-warning" style="font-size: small;">
                                                {{ $module->btn_text }} <i class="fas fa-arrow-right"></i>
                                            </a>
                                        @elseif($module->is_free)
                                            <a href="{{ $module->url }}" class="btn btn-success"
                                                style="font-size: small;">
                                                {{ $module->btn_text }} <i class="fas fa-arrow-right"></i>
                                            </a>
                                        @else
                                            <button type="button" class="btn btn-warning" style="font-size: small;"
                                                onclick="showAccessDeniedMessage()">
                                                {{ $module->btn_text }} <i class="fas fa-arrow-right"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </section>
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                iconHtml: '<video width="150" height="150" autoplay loop muted>' +
                    '<source src="{{ asset('assets/images/user/Oops.mp4') }}" type="video/mp4">' +
                    'Your browser does not support the video tag.' +
                    '</video>',
                text: '{{ session('error') }}',
                timer: 5000,
                timerProgressBar: true,
                didClose: () => {}
            });
        </script>
    @endif

    <script>
        function showAccessDeniedMessage() {
            Swal.fire({
                icon: 'error',
                iconHtml: '<video width="150" height="150" autoplay loop muted>' +
                    '<source src="{{ asset('assets/images/user/Oops.mp4') }}" type="video/mp4">' +
                    'Your browser does not support the video tag.' +
                    '</video>',
                text: 'You do not have access to this module.',
                timer: 5000,
                timerProgressBar: true,
                didClose: () => {}
            });
        }
    </script>
@endsection

@push('script')
@endpush
