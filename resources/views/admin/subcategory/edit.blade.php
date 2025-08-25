@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.subcategory.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id" value="{{ $edit->id }}">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="maincategory_id" class="font-weight-bold">@lang('Select Category')</label>
                                    <select name="maincategory_id" id="maincategory_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($maincategories as $main)
                                            <option {{ $edit->maincategory_id == $main->id ? 'selected' : '' }} value="{{ $main->id }}"> {{ $main->title  ?? 'Unnamed' }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select 2nd Category')</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select 2nd Category</option>
                                        @foreach ($categories as $category)
                                            <option {{ $edit->category_id == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Title')</label>
                                    <input type="text" name="title" value="{{ $edit->title }}" class="form-control"
                                        placeholder="@lang('Title')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('File')</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Description')</label>
                                    <textarea class="form-control" name="description" cols="30" rows="3" required>{{ $edit->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="institutionSelect2" class="font-weight-bold">Select Institutions</label>
                                <select name="institution_id[]" id="institutionSelect2" class="form-control"
                                    multiple="multiple" required>
                                    @foreach ($edit->institutions as $institution)
                                        <option value="{{ $institution->id }}" selected>{{ $institution->name }}</option>
                                    @endforeach
                                </select>
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
    @endsection

    @push('breadcrumb-plugins')
        <a href="{{ route('admin.subcategory.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="las la-angle-double-left"></i>@lang('Go Back')</a>
    @endpush
