@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.scholarship.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id" value="{{$edit->id}}">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Type')</label>
                                    <select name="type" id="type-select" class="form-control" required>
                                        <option value="">Select Type</option>
                                        <option value="Central" {{ $edit->type == 'Central' ? 'selected' : '' }}>Central
                                        </option>
                                        <option value="State" {{ $edit->type == 'State' ? 'selected' : '' }}>State
                                        </option>
                                        <option value="Private" {{ $edit->type == 'Private' ? 'selected' : '' }}>Private
                                        </option>
                                        <option value="PSU" {{ $edit->type == 'PSU' ? 'selected' : '' }}>PSU</option>
                                    </select>
                                </div>
                            </div>
                            {{-- @if ($edit->type == 'State') --}}
                                <div class="col-lg-6 get_class" style="display: none;">
                                    <div class="form-group">
                                        <label for="class" class="font-weight-bold">@lang('Class')</label>
                                        <select name="class" id="class-select" class="form-control">
                                            <option value="">Select Class</option>
                                            <option value="1st-5th" {{ $edit->class == '1st-5th' ? 'selected' : '' }}>
                                                1st-5th</option>
                                            <option value="6th-8th" {{ $edit->class == '6th-8th' ? 'selected' : '' }}>
                                                6th-8th</option>
                                            <option value="11th-12th" {{ $edit->class == '11th-12th' ? 'selected' : '' }}>
                                                11th-12th</option>
                                            <option value="Under Graduate"
                                                {{ $edit->class == 'Under Graduate' ? 'selected' : '' }}>Under Graduate
                                            </option>
                                            <option value="Post Graduate"
                                                {{ $edit->class == 'Post Graduate' ? 'selected' : '' }}>Post Graduate
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            {{-- @endif --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Name')</label>
                                    <input type="text" name="name" value="{{ $edit->name }}" class="form-control"
                                        placeholder="@lang('Name')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('URL')</label>
                                    <input type="text" name="url" value="{{ $edit->url }}" class="form-control"
                                        placeholder="@lang('URL')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="is_free" class="font-weight-bold">@lang('Is Free')</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_free" id="is_free" class="form-check-input"
                                            {{ $edit->is_free ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_free">@lang('Mark as Free')</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Long Description')</label>
                                    <textarea name="short_description" id="long_description" cols="30" rows="4" class="form">{{ $edit->short_description }}</textarea>
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
    <a href="{{ route('admin.scholarship.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
            class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('long_description');
        // Function to show or hide the class field based on selected type
        function toggleClassField() {
            var selectedType = $('#type-select').val();
            if (selectedType === 'State') {
                $('.get_class').show();
            } else {
                $('.get_class').hide();
                $('#class-select').val('');
            }
        }

        // Initially check if State is selected
        toggleClassField();

        // When the Type field changes
        $('#type-select').change(function() {
            toggleClassField();
        });
    });
</script>

