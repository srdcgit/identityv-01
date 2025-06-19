@extends($activeTemplate . 'layouts.master')

{{-- <style>
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 300px;
        font-family: Arial, sans-serif;
        margin: 20px auto;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .card__image {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card__name {
        background-color: #f4f4f4;
        text-align: center;
    }

    .card__name p {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
    }

    .card p {
        padding: 5px;
        color: #555;
        text-align: center;
    }

    .card__button {
        background-color: rgba(33, 113, 138, .89);
        color: white;
        text-align: center;
        cursor: pointer;
    }

    .card__button:hover {
        background-color: #0056b3;
    }

    .card__button p {
        margin: 0;
        font-size: 1rem;
        font-weight: bold;
    }
</style> --}}
<style>
    /* Basic Card Styles */
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 100%;
        max-width: 300px;
        font-family: Arial, sans-serif;
        margin: 20px auto;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .card__image {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-bottom: 1px solid #ddd;
    }

    .card__name {
        background-color: #f4f4f4;
        padding: 10px;
        text-align: center;
    }

    .card__name p {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
    }

    .card p {
        padding: 5px;
        color: #555;
        text-align: center;
    }

    .card__button {
        background-color: rgba(33, 113, 138, .89);
        color: white;
        text-align: center;
        cursor: pointer;
        /* padding: 10px 0; */
    }

    .card__button:hover {
        background-color: #0056b3;
    }

    .card__button p {
        margin: 0;
        font-size: 1rem;
        font-weight: bold;
    }

    /* Responsive Design */
    @media (min-width: 768px) {
        .col-sm-6 {
            max-width: 50%;
        }
    }

    @media (min-width: 992px) {
        .col-md-4 {
            max-width: 33.33%;
        }
    }

    @media (min-width: 1200px) {
        .col-lg-3 {
            max-width: 25%;
        }
    }

    .card {
        background-color: #fafafa;
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card__name p {
        font-size: 1.4rem;
    }

    .card p {
        font-size: 0.9rem;
    }

    .card__button {
        transition: background-color 0.3s ease;
    }

    /* code by sumit */

    /* responsive code */

    @media only screen and (max-width:768px){
        #animated-cards .card{
            width:90vw !important;
        }
    }


</style>

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="body-wrapper">
        <div class="container mt-3 mb-5">
            <div class="row pt-3 pb-3" style="background-color: rgba(33, 113, 138, .89); border-radius:8px; color:#fff">
                <div class="col-md-3">
                    <p style="margin-top:7px; font-size:1.2rem; color:#fff;">Search Teacher</p>
                </div>
                <div class="col-md-3">
                    <select id="mySelect2" class="Select2" style="width: 100%;">
                        <option value="">Search Teacher</option>
                        @foreach ($mysession as $teams)
                            <option value=" {{ $teams->name }} ">{{ $teams->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="category" class="Select2" style="width: 100%;">
                        <option value="">Select category</option>
                        @foreach ($category as $name)
                            <option value="{{ $name->id }}"> {{ $name->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="subcategory" class="Select2" style="width: 100%;">
                        <option value="">Select subcategory</option>
                    </select>
                </div>
            </div>
        </div>
        {{-- <div class="container">
            <div class="row justify-content-center g-4">
                @foreach ($mysession as $team)
                    <div class="col-lg-3">
                        <div class="card profile text-center">
                            <div class="profile-picture mx-auto mt-4">
                                <img src="http://upload.wikimedia.org/wikipedia/commons/e/e1/Anne_Hathaway_Face.jpg"
                                    class="rounded-circle img-fluid" alt="Anne Hathaway picture" width="150px">
                            </div>
                            <div class="card-body">
                                <h1 class="user-name card-title">Anne Hathaway</h1>
                                <p class="profile-description">Lorem ipsum dolor sit amet consectetuer adipiscing
                                </p>
                                <ul class="profile-options list-unstyled d-flex justify-content-around">
                                    <li><a class="comments" href="#40">
                                            <i class="fab fa-facebook fs-3"></i>
                                        </a></li>
                                    <li><a class="views" href="#41">
                                            <i class="fab fa-twitter fs-3"></i>
                                        </a></li>
                                    <li><a class="likes" href="#42">
                                            <i class="fab fa-linkedin fs-3"></i>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
        {{-- <div class="container">
            <div class="row space-rows" id="animated-cards">
                @foreach ($mysession as $team)
                    <div class="col col-lg-3">
                        <div class="card">
                            <div class="card__image">
                                <img src="{{ asset('teams/' . $team->photo) }}" />
                            </div>
                            <div class="card__name">
                                <p>{{ $team->name }}</p>
                            </div>
                            <p>{!! Str::limit($team->description, 100) !!}</p>
                            <div class="card__button">
                                <a href="{{ route('user.mysession.viewTeam', $team->id) }}">
                                    <p style="color: #fff">View Profile</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
        <div class="container">
            <div class="row space-rows" id="animated-cards">
                @foreach ($mysession as $team)
                    <div class="col col-lg-3 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card__image">
                                <img src="{{ asset('teams/' . $team->photo) }}" alt="{{ $team->name }}'s photo" />
                            </div>
                            <div class="card__name">
                                <p>{{ $team->name }}</p>
                            </div>
                            <p>{!! Str::limit($team->description, 100) !!}</p>
                            <div class="card__button">
                                <a href="{{ route('user.mysession.viewTeam',$team->id) }}">
                                    <p style="color: #fff">View Profile</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script>
    $(document).ready(function() {
        $('.Select2').select2({
            allowClear: true
        });

        $(document).on('change', '#mySelect2', function() {
            var team = $(this).val();
            // console.log(entrance_exam);
            $.ajax({
                type: "POST",
                url: '{{ route('user.mysession.get_team') }}',
                data: {
                    'name': team,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    $('#animated-cards').empty();
                    if (response.length == 0) {
                        console.log(response.length);
                        $('#animated-cards').append(
                            '<p>No Teachers Found.</p>'
                        );
                    } else {
                        $.each(response, function(key, team) {
                            console.log(team.id);
                            $('#animated-cards').append(
                                '<div class="col col-lg-3">' +
                                '<div class="card cards-shadown cards-hover">' +
                                '<div class="card-header">' +
                                '<div class="cardheader-text">' +
                                '<img src="{{ asset('teams/') }}/' + team
                                .photo + '" alt="">' +
                                '</div>' +
                                '</div>' +
                                '<div class="card-body">' +
                                '<p class="card-text sub-text-color" style="font-size: 14px; text-align:center;">' +
                                team.name +
                                '</p>' +
                                '<div class="card-text cardbody-sub-text" style="font-size: 10px !important;">' +
                                team.description.substring(0, 100) + '...' +
                                '</div>' +
                                '<ul class="profile-options list-unstyled d-flex justify-content-around">' +
                                '<li><a class="comments" href="#40">' +
                                '<i class="fab fa-facebook" style="font-size: 20px;"></i>' +
                                '</a></li>' +
                                '<li><a class="views" href="#41">' +
                                '<i class="fab fa-twitter" style="font-size: 20px;"></i>' +
                                '</a></li>' +
                                '<li><a class="likes" href="#42">' +
                                '<i class="fab fa-linkedin" style="font-size: 20px;"></i>' +
                                '</a></li>' +
                                '</ul>' +
                                '</div>' +
                                '</div>' +
                                '</div>');
                        });
                    }
                    $('.pagination').hide();
                },
            });
        });
        $(document).on('change', '#category', function() {
            var category_id = $(this).val();
            $.ajax({
                type: "POST",
                url: '{{ route('user.mysession.get_team_by_category') }}',
                data: {
                    'cat_id': category_id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#animated-cards').empty();
                    if (response.category.length == 0) {
                        $('#animated-cards').append(
                            '<p>No Teachers Found.</p>'
                        );
                    } else {
                        $.each(response, function(key, team) {
                            // console.log(team.id);
                            $('#animated-cards').append(
                                '<div class="col col-lg-3">' +
                                '<div class="card cards-shadown cards-hover">' +
                                '<div class="card-header">' +
                                '<div class="cardheader-text">' +
                                '<img src="{{ asset('teams/') }}/' + team
                                .photo + '" alt="">' +
                                '</div>' +
                                '</div>' +
                                '<div class="card-body">' +
                                '<p class="card-text sub-text-color" style="font-size: 14px; text-align:center;">' +
                                team.name +
                                '</p>' +
                                '<div class="card-text cardbody-sub-text" style="font-size: 10px !important;">' +
                                team.description.substring(0, 100) + '...' +
                                '</div>' +
                                '<ul class="profile-options list-unstyled d-flex justify-content-around">' +
                                '<li><a class="comments" href="#40">' +
                                '<i class="fab fa-facebook" style="font-size: 20px;"></i>' +
                                '</a></li>' +
                                '<li><a class="views" href="#41">' +
                                '<i class="fab fa-twitter" style="font-size: 20px;"></i>' +
                                '</a></li>' +
                                '<li><a class="likes" href="#42">' +
                                '<i class="fab fa-linkedin" style="font-size: 20px;"></i>' +
                                '</a></li>' +
                                '</ul>' +
                                '</div>' +
                                '</div>' +
                                '</div>');
                        });
                    }
                    $('#subcategory').empty();
                    $('#subcategory').html(
                        '<option value="">Select Subcategory</option>');
                    $.each(response.subcategory, function(key, value) {
                        $('#subcategory').append('<option value="' + value.id +
                            '">' + value.title + '</option>');
                    });
                    $('.pagination').hide();
                },
            });
        });
        $(document).on('change', '#subcategory', function() {
            var subcategory_id = $(this).val();
            $.ajax({
                type: "POST",
                url: '{{ route('user.entrance.get_entranceexam_by_subcategory') }}',
                data: {
                    'subcat_id': subcategory_id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    $('#entrance_exam').empty();
                    if (response.length == 0) {
                        console.log(response.length);
                        $('#entrance_exam').append(
                            '<p>No Exams Found.</p>'
                        );
                    } else {
                        $.each(response, function(key, entrance) {
                            $('#entrance_exam').append(
                                '<div class="exam-card">' +
                                '<div class="icon" style="background-color: #ffeb3b;">📄</div>' +
                                '<div class="exam-info">' +
                                '<div class="col-lg-4">' +
                                '<div class="exam-label">Exam Name:</div>' +
                                '<div class="exam-name"> ' + entrance
                                .exam_name + ' </div>' +
                                '</div>' +
                                '<div class="col-lg-4">' +
                                '<div class="exam-label">Form Issue Date:</div>' +
                                '<div class="form-issue-date"> ' + entrance
                                .issue_date + ' </div>' +
                                '</div>' +
                                '<div class="col-lg-4">' +
                                '<div class="exam-label">Last Date:</div>' +
                                '<div class="last-date"> ' + entrance
                                .last_date + ' </div>' +
                                '</div>' +
                                '</div>' +
                                '<a href=" ' + entrance.url +
                                ' " target="blank">' +
                                '<div class="arrow"></div>' +
                                '</a>' +
                                '</div>');
                        });
                    }
                    $('.pagination').hide();
                },
            });
        });
    });
</script>
