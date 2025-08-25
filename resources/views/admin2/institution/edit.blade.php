@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.institution.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id" value="{{$edit->id}}">
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="module_id" class="font-weight-bold">@lang('Module')</label>
                                    <select class="form-control" name="module_id">
                                        <option value="">Select Module</option>
                                        @foreach ($modules as $module)
                                            <option {{( $edit->module_id == $module->id) ? 'selected' : ''}} value="{{ $module->id }}"> {{ $module->title }} </option>
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
                                            <option value="{{ $stream->id }}" {{ ($stream->id == $edit->stream_id)? 'selected' : '' }}>{{ $stream->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Category')</label>
                                    <select name="category_id" id="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option {{($edit->category_id == $category->id)? 'selected': ''}} value="{{ $category->id }}"> {{ $category->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('2nd Category')</label>
                                    <select class="form-control" name="category2_id" id="category2" required>
                                        <option value="">Select</option>
                                        @foreach ($category2 as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $edit->category2_id ? 'selected' : '' }}>
                                                {{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Subcategory')</label>
                                    <select name="subcategory_id" id="subcategory" class="form-control" required>
                                        <option value="">Select Subcategory</option>
                                        @foreach ($subcategories as $subcategory)
                                        <option {{ $edit->subcategory_id == $subcategory->id ? 'selected' : '' }}
                                            value="{{ $subcategory->id }}"> {{ $subcategory->title }} </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div> --}}

                           

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Institution Name')</label>
                                    <input type="text" name="name" value="{{ $edit->name }}" class="form-control"
                                        placeholder="@lang('Institution Name')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('Logo')</label>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                    {{-- <img src="{{ asset('Institution/' . $edit->logo) }}" width="100"
                                                alt=""> --}}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address" class="font-weight-bold">@lang('Address')</label>
                                    <input type="text" name="address" value="{{ $edit->address }}" class="form-control"
                                        placeholder="@lang('Address')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="admission" class="font-weight-bold">@lang('Addmission Process')</label>
                                    <input type="text" name="admission_process" value="{{ $edit-> admission_process }}"
                                        class="form-control" placeholder="@lang('Addmission Process')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tentative" class="font-weight-bold">@lang('Tentative Date')</label>
                                    <input type="month" name="tentative_date" value="{{ $edit->tentative_date }}"
                                        class="form-control" placeholder="@lang('Tentative Date')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="institution_type" class="font-weight-bold">@lang('Institution Type')</label>
                                    <div style="display: flex; align-items: center;">
                                        <input type="radio" id="govt" name="institute_type" {{( $edit->institute_type == 0) ? 'checked' : ''}} value="0"
                                            style="margin-right: 5px;">
                                        <label for="govt" style="margin-right: 15px;">Govt.</label>

                                        <input type="radio" id="pvt" name="institute_type" {{($edit->institute_type == 1) ? 'checked' : ''}} value="1"
                                            style="margin-right: 5px;">
                                        <label for="pvt">Pvt.</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="url" class="font-weight-bold">@lang('URL')</label>
                                    <input type="text" name="url" value="{{ $edit->url }}" class="form-control"
                                        placeholder="@lang('URL')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="country" class="font-weight-bold">@lang('Country')</label>
                                    <select class="form-control" name="country_id" id="country">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option {{($edit->country_id == $country->id)? 'selected' : ''}} value="{{ $country->id }}"> {{ $country->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="state" class="font-weight-bold">@lang('State')</label>
                                    <select class="form-control" name="state_id" id="getState">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option {{($edit->state_id == $state->id)? 'selected' : ''}} value="{{ $state->id }}"> {{ $state->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="district" class="font-weight-bold">@lang('District')</label>
                                    <select class="form-control" name="dist_id" id="getDistrict">
                                        <option value="">Select District</option>
                                        @foreach ($districts as $dist)
                                            <option {{($edit->dist_id == $dist->id)? 'selected' : ''}} value="{{ $dist->id }}"> {{ $dist->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Is_Top" class="font-weight-bold">@lang('Is Top')</label>
                                    <div style="display: flex; align-items: center;">
                                        <input type="radio" id="yes" name="is_top" value="1" {{ ($edit->is_top == 1) ? 'checked':'' }}
                                            style="margin-right: 5px;">
                                        <label for="yes" style="margin-right: 15px;">Yes</label>

                                        <input type="radio" id="no" name="is_top" value="0" {{ ($edit->is_top == 0) ? 'checked':'' }}
                                            style="margin-right: 5px;">
                                        <label for="no">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="form-group float-end p-3">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">
                                        @lang('Update')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.institution.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
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

<script>
    $(document).ready(function() {
        $(document).on('change', '#country', function() {
            var country_id = $(this).val();
            $.ajax({
                type: "POST",
                url: '{{ route('admin.getState') }}',
                data: {
                    'country_id': country_id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    $('#getState').empty();
                    $('#getState').html(
                        '<option value="">Select State</option>');
                    $.each(response, function(key, value) {
                        $('#getState').append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                    $('#getDistrict').html(
                        '<option value="">Select District</option>');
                },
            });
        });

        $(document).on('change', '#getState', function() {
            var state_id = $(this).val();
            $.ajax({
                type: "POST",
                url: '{{ route('admin.getDistrict') }}',
                data: {
                    'state_id': state_id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    $('#getDistrict').empty();
                    $('#getDistrict').html(
                        '<option value="">Select District</option>');
                    $.each(response, function(key, value) {
                        $('#getDistrict').append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                },
            });
        });
    });
</script>
