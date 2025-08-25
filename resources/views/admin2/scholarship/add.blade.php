@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.scholarship.Store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Type')</label>
                                    <select name="type" id="type-select" class="form-control" required>
                                        <option value="">Select Type</option>
                                        <option value="Central">Central</option>
                                        <option value="State">State</option>
                                        <option value="Private">Private</option>
                                        <option value="PSU">PSU</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 get_class">
                                <div class="form-group">
                                    <label for="class" class="font-weight-bold">@lang('Class')</label>
                                    <select name="class" id="class-select" class="form-control">
                                        <option value="">Select Class</option>
                                        <option value="1st-5th">1st-5th</option>
                                        <option value="6th-8th">6th-8th</option>
                                        <option value="11th-12th">11th-12th</option>
                                        <option value="Under Graduate">Under Graduate</option>
                                        <option value="Post Graduate">Post Graduate</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Name')</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        placeholder="@lang('Name')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('URL')</label>
                                    <input type="text" name="url" value="{{ old('url') }}" class="form-control"
                                        placeholder="@lang('URL')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="is_free" class="font-weight-bold">@lang('Is Free')</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_free" id="is_free" class="form-check-input">
                                        <label class="form-check-label" for="is_free">@lang('Mark as Free')</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Long Description')</label>
                                    <textarea name="short_description" id="long_description" cols="30" rows="4" class="form"></textarea>
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
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.scholarship.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
            class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('long_description');
        // Initially hide the Class field
        $('.get_class').hide();

        // When the Type field changes
        $('#type-select').change(function() {
            var selectedType = $(this).val();

            // If 'State' is selected, show the Class field; otherwise, hide it
            if (selectedType === 'State') {
                $('.get_class').show();
            } else {
                $('.get_class').hide();
            }
        });
    });
</script>
