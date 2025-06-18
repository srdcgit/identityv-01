@extends($activeTemplate . 'layouts.master')


@section('content')
    {{-- <div class="body-wrapper">
        <div class="container mt-3 mb-5">
            <div class="mt-5">
                <div style="background-color: #fff; padding:10px; border-radius:10px;">
                    <div class="row g-3">
                        <div class="container mt-5">
                            <h1 class="text-center">Quiz</h1>

                            <form id="quizForm">
                                <div class="container">
                                @foreach ($quizs as $key => $quiz)
                                    <div class="mb-4">
                                        <h4>{{ $key + 1 }} . {{ $quiz->question }}</h4>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q1" id="q1a"
                                                value="A">
                                            <label class="form-check-label" for="q1a">A.
                                                {{ $quiz->option1 }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q2" id="q1b"
                                                value="B">
                                            <label class="form-check-label" for="q1b">B.
                                                {{ $quiz->option2 }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q3" id="q1c"
                                                value="C">
                                            <label class="form-check-label" for="q1c">C.
                                                {{ $quiz->option3 }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q4" id="q1c"
                                                value="D">
                                            <label class="form-check-label" for="q1c">D.
                                                {{ $quiz->option4 }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                            <!-- Result -->
                            <div id="result" class="mt-4 text-center" style="display:none;">
                                <h3>Your Score: <span id="score"></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-12">
                <div class="card card-body">

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> Do not refresh the page or navigate away, your progress will be lost.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="media mb-0">
                        <div class="media-body col-lg-4">
                            <h4 class="font-weight-semibold mb-0 ">
                                Quiz Title: {{ $quiz->title }}
                            </h4>
                        </div>
                        <div class="media-body col-lg-4">
                            <h4 class="font-weight-semibold mb-0 text-center">
                                Timer: <div id="timer_style"><label id="minutes">00</label>:<label
                                        id="seconds">00</label>
                                </div>
                            </h4>
                        </div>
                        <div class="media-body col-lg-4">
                            <h5 class="font-weight-semibold mb-0 text-right">
                                Exam Time: {{ $quiz->duration }} Minutes
                            </h5>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('user.quiz.store.answer') }}">
                            @csrf
                            {{-- <input type="hidden" name="quiz_id" value="{{ $quizs->id }}"> --}}
                            <div class="tab-content">
                                @php $i = 0; @endphp
                                @foreach ($quizs as $question)
                                    <div class="tab-pane fade @if ($i === 0) show active @endif"
                                        id="question{{ $i }}" role="tabpanel">
                                        <div id="question">
                                            {{-- @dd($question) --}}
                                            <h5 style="text-align:left;">Question {{ $i + 1 }} :
                                                {{ $question->question }}</h5>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="answer[{{ $i + 1 }}]" value="option_a" >
                                                        <label class="form-check-label">{{ $question->option1 }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="answer[{{ $i + 1 }}]" value="option_b" >
                                                        <label class="form-check-label">{{ $question->option2 }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="answer[{{ $i + 1 }}]" value="option_c" >
                                                        <label class="form-check-label">{{ $question->option3 }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="answer[{{ $i + 1 }}]" value="option_d" >
                                                        <label class="form-check-label">{{ $question->option4 }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                            </div>

                            <div class="quiz-navigation mt-3" style="text-align: center;">
                                <button type="button" class="btn btn-secondary prev-question"
                                    style="float: left;">Previous</button>
                                <button type="button" class="btn btn-primary next-question"
                                    style="float: right;">Next</button>
                                {{-- <button type="submit" class="btn btn-success submit-quiz"
                                    style="margin: 0 auto;">Submit</button> --}}
                                <button type="submit" class="btn btn-success submit-quiz"
                                    style="margin: 0 auto; display: none;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Questions ({{ count($quizs) }})</h5>
                        <ul class="nav nav-pills" id="pills-tab" role="tablist"
                            style="max-height: 130px; overflow-y: auto;">
                            @php $i = 0; @endphp
                            @foreach ($quizs as $key => $question)
                                <li class="nav-item">
                                    <a class="nav-link @if ($key === 0) active @endif"
                                        id="pills-question{{ $i }}-tab" data-toggle="pill"
                                        href="#question{{ $i }}" role="tab"
                                        style="padding: 6px 11px;">{{ $key + 1 }}</a>
                                </li>

                                @php $i++; @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            var totalQuestions = {{ count($quizs) }};
            var currentQuestion = 0;

            function showQuestion(index) {
                $('.tab-pane').removeClass('show active');
                $('#question' + index).addClass('show active');
                $('.nav-link').removeClass('active');
                $('#pills-question' + index + '-tab').addClass('active');
            }

            $('.next-question').click(function() {
                if (currentQuestion < totalQuestions - 1) {
                    currentQuestion++;
                    showQuestion(currentQuestion);
                }
            });

            $('.prev-question').click(function() {
                if (currentQuestion > 0) {
                    currentQuestion--;
                    showQuestion(currentQuestion);
                }
            });

            $('.nav-link').click(function() {
                var index = $(this).parent().index();
                currentQuestion = index;
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            var totalQuestions = {{ count($quizs) }}; // Total number of questions
            var currentQuestion = 0; // Index of the current question

            // Function to display the current question
            function showQuestion(index) {
                // Remove 'show active' class from all question tabs and hide them
                $('.tab-pane').removeClass('show active');
                // Show the current question tab
                $('#question' + index).addClass('show active');

                // Update the active state of navigation tabs
                $('.nav-link').removeClass('active');
                $('#pills-question' + index + '-tab').addClass('active');

                // Manage visibility of Previous, Next, and Submit buttons
                if (index === 0) {
                    $('.prev-question').hide(); // Hide the Previous button on the first question
                } else {
                    $('.prev-question').show(); // Show the Previous button otherwise
                }

                if (index === totalQuestions - 1) {
                    $('.next-question').hide(); // Hide the Next button on the last question
                    $('.submit-quiz').show(); // Show the Submit button on the last question
                } else {
                    $('.next-question').show(); // Show the Next button if not the last question
                    $('.submit-quiz').hide(); // Hide the Submit button if not the last question
                }
            }

            // Show the first question when the page loads
            showQuestion(currentQuestion);

            // Next button click event handler
            $('.next-question').click(function() {
                if (currentQuestion < totalQuestions - 1) {
                    currentQuestion++;
                    showQuestion(currentQuestion); // Move to the next question
                }
            });

            // Previous button click event handler
            $('.prev-question').click(function() {
                if (currentQuestion > 0) {
                    currentQuestion--;
                    showQuestion(currentQuestion); // Move to the previous question
                }
            });

            // Navigation tab click event handler (if using tab links for navigation)
            $('.nav-link').click(function() {
                var index = $(this).parent().index(); // Get the index of the clicked tab
                currentQuestion = index; // Update the current question
                showQuestion(currentQuestion); // Show the corresponding question
            });
        });
    </script>
@endsection
