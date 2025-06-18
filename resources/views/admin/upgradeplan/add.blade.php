@extends('admin.layouts.app')
<style>
    select.form-control {
        height: auto !important;
    }
</style>
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.upgradeplan.Store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Module')</label>
                                    <select class="form-control" name="module_id[]" multiple>
                                        @foreach ($modules as $module)
                                            <option value="{{ $module->id }}"> {{ $module->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Plan Name')</label>
                                    <input type="text" name="plan_name" value="{{ old('plan_name') }}"
                                        class="form-control" placeholder="@lang('Plan Name')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Price')</label>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                                        placeholder="@lang('Price')">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">@lang('Fetures')</label>
                                    <textarea name="fetures" id="long_description" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <div class="form-group float-end p-3">
                                <button type="submit" class="btn btn--primary btn-block btn-lg">
                                    @lang('Create')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
@endsection
