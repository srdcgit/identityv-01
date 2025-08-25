@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.clientele.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="hidden" name="id" value="{{ $edit->id }}">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Title')</label>
                                    <select name="title" class="form-control">
                                        <option value="">CHOOSE</option>
                                        <option value="CORPORATES" {{ ($edit->title == "CORPORATES")? 'selected' : '' }}>CORPORATES</option>
                                        <option value="UNIVERSITIES" {{ ($edit->title == "UNIVERSITIES")? 'selected' : '' }}>UNIVERSITIES</option>
                                        <option value="INSTITUTIONS" {{ ($edit->title == "INSTITUTIONS")? 'selected' : '' }}>INSTITUTIONS</option>
                                        <option value="SCHOOLS" {{ ($edit->title == "SCHOOLS")? 'selected' : '' }}>SCHOOLS</option>
                                        <option value="GOVERNMENTS" {{ ($edit->title == "GOVERNMENTS")? 'selected' : '' }}>GOVERNMENTS</option>
                                        <option value="CSR " {{ ($edit->title == "CSR ")? 'selected' : '' }}>CSR </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('Logo')</label>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Name')</label>
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
