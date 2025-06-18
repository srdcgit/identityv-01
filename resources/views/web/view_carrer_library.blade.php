@extends($activeTemplate . 'layouts.frontend')

@section('content')
    <style>
        .animated-btn {
            display: inline-block;
            position: relative;
            overflow: hidden;
            color: #fff;
            background-color: #ab2931;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            text-transform: uppercase;
            transition: all 0.4s ease-in-out;
            text-decoration: none;
        }

        .animated-btn:hover {
            background-color: #7b0c13fc;
            color: #fff;
            transform: scale(1.05);
        }

        .animated-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease-in-out;
        }

        .animated-btn:hover::before {
            left: 100%;
        }

        .animated-btn h5 {
            margin: 0;
            transition: transform 0.4s ease-in-out;
            color: #fff;
        }

        .animated-btn:hover h5 {
            transform: translateY(-5px);
        }
    </style>
    <section class="carrerlibrary">
        <div class="mt-3 mb-3">
            <div class="row justify-content-center align-items-center">
                @foreach ($view_carrer as $openings)
                    <div class="col-md-6 text-center">
                        <a href="{{ route('viewdetails', $openings->id) }}" class="animated-btn">
                            <h5>{{ $openings->title }}</h5>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
