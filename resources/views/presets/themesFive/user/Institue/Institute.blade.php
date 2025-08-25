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

@section('content')
    <div class="body-wrapper">
        <div class="container mt-3 mb-5">
            <div class="mt-5">
                <div>
                    <div class="mt-3 mb-3">
                        <div style="background-color: #fff; padding:10px; border-radius:10px;">
                            <label for="" class="form-label">Filters :</label>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="country" class="form-label">Country :</label>
                                    <select id="country" class="form-select">
                                        <option value="">Choose Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"> {{ $country->name }} </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label for="state" class="form-label">State :</label>
                                    <select id="state" class="form-select">
                                        <option value="">Choose State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"> {{ $state->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="institutionType" class="form-label">Institution Type :</label>
                                    <select id="institutionType" class="form-select">
                                        <option value="">Choose Institution Type</option>
                                        <option value="0">Goverment</option>
                                        <option value="1">Private</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($institute->isEmpty())
                        <div class="mt-5" style="text-align: center">
                            <h6>No institutions are available in your district.</h6>
                        </div>
                    @else
                        <div class="row" id="institution-list">
                            @foreach ($institute as $institutee)
                                @foreach ($institutee as $institutions)
                                    <div class="col-lg-4 mb-3">
                                        <div class="card">
                                            <div class="card-head mb-3">
                                                <div class="status-1">
                                                    <span class="circle"></span>
                                                    @if ($institutions->institute_type == 0)
                                                        Goverment
                                                    @else
                                                        Private
                                                    @endif
                                                </div>
                                                <div class="status-2">
                                                    <a href="{{ $institutions->url }}" target="_blank">
                                                        <i class="fas fa-arrow-right"
                                                            style="transform: rotate(-50deg);"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-title">
                                                <img src="{{ asset('institution/' . $institutions->logo) }}"
                                                    style="height: 60px; width:60px; border-radius:20px">
                                            </div>
                                            <div class="card-title"> {{ $institutions->name }} </div>
                                            <div class="card-info mt-3">
                                                <div>
                                                    <div class="label">Admission via</div>
                                                    <div class="value"> {{ $institutions->admission_process }} </div>
                                                </div>
                                                <div style="text-align:right;">
                                                    <div class="label">Tentative Date</div>
                                                    <div class="value">
                                                        {{ \Carbon\Carbon::parse($institutions->tentative_date)->format('F Y') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        {{-- <div class="mt-3">
                            {{ $institute->links() }}
                        </div> --}}
                    @endif
                </div>
            </div>
        </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#country', function() {
                var country_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.institute.country') }}",
                    data: {
                        'country_id': country_id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#institution-list').empty();
                        if (response.length === 0) {
                            $('#institution-list').append(
                                '<div class="col-12 text-center mt-5"><h6>No institutions are available in this selected Country.</h6></div>'
                            );
                        } else {
                            $.each(response, function(key, institution) {
                                var institutionCard = '<div class="col-lg-4 mb-3">' +
                                    '<div class="card">' +
                                    '<div class="card-head mb-3">' +
                                    '<div class="status-1">' +
                                    '<span class="circle"></span>' +
                                    (institution.institute_type == 0 ? 'Government' :
                                        'Private') +
                                    '</div>' +
                                    '<div class="status-2">' +
                                    '<a href="' + institution.url +
                                    '" target="_blank">' +
                                    '<i class="fas fa-arrow-right" style="transform: rotate(-50deg);"></i>' +
                                    '</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="card-title">' +
                                    '<img src="{{ asset('Institution') }}/' +
                                    institution.logo +
                                    '" style="height: 60px; width:60px; border-radius:20px">' +
                                    '</div>' +
                                    '<div class="card-title">' + institution.name +
                                    '</div>' +
                                    '<div class="card-info mt-3">' +
                                    '<div>' +
                                    '<div class="label">Admission via</div>' +
                                    '<div class="value">' + institution
                                    .admission_process + '</div>' +
                                    '</div>' +
                                    '<div style="text-align:right;">' +
                                    '<div class="label">Tentative Date</div>' +
                                    '<div class="value">' + institution.tentative_date +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                $('#institution-list').append(institutionCard);
                            });
                        }
                        $('.pagination').hide();
                    },
                });
            });

            $(document).on('change', '#state', function() {
                var state_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '{{ route('user.institute.state') }}',
                    data: {
                        'state_id': state_id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#institution-list').empty();
                        if (response.length === 0) {
                            $('#institution-list').append(
                                '<div class="col-12 text-center mt-5"><h6>No institutions are available in this selected State</h6></div>'
                            );
                        } else {
                            $.each(response, function(key, institution) {
                                var institutionCard = '<div class="col-lg-4 mb-3">' +
                                    '<div class="card">' +
                                    '<div class="card-head mb-3">' +
                                    '<div class="status-1">' +
                                    '<span class="circle"></span>' +
                                    (institution.institute_type == 0 ? 'Government' :
                                        'Private') +
                                    '</div>' +
                                    '<div class="status-2">' +
                                    '<a href="' + institution.url +
                                    '" target="_blank">' +
                                    '<i class="fas fa-arrow-right" style="transform: rotate(-50deg);"></i>' +
                                    '</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="card-title">' +
                                    '<img src="{{ asset('Institution') }}/' +
                                    institution.logo +
                                    '" style="height: 60px; width:60px; border-radius:20px">' +
                                    '</div>' +
                                    '<div class="card-title">' + institution.name +
                                    '</div>' +
                                    '<div class="card-info mt-3">' +
                                    '<div>' +
                                    '<div class="label">Admission via</div>' +
                                    '<div class="value">' + institution
                                    .admission_process + '</div>' +
                                    '</div>' +
                                    '<div style="text-align:right;">' +
                                    '<div class="label">Tentative Date</div>' +
                                    '<div class="value">' + institution.tentative_date +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                $('#institution-list').append(institutionCard);
                            });
                        }
                        $('.pagination').hide();
                    },
                });
            });

            $(document).on('change', '#institutionType', function() {
                var institute_type = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '{{ route('user.institute.inst_type') }}',
                    data: {
                        'institute_type': institute_type,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#institution-list').empty();
                        if (response.length === 0) {
                            $('#institution-list').append(
                                '<div class="col-12 text-center mt-5"><h6>No institutions are available in this selected Institute Type.</h6></div>'
                            );
                        } else {
                            $.each(response, function(key, institution) {
                                var institutionCard = '<div class="col-lg-4 mb-3">' +
                                    '<div class="card">' +
                                    '<div class="card-head mb-3">' +
                                    '<div class="status-1">' +
                                    '<span class="circle"></span>' +
                                    (institution.institute_type == 0 ? 'Government' :
                                        'Private') +
                                    '</div>' +
                                    '<div class="status-2">' +
                                    '<a href="' + institution.url +
                                    '" target="_blank">' +
                                    '<i class="fas fa-arrow-right" style="transform: rotate(-50deg);"></i>' +
                                    '</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="card-title">' +
                                    '<img src="{{ asset('Institution') }}/' +
                                    institution.logo +
                                    '" style="height: 60px; width:60px; border-radius:20px">' +
                                    '</div>' +
                                    '<div class="card-title">' + institution.name +
                                    '</div>' +
                                    '<div class="card-info mt-3">' +
                                    '<div>' +
                                    '<div class="label">Admission via</div>' +
                                    '<div class="value">' + institution
                                    .admission_process + '</div>' +
                                    '</div>' +
                                    '<div style="text-align:right;">' +
                                    '<div class="label">Tentative Date</div>' +
                                    '<div class="value">' + institution.tentative_date +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                $('#institution-list').append(institutionCard);
                            });
                        }
                        $('.pagination').hide();
                    },
                });
            });
        });
    </script>
