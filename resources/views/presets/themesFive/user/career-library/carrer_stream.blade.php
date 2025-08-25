@extends($activeTemplate . 'layouts.master')

<style>
    .card.category-card {
        transition: transform 0.3s, border-color 0.3s;
        border: 2px solid transparent;
    }

    .card.category-card:hover {
        transform: scale(1.05) ;
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


     /* responsive code */

        @media only screen and (max-width:768px){
             .card.category-card{
                height:fit-content !important;
             }
            .card.category-card img{
                width:100% !important;
                height:150px !important;
                object-fit:fill !important;
            }
        }



</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>

@section('content')
    <div class="body-wrapper">
        <div class="container mt-5 mb-5">
            <div style="text-align: center">
                <h3>Your Streams</h3>
            </div>
            <div class="row">
                @foreach ($streams as $stream)
                    <div class="col-lg-3 col-md-6 mt-3">
                        <div class="card category-card position-relative"
                            style="text-align:center; height:260px; overflow:hidden; border-radius:20px">
                            <a href="{{ route('user.category', $stream->id) }}">
                                <div class="mt-3" style="margin-top:0px !important;">
                                    <img src="{{ asset('stream/' . $stream->image) }}"
                                        style="height: 160px; width:100%;">
                                </div>
                                <div class="card-body text-center"style="padding:0px !important;padding-top:15px !important;">
                                    <h5 class="card-title" style="border-bottom:1px dotted #c0c0c0;padding-bottom:10px"> {{ $stream->name }} </h5>
                                    <p style="text-align:center;color:red">({{ count($stream->countCategory) }} Career Options)</p>
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
