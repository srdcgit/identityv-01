@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <style>
        .main .event-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
            justify-content: center;
            align-items: stretch;
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
            object-fit: cover;

        }

        .main .card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform .15s ease, box-shadow .15s ease;
        }
        .main .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,.08);
        }

        @media only screen and (max-width: 600px) {
            .main .event-gallery {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <main class="main mt-5" style="margin-bottom:50px">
        <div class="container">
            @php
                $title = data_get($eventDes, 'getEvent.title');
                $titleImage = data_get($eventDes, 'getEvent.image');
                $photoCount = 0;
                foreach ($event as $ev) {
                    $decoded = json_decode($ev->image, true);
                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                        $photoCount += count($decoded);
                    } elseif (!empty($ev->image)) {
                        $photoCount += 1;
                    }
                }
            @endphp
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="h4 mb-0">{{ $title }}</h2>
                <span class="badge bg-secondary">{{ $photoCount }} Photos</span>
            </div>
            <div class="row align-items-start g-4 mb-4">
                <div class="col-md-7 col-lg-8">
                    <p><span class="text-primary">Event Details: </span>{!! data_get($eventDes, 'getEvent.description') !!}</p>
                </div>
                @if(!empty($titleImage))
                <div class="col-md-5 col-lg-4">
                    <img src="{{ asset('assets/frontend/event/' . $titleImage) }}" alt="{{ $title }} image"
                        class="img-fluid rounded shadow-sm">
                </div>
                @endif
            </div>
            <h3 class="text-center text-primary fw-semibold mb-3">Gallery</h3>
            @if($photoCount > 0)
            <div class="event-gallery">
                @foreach ($event as $events)
                    @php
                        $images = [];
                        // try to decode JSON
                        $decoded = json_decode($events->image, true);

                        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                            // it's valid JSON → multiple images
                            $images = $decoded;
                        } elseif (!empty($events->image)) {
                            // not JSON → single image string
                            $images = [$events->image];
                        }
                    @endphp

                    @foreach ($images as $img)
                        <div class="card">
                            <div class="card-image">
                                <a href="{{ asset('assets/frontend/event/' . $img) }}" data-fancybox="gallery">
                                    <img src="{{ asset('assets/frontend/event/' . $img) }}" loading="lazy">
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
            @else
            <div class="text-center text-muted py-5">No photos available yet.</div>
            @endif
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
