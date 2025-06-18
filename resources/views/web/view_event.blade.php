@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <style>

        .main .container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 1rem;
            justify-content: center;
            align-items: center;
        }

        .main .card {
            background: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 3px rgba(0, 0, 0, 0.24);
            color: #333333;
            border-radius: 2px;
        }

        .main .card-image {
            background: #ffffff;
            display: block;
            padding-top: 70%;
            position: relative;
            width: 100%;
        }

        .main .card-image img {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

        }

        @media only screen and (max-width: 600px) {
            .main .container {
                display: grid;
                grid-template-columns: 1fr;
                grid-gap: 1rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <main class="main mt-5" style="margin-bottom:50px">
        <div class="container">
            @foreach ($event as $events)
                <div class="card">
                    <div class="card-image">
                        <a href="{{ asset('assets/frontend/event/' .$events->image) }}" data-fancybox="gallery">
                            <img src="{{ asset('assets/frontend/event/' .$events->image) }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    // Fancybox Config
    $('[data-fancybox="gallery"]').fancybox({
        buttons: [
            "slideShow",
            "thumbs",
            "zoom",
            "fullScreen",
            "close"
        ],
        loop: false,
        protect: true
    });
</script>
