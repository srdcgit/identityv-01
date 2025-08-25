@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.CareerImageUpdate', $careerimage->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="hidden" name="id" value="{{ $careerimage->id }}">
                                <div class="form-group">
                                    <label for="text" class="font-weight-bold">@lang('Title')</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $careerimage->title }}" placeholder="Enter the title">
                                </div>
                                <div class="form-group">
                                    <label for="file" class="font-weight-bold">@lang('Image')</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{ asset('careerimages/' . $careerimage->image) }}" width="100"
                                        alt="">
                                </div>
                                <div class="form-group float-end">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">
                                        @lang('Update')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('breadcrumb-plugins')
        <a href="{{ route('admin.frontend.CareerImageList') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="las la-angle-double-left"></i>@lang('Go Back')</a>
    @endpush
