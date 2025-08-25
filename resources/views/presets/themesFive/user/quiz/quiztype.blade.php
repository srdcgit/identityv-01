@extends($activeTemplate . 'layouts.master')
<style>
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-hover:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px #000000;
    }

    .custom-container {
        max-width: 1400px;
        /* Set a wider max-width */
        margin: 0 auto;
        /* Center the container */
        padding-left: 150px;
        padding-right: 150px;
    }

    .quiz_type {
        background-color: #af3027f0;
        padding: 23px 0px 10px 0px;
    }

    .navbar-wrapper {
        margin-bottom: 20px !important;
    }
</style>
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <section class="home">
        <div class="">
            <div class="mb-4 text-center col-md-12 quiz_type">
                <h2 class="font-weight-bold text-white">Quiz Type</h2>
            </div>
            <div class="" style="text-align:center; padding-left:40%;padding-right:40%;">
                <div class="row pt-1 pb-1" style="background-color: #af3027f0;">
                    <select id="mySelect2" class="Select2" style="width: 100%;">
                        <option value="">Select Quiz Type</option>
                        @foreach ($quizs as $name)
                            <option value="{{ $name->exam_name }}"> {{ $name->exam_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="custom-container mt-5 mb-5"> <!-- Custom container without Bootstrap -->
                <div class="row">
                    @foreach ($quizs as $quiz)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card card-hover"
                                style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                <div class="mt-3">
                                    <img src="{{ asset('Modules/' . $quiz->image) }}"
                                        style="height: 200px; width: 100%; object-fit: cover;" alt="Career Library Image">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title mb-3"> {{ $quiz->title }} </h6>
                                    <a href="{{ $quiz->url }}" class="btn btn-warning"
                                        style="font-size: small;">{{ $quiz->btn_text }} <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
