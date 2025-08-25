@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.entrance.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Module')</label>
                                    <select name="module_id" class="form-control" required>
                                        <option value="">Select Module</option>
                                        @foreach ($modules as $module)
                                            <option value="{{ $module->id }}"> {{ $module->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('Stream')</label>
                                    <select class="form-control" name="stream_id" id="stream" required>
                                        <option value="">Select</option>
                                        @foreach ($streams as $stream)
                                            <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Category')</label>
                                    <select name="category_id" id="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('2nd Category')</label>
                                    <select class="form-control" name="category2_id" id="category2" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Subcategory')</label>
                                    <select name="subcategory_id" id="subcategory" class="form-control" required>
                                        <option value="">Select Subcategory</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Exam Name')</label>
                                    <input type="text" name="exam_name" value="{{ old('exam_name') }}"
                                        class="form-control" placeholder="@lang('Exam Name')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Issue Date')</label>
                                    <input type="text" name="issue_date" value="{{ old('issue_date') }}"
                                        class="form-control" placeholder="@lang('Issue Date')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Last Date')</label>
                                    <input type="text" name="last_date" value="{{ old('last_date') }}"
                                        class="form-control" placeholder="@lang('Last Date')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('URL')</label>
                                    <input type="text" name="url" value="{{ old('url') }}" class="form-control"
                                        placeholder="@lang('URL')" required>
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="form-group float-end p-3">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">
                                        @lang('Create')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('breadcrumb-plugins')
        <a href="{{ route('admin.entrance.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="las la-angle-double-left"></i>@lang('Go Back')</a>
    @endpush

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#stream').on('change', function() {
                var stream = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '{{ route('admin.fetchCategory') }}',
                    data: {
                        'stream': stream,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(responce) {
                        $('#category').empty();
                        $('#category').html('<option value="">Choose</option>');
                        $.each(responce, function(key, value) {
                            $('#category').append('<option value=" ' + value.id +
                                ' ">' + value.title + '</option>')
                        });
                    },
                });
            });
            $('#category').on('change', function() {
                var category = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.fetch2ndCategory') }}',
                    data: {
                        'category': category,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(responce) {
                        $('#category2').empty();
                        $('#category2').html('<option value="">Choose</option>');
                        $.each(responce, function(key, value) {
                            $('#category2').append('<option value="' + value.id + '">' +
                                value.name + '</option>')
                        });
                    },
                });
            });

            $('#category2').on('change', function() {
                var category2 = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.fetchSubcategory') }}',
                    data: {
                        'category2': category2,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(responce) {
                        $('#subcategory').empty();
                        $('#subcategory').html('<option value="">Choose</option>');
                        $.each(responce, function(key, value) {
                            $('#subcategory').append('<option value="' + value.id +
                                '">' + value.title + '</option>')
                        });
                    },
                });
            });
        });
    </script>
