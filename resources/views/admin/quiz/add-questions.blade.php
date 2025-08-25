@extends('admin.layouts.app')
@section('panel')
    {{-- <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.quiz.Store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('Question')</label>
                                    <input type="text" name="question" id="name" value="{{ old('question') }}"
                                        class="form-control" placeholder="@lang('Question')" required>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Option 1')</label>
                                    <input step="any" type="text" name="option1" id="price"
                                        value="{{ old('option1') }}" class="form-control" placeholder="@lang('Option 1')"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Option 2')</label>
                                    <input step="any" type="text" name="option2" id="price"
                                        value="{{ old('option2') }}" class="form-control" placeholder="@lang('Option 2')"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Option 3')</label>
                                    <input step="any" type="text" name="option3" id="price"
                                        value="{{ old('option3') }}" class="form-control" placeholder="@lang('Option 3')"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Option 4')</label>
                                    <input step="any" type="text" name="option4" id="price"
                                        value="{{ old('option4') }}" class="form-control" placeholder="@lang('Option 4')"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Correct Answer')</label>
                                    <input step="any" type="text" name="correct_answer" id="price"
                                        value="{{ old('correct_answer') }}" class="form-control"
                                        placeholder="@lang('Correct Answer')" required>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="col-lg-12 ">
                    <div class="form-group float-end p-3">
                        <button type="submit" class="btn btn--primary btn-block btn-lg"> @lang('Create')</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div> --}}

    <div class="card">
        <div class="card-header header-elements-inline">
            <h4 class="card-title">Add Question for the Quiz: {{ $quiz_list->title }}</h4>
            {{-- @dd($quiz_list) --}}
        </div>
        <div class="card-body">
            <div class="text-center">
                <div>
                    <form method="post" action="{{ route('admin.store.question') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" placeholder="Question" name="question" required class="form-control">
                        </div>
                        <input type="hidden" name="quiz_id" value="{{ $quiz_id }}" readonly required>
                        <div class="form-group">
                            <input type="text" placeholder="Option A" name="option_a" required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Option B" name="option_b" required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Option C" name="option_c" required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Option D" name="option_d" required class="form-control">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="correct_option" required>
                                <option selected disabled value>-- Select Correct Option --</option>
                                <option value="option_a">A</option>
                                <option value="option_b">B</option>
                                <option value="option_c">C</option>
                                <option value="option_d">D</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h4 class="card-title">Question List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table datatable-save-state">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">A</th>
                            <th scope="col">B</th>
                            <th scope="col">C</th>
                            <th scope="col">D</th>
                            <th scope="col">Correct</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($questions as $question)
                            <tr>
                                <th scope="row">{{ $sl++ }}</th>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->option_a }}</td>
                                <td>{{ $question->option_b }}</td>
                                <td>{{ $question->option_c }}</td>
                                <td>{{ $question->option_d }}</td>
                                <td>{{ $question->correct_option }}</td>
                                <td>
                                    <a href="{{ route('admin.edit.question', $question->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a onclick="confirmDelete('{{ route('admin.delete.question', $question->id) }}')"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.add.quiz') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
            class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush

@push('script')
    {{-- <script>
        (function($) {
            "use strict";

            var fileAdded = 0;
            $('.addPlanContent').on('click', function() {

                $("#planContent").append(`
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                            <input type="text" name="contents[]" id="content" value="{{ old('contents.0') }}" class="form-control" placeholder="@lang('Content')">
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn--danger planContentDelete"><i class="la la-times ms-0"></i></button>
                        </div>
                    </div>
                `)
            });

            $(document).on('click', '.planContentDelete', function() {
                fileAdded--;
                $(this).closest('.row').remove();
            });
        })(jQuery);
    </script> --}}

    <script>
        function correctAnswer() {
            let a = document.getElementsByName('option_a')
            alert('a');
        }
    </script>

    <script>
        function confirmDelete(deleteUrl) {
            var isConfirmed = confirm("Are You Sure You Want to Delete This Item ?")
            if (isConfirmed) {
                window.location.href = deleteUrl;
            } else {
                alert("Deletion canceled");
            }
        }
    </script>

@endpush
