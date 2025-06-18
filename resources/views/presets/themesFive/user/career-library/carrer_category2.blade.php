@extends($activeTemplate . 'layouts.master')

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
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>

@section('content')
    <div class="body-wrapper">
        <div class="container mt-5 mb-5">
            <div style="text-align: center">
                <h3>{{ $pageTitle }}</h3>
            </div>
            <div class="row">
                @foreach ($categories2 as $category)
                    <div class="col-lg-3 col-md-6 mt-3">
                        <div class="card category-card position-relative"
                            style="text-align:center; height:260px; overflow:hidden;border-radius:20px">
                            <a href="{{ route('user.subcategory', $category->id) }}">
                                <div class="mt-3" style="margin-top: 0rem !important;">
                                    <img src="{{ asset('2nd Category/' . $category->image) }}" class="category-image"
                                        style="height: 180px; width:260px">
                                </div>
                                <div class="card-body text-center">
                                    <h6 style="font-family:sans-serif;!important""> {{ $category->name }} </h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
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
@endsection
