@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.module.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('Image')</label>
                                    <input type="file" name="image" id="image" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Title')</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                        placeholder="@lang('Title')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Btn Text')</label>
                                    <input type="text" name="btn_text" value="{{ old('btn_text') }}" class="form-control"
                                        placeholder="@lang('Btn Text')" required>
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
                                    <label for="position" class="font-weight-bold">@lang('POSITION')</label>
                                    <input type="number" name="position" value="{{ old('position') }}" class="form-control"
                                        placeholder="@lang('POSITION')" required>
                                        @error('position')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
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
    <a href="{{ route('admin.module.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
            class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush
