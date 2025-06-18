@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.TestimonialStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="text" class="font-weight-bold">@lang('Text')</label>
                                    <textarea class="form-control" name="text" placeholder="Enter the text" cols="30" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="video" class="font-weight-bold">@lang('Video URL')</label>
                                    <input type="text" name="video" class="form-control" required>
                                </div>
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
        <a href="{{ route('admin.frontend.TestimonialList') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="las la-angle-double-left"></i>@lang('Go Back')</a>
    @endpush
