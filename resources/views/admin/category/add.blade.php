@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Stream')</label>
                                    <select name="stream_id" class="form-control" required>
                                        <option value="">Select Stream</option>
                                        @foreach ($streams as $stream)
                                            <option value="{{ $stream->id }}"> {{ $stream->name }} </option>
                                        @endforeach
                                    </select>
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
                                    <label for="name" class="font-weight-bold">@lang('File')</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Description')</label>
                                    <textarea class="form-control" name="description" cols="30" rows="3">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="is_upgrade" class="form-label">Category Access</label>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="default" name="is_upgrade" value="0" checked>
                                        <label class="form-check-label" for="default">Free</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="is_upgrade" name="is_upgrade" value="1">
                                        <label class="form-check-label" for="is_upgrade">Premium</label>
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
    @endsection

    @push('breadcrumb-plugins')
        <a href="{{ route('admin.category.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="las la-angle-double-left"></i>@lang('Go Back')</a>
    @endpush
