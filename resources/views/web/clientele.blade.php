@extends($activeTemplate . 'layouts.frontend')

@section('content')
    <style>

        .nav-pills .nav-item .active {
            animation: scaleUp 0.s ease-in-out;
        }

        @keyframes scaleUp {
            0% {
                transform: scale(0.8);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
    <div class="container mt-5">
        <!-- Nav tabs -->
        <ul class="nav nav-pills" style="justify-content: center;">
            @foreach ($clientele as $title => $clients)
                <li
                    class="custom-nav-item animate__animated animate__fadeIn animate__delay-{{ $loop->index + 0.7 }}s">
                    <a class="custom-nav-link btn btn-primary {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill"
                        href="#{{ Str::slug($title, '-') }}" style="background-color:#ab2931;margin:10px;border-radius:20px">
                        {{ strtoupper($title) }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content mt-3">
            @foreach ($clientele as $title => $clients)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }} animate__animated animate__fadeIn"
                    id="{{ Str::slug($title, '-') }}">
                    <div class="row">
                        <!-- Box Section -->
                        @foreach ($clients as $data)
                            <div class="col-lg-2 col-md-6 col-sm-12 my-3" style="width:200px!important;margin:5px">
                                <div class="card shadow animate__animated animate__fadeInUp h-100"
                                    style="cursor: pointer; transition: transform 0.3s;width:200px!important;"
                                    >
                                    <div class="card-body" style="padding:0px!important;width:200px!important">
                                        <img src="{{ asset('assets/frontend/clientele/' . $data->logo) }}"
                                            >

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
