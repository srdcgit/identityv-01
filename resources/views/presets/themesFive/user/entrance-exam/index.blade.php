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
</style>

<style>
    .path-box {
        display: flex;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .path-step {
        padding: 15px;
        position: relative;
        background-color: #e6e9ef;
    }

    .path-step:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .path-step:nth-of-type(even) {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        background-color: #4558d1;
        color: #fff !important;
    }
</style>

<style>
    .exam-card {
        display: flex;
        align-items: center;
        background-color: #f9f9f9;
        padding: 10px;
        margin: 10px 0;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
    }

    .exam-info {
        display: flex;
        align-items: center;
        flex-grow: 1;
    }

    .exam-label {
        font-size: 12px;
    }

    .exam-name,
    .form-issue-date,
    .last-date {
        flex-basis: 30%;
        flex-shrink: 0;
        font-size: 14px;
        margin-right: 20px;
    }

    .exam-dates {
        display: flex;
        align-items: center;
    }

    .exam-dates div {
        font-size: 14px;
        margin-right: 20px;
    }

    .arrow {
        width: 34px;
        height: 34px;
        background-color: #f1f1f1;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .arrow::after {
        content: '➔';
        font-size: 25px;
        color: #555;
    }
</style>

<style>
    .card {
        padding: 15px 15px 15px 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        background-color: #fff;
    }

    .card .card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card .card-head .status-1 {
        text-align: left;
        font-size: .75rem;
    }

    .card .card-head .status-2 i {
        text-align: right;
        font-size: 1.5rem;
    }

    .card .card-head .circle {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #0fbf61;
        border-radius: 100px;
    }

    .card .card-title {
        text-align: center;
        font-weight: bold;
    }

    .card .card-title i {
        font-size: 35px;
    }

    .card .card-info .label {
        font-size: .75rem;
    }

    .card .card-info .value {
        font-size: .75rem;
        font-weight: bold;
    }

    .card .card-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
<style>
    .card.custom-card video {
        height: 300px;
        width: 100%;
        object-fit: cover;
        border-bottom: 1px solid black;
    }

    .card.custom-card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card.custom-card .card-body {
        padding: 0;
    }

    .card.custom-card video {
        max-height: 300px;
        max-width: 100%;
        border-bottom: 1px solid #ddd;
    }

    .card.custom-card .video-title {
        padding: 8px;
        text-align: center;
        font-weight: bold;
        margin-top: 5px;

    }

    .card.custom-card .video-title h6 {
        color: #9f2d26;
        font-size: 1.25rem;
        margin: 0;
    }
</style>

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="body-wrapper">
        <div class="container mt-3 mb-5">
            <div class="row pt-3 pb-3" style="background-color: #9f2d26; border-radius:8px; color:#fff">
                <div class="col-md-2">
                    <p style="margin-top:7px; font-size:1.2rem; color:#fff;">Search Exam</p>
                </div>
                <div class="col-md-3">
                    <select id="mySelect2" class="Select2" style="width: 100%;">
                        <option value="">Select Exam</option>
                        @foreach ($entrances as $name)
                            <option value="{{ $name->exam_name }}"> {{ $name->exam_name }}</option>
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
            <div class="mt-5">
                <div>
                    <h5>Entrance Exams</h5>
                    <div id="entrance_exam">
                        @foreach ($entrances as $entrance)
                            <div class="exam-card">
                                <div class="icon" style="background-color: #9f2d26;">📄</div>
                                <div class="exam-info">
                                    <div class="col-lg-4">
                                        <div class="exam-label">Exam Name:</div>
                                        <div class="exam-name"> {{ $entrance->exam_name }} </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="exam-label">Form Issue Date:</div>
                                        <div class="form-issue-date"> {{ $entrance->issue_date }} </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="exam-label">Last Date:</div>
                                        <div class="last-date"> {{ $entrance->last_date }} </div>
                                    </div>
                                </div>
                                <a href=" {{ $entrance->url }} " target="blank">
                                    <div class="arrow"></div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
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
            var entrance_exam = $(this).val();
            console.log(entrance_exam);
            $.ajax({
                type: "POST",
                url: '{{ route('user.entrance.get_entranceexam') }}',
                data: {
                    'exam_name': entrance_exam,
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
                                '<div class="exam-name"> '+entrance.exam_name+' </div>' +
                                '</div>' +
                                '<div class="col-lg-4">' +
                                '<div class="exam-label">Form Issue Date:</div>' +
                                '<div class="form-issue-date"> '+entrance.issue_date+' </div>' +
                                '</div>' +
                                '<div class="col-lg-4">' +
                                '<div class="exam-label">Last Date:</div>' +
                                '<div class="last-date"> '+entrance.last_date+' </div>' +
                                '</div>' +
                                '</div>' +
                                '<a href=" '+entrance.url+' " target="blank">' +
                                '<div class="arrow"></div>' +
                                '</a>' +
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
                url: '{{ route('user.entrance.get_entranceexam_by_category') }}',
                data: {
                    'cat_id': category_id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#entrance_exam').empty();
                    if (response.category.length == 0) {
                        $('#entrance_exam').append(
                            '<p>No Exams Found.</p>'
                        );
                    } else {
                        $.each(response.category, function(key, entrance) {
                            $('#entrance_exam').append(
                                '<div class="exam-card">' +
                                '<div class="icon" style="background-color: #ffeb3b;">📄</div>' +
                                '<div class="exam-info">' +
                                '<div class="col-lg-4">' +
                                '<div class="exam-label">Exam Name:</div>' +
                                '<div class="exam-name"> '+entrance.exam_name+' </div>' +
                                '</div>' +
                                '<div class="col-lg-4">' +
                                '<div class="exam-label">Form Issue Date:</div>' +
                                '<div class="form-issue-date"> '+entrance.issue_date+' </div>' +
                                '</div>' +
                                '<div class="col-lg-4">' +
                                '<div class="exam-label">Last Date:</div>' +
                                '<div class="last-date"> '+entrance.last_date+' </div>' +
                                '</div>' +
                                '</div>' +
                                '<a href=" '+entrance.url+' " target="blank">' +
                                '<div class="arrow"></div>' +
                                '</a>' +
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
                                '<div class="exam-name"> '+entrance.exam_name+' </div>' +
                                '</div>' +
                                '<div class="col-lg-4">' +
                                '<div class="exam-label">Form Issue Date:</div>' +
                                '<div class="form-issue-date"> '+entrance.issue_date+' </div>' +
                                '</div>' +
                                '<div class="col-lg-4">' +
                                '<div class="exam-label">Last Date:</div>' +
                                '<div class="last-date"> '+entrance.last_date+' </div>' +
                                '</div>' +
                                '</div>' +
                                '<a href=" '+entrance.url+' " target="blank">' +
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
