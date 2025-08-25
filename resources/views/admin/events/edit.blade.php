@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.event.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $edit->id }}">
                                    <label for="price" class="font-weight-bold">@lang('Events Title')</label>
                                    <select class="form-control" name="title_id" required>
                                        <option value="">Choose Events Title</option>
                                        @foreach ($event_titles as $title)
                                            <option value="{{ $title->id }}" {{ ($title->id == $edit->title_id)? 'selected' : '' }}>{{ $title->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Image')</label>
                                    <input type="file" name="image[]" multiple value="{{ old('image') }}" class="form-control"
                                        placeholder="@lang('Image')">
                                </div>
                            </div> --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Image')</label>
                                    <input type="file" name="image[]" multiple class="form-control" placeholder="@lang('Image')">
                            
                                    {{-- Show already uploaded images --}}
                                    @php
                                        $images = [];
                                        $decoded = json_decode($edit->image, true);
                                        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                            $images = $decoded;
                                        } elseif (!empty($edit->image)) {
                                            $images = [$edit->image];
                                        }
                                    @endphp
                            
                                    @if(count($images))
                                        <div class="mt-2 d-flex flex-wrap">
                                            @foreach($images as $img)
                                                <div style="position:relative; margin:5px;">
                                                    <img src="{{ asset('assets/frontend/event/' . $img) }}" 
                                                         style="height:80px; width:80px; object-fit:cover; border-radius:6px; border:1px solid #ddd;">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            

                            <div class="col-lg-12 ">
                                <div class="form-group">
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
    <a href="{{ route('admin.module.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
            class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush
