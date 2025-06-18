@extends($activeTemplate . 'layouts.master')

 <style>

    

    .page-wrapper {
      position: relative;
      overflow: hidden;
    }

    .scroll-container {
       
        padding: 20px 0;
    }

    .content-area {
        padding-left: 20px;
    }

    .nav-pills .nav-link.active {
        background-color: #0d6efd !important;
        color: #fff !important;
    }

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
    .nav-tabs-box {
        display: flex;
        flex-wrap: wrap;
        border: none;
        gap: 10px;
    }

    .nav-tabs-box .nav-link {
        background-color: #c8cacc;
        
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px 20px;
        color: #343a40;
        transition: all 0.3s ease;
        font-weight: 500;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
    }

    .nav-tabs-box .nav-link:hover {
        background-color: #a0a6ac;
        color: #212529;
    }

    .nav-tabs-box .nav-link.active {
        background-color: #545657;
        
        color: #868181 !important;
        border-color: #495057;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
    }
</style>
<style>
    .career-section__table {
        width: 100%;
        border-collapse: separate !important;
        border-spacing: 0 !important;
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        background-color: #fff;
        overflow: hidden;
        margin-bottom: 2rem;
        transition: box-shadow 0.3s ease;
    }

    .career-section__table:hover {
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
    }

    .career-section__table thead.thead-light th {
        background-color: #f1f3f5;
        color: #212529;
        font-weight: 600;
        font-size: 16px;
        padding: 1rem;
        text-align: center;
        border-bottom: 2px solid #dee2e6;
    }

    .career-section__table th,
    .career-section__table td {
        padding: 0.85rem 1rem;
        text-align: center;
        vertical-align: middle;
        font-size: 15px;
        border: 1px solid #dee2e6;
    }

    .career-section__table tbody tr:nth-child(even) {
        background-color: #fafafa;
    }

    .career-section__table tbody tr:hover {
        background-color: #f0f0f0;
    }

   
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .nav-pills .nav-link.active {
        background-color: #0d6efd !important;
        color: #fff !important;
        box-shadow: 0 0.25rem 0.5rem rgba(13, 110, 253, 0.2) !important;
    }

    .nav-link {
        color: #151516 !important;
    }

    .nav-pills .nav-link {
        transition: background-color 0.2s ease-in-out, color 0.2s !important;
    }

    .nav-pills .nav-link:hover {
        background-color: #177de2 !important;
        color: #fff !important;
    }

    section {
        scroll-margin-top: 100px;
    }


    .sticktop{
        position:fixed !important;
        top:80px !important;
        left:auto !important;
        right:auto !important;
        
    } 

</style>

@section('content')
    <div class="page-wrapper">
        <div class="scroll-container">
            <div class="container">
                <div class="row pt-4 pb-4" style="background-color: rgba(33, 113, 138, .89); border-radius:8px; color:#fff">
                    <div class="col-md-8">
                        <div class="summary">
                            <h3 style="color: #f8be14"> {{ $viewSubcategory->title }} </h3>
                            <h5 class="summary mb-4" style="color:#fff">Summary</h5>
                            <p style="color:#fff"> {{ $viewSubcategory->description }} </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="opportunity-meter mt-5">
                            <img src="{{ asset('subcategory/' . $viewSubcategory->file) }}" style="border-radius: 5px">
                        </div>
                    </div>
                </div>
                <div class="row mt-5 align-items-stretch">
                    <!-- Left Navigation Column -->
                    <div class="col-md-3" style="height:100%;">
                        <div class="sticky-nav" id="sticky-nav"  style="height:100%; width:300px">
                            <div class="card shadow-sm rounded-3">
                                <div class="card-body p-2">
                                    <ul class="nav flex-column nav-pills gap-2" id="careerNav" >
                                        <li class="nav-item" style="border-bottom:1px dotted #c0c0c0;">
                                            <a class="nav-link fw-semibold" href="#path">Path</a>
                                        </li>
                                        <li class="nav-item" style="border-bottom:1px dotted #c0c0c0;">
                                            <a class="nav-link fw-semibold" href="#entrance-exams">Entrance Exams</a>
                                        </li>
                                        <li class="nav-item" style="border-bottom:1px dotted #c0c0c0;">
                                            <a class="nav-link fw-semibold" href="#job-scopes">Job Scopes</a>
                                        </li>
                                        <li class="nav-item" style="border-bottom:1px dotted #c0c0c0;">
                                            <a class="nav-link fw-semibold" href="#salary-range">Salary Range</a>
                                        </li>
                                        <li class="nav-item"style="border-bottom:1px dotted #c0c0c0;">
                                            <a class="nav-link fw-semibold" href="#top-institutes-in-odisha">
                                                Top Institutes In
                                                @if (Auth::user()->state)
                                                    {{ Auth::user()->state->name }}
                                                @endif
                                            </a>
                                        </li>
                                        <li class="nav-item" >
                                            <a class="nav-link fw-semibold" href="#top-institutes-outside-odisha">
                                                Top Institutes Outside
                                                @if (Auth::user()->state)
                                                    {{ Auth::user()->state->name }}
                                                @endif
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Content Column -->
                    <div class="col-md-9 content-area" style="width:70%;margin-left:30px">
                        <!-- Path Section -->
                        <section id="path" >
                            <div class="mt-5" style="margin-top:0px!important">
                                <h4 class="career-section__heading mb-4">
                                    <img class="career-section__heading-icon"
                                        src="https://www.mindler.com/assets/careerLibrary/img/my-icon-3.jpg" alt="Icon">
                                    <span class="js--careerPathName">How to Become <b
                                            style="color: rgb(155, 40, 25);">{{ $viewSubcategory->title }}</b></span>
                                </h4>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-bordered career-section__table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Path</th>
                                            <th>Stream</th>
                                            <th>Graduation</th>
                                            <th>After Graduation</th>
                                            <th>After Post Graduation</th>
                                            <th>Any Other</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paths as $index => $path)
                                            <tr>
                                                <th><p>Path {{ $index + 1 }}</p></th>
                                                <td><p>{{ $path->stream ?? '-' }}</p></td>
                                                <td><p>{{ $path->graduation ?? '-' }}</p></td>
                                                <td><p>{{ $path->after_graduation ?? '-' }}</p></td>
                                                <td><p>{{ $path->after_pgraduation ?? '-' }}</p></td>
                                                <td><p>{{ $path->anyother ?? '-' }}</p></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>

                        <!-- Entrance Exams Section -->
                        <section id="entrance-exams" class="mt-5">
                            <h5>Entrance Exams</h5>
                            @foreach ($entrances as $entrance)
                                <div class="exam-card">
                                    <div class="icon" style="background-color: #ffeb3b;">📄</div>
                                    <div class="exam-info row">
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
                                    <a href="{{ $entrance->url }}" target="_blank">
                                        <div class="arrow"></div>
                                    </a>
                                </div>
                            @endforeach
                        </section>

                        <!-- Job Scopes Section -->
                        <section id="job-scopes" class="mt-5">
                            <h5 class="text-lg font-semibold mb-3 border-b-2 pb-2">Job Scopes</h5>
                            <div class="row">
                                @foreach ($job_scopes as $job_scope)
                                    <div class="mb-2">
                                        <i class="fas fa-long-arrow-alt-right text-warning"></i>
                                        <strong class="text-dark"
                                            style="font-size: 14px; ">{{ $job_scope->name }}</strong>
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        <!-- Salary Range Section -->
                        <section id="salary-range" class="mt-5">
                            <h5 class="text-lg font-semibold mb-3 border-b-2 pb-2">Salary Range</h5>
                            <div class="row">
                                @foreach ($salary_range as $salary)
                                    <div class="mb-2">
                                        <strong class="text-dark" style="font-size: 14px;">
                                            <i class="fas fa-arrow-right text-danger"></i> {{ $salary->salary }}
                                        </strong>
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        <!-- Top Institutes In -->
                        <section id="top-institutes-in-odisha" class="mt-5">
                            <h5>Top Institutes in {{ Auth::user()->state->name ?? '' }}</h5>
                            @if ($institutions->isEmpty())
                                <div class="mt-5 text-center">
                                    <h6>No institutions are available in your state.</h6>
                                </div>
                            @else
                                <div class="row">
                                    @foreach ($institutions as $institution)
                                        <div class="col-lg-4 mb-3">
                                            <div class="card">
                                                <div class="card-head mb-3">
                                                    <div class="status-1">
                                                        <span class="circle"></span>
                                                        {{ $institution->institute_type == 0 ? 'Goverment' : 'Private' }}
                                                    </div>
                                                </div>
                                                <div class="card-title">
                                                    <img src="{{ asset('institution/' . $institution->logo) }}"
                                                        style="height: 60px; width:60px; border-radius:20px">
                                                </div>
                                                <div class="card-title"> {{ $institution->name }} </div>
                                                <div class="card-info mt-3">
                                                    <div>
                                                        <div class="label"><a href="{{ $institution->url }}"
                                                                target="_blank">Visit Now</a></div>
                                                    </div>
                                                    <div class="text-end">
                                                        <div class="label">Tentative Date</div>
                                                        <div class="value">
                                                            {{ \Carbon\Carbon::parse($institution->tentative_date)->format('F Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </section>

                        <!-- Top Institutes Outside -->
                        <section id="top-institutes-outside-odisha" class="mt-5">
                            <h5>Top Institutes outside {{ Auth::user()->state->name ?? '' }}</h5>
                            <div class="mt-3 mb-3">
                                <label class="form-label">Filters :</label>
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

                            @if ($outside_institution->isEmpty())
                                <div class="mt-5 text-center">
                                    <h6>No institutions are available outside state.</h6>
                                </div>
                            @else
                                <div class="row" id="institution-list">
                                    @foreach ($outside_institution as $institutions)
                                        <div class="col-lg-4 mb-3">
                                            <div class="card">
                                                <div class="card-head mb-3 d-flex justify-content-between">
                                                    <div class="status-1">
                                                        <span class="circle"></span>
                                                        {{ $institutions->institute_type == 0 ? 'Goverment' : 'Private' }}
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
                                                    <div class="text-end">
                                                        <div class="label">Tentative Date</div>
                                                        <div class="value">
                                                            {{ \Carbon\Carbon::parse($institutions->tentative_date)->format('F Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-3">
                                    {{ $outside_institution->links() }}
                                </div>
                            @endif
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {
    const stickysidebar = document.querySelector("#sticky-nav");

    window.addEventListener("scroll", function () {
        if (document.body.scrollTop > 500) {
            stickysidebar.classList.add("sticktop");
        }else {
            stickysidebar.classList.remove("sticktop");
        }

    });
 });



</script> --}}



 <script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('#careerNav .nav-link');
        const scrollContainer = document.querySelector('.scroll-container');
        const OFFSET = 20; // Adjust this value based on your needs

        // Handle navigation click events
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetSection = document.querySelector(targetId);

                if (targetSection) {
                    // Remove active class from all links
                    navLinks.forEach(navLink => navLink.classList.remove('active'));
                    // Add active class to clicked link
                    this.classList.add('active');

                    // Scroll to the section
                    targetSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Update active navigation item on scroll
        scrollContainer.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section');
            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollContainer.scrollTop >= (sectionTop - 100)) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${currentSection}`) {
                    link.classList.add('active');
                }
            });
        });
    });
</script> --}}



 <script>
    $(document).ready(function() {
        var subcategory_id = '{{ $subcategory_id }}';
        console.log(subcategory_id);

        $(document).on('change', '#country', function() {
            var country_id = $(this).val();
            console.log(subcategory_id);
            $.ajax({
                type: "POST",
                url: '{{ route('user.viewInstitution') }}',
                data: {
                    'country_id': country_id,
                    'subcategory_id': subcategory_id,
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
                                '<img src="{{ asset('institution') }}/' +
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

<script>
    $(document).ready(function() {
        var subcategory_id = '{{ $subcategory_id }}';

        $(document).on('change', '#state', function() {
            var state_id = $(this).val();
            $.ajax({
                type: "POST",
                url: '{{ route('user.viewState') }}',
                data: {
                    'state_id': state_id,
                    'subcategory_id': subcategory_id,
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
                                '<img src="{{ asset('institution') }}/' +
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

<script>
    $(document).ready(function() {
        var subcategory_id = '{{ $subcategory_id }}';

        $(document).on('change', '#institutionType', function() {
            var institute_type = $(this).val();
            $.ajax({
                type: "POST",
                url: '{{ route('user.viewType') }}',
                data: {
                    'institute_type': institute_type,
                    'subcategory_id': subcategory_id,
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
                                '<img src="{{ asset('institution') }}/' +
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