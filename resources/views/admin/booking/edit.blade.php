@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.team.updatebookings') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id" value="{{ $edit_booking->id }}">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">@lang('User Name')</label>
                                    <input name="user_id" type="text" class="form-control" placeholder="Enter Title"
                                        disabled
                                        value="{{ $edit_booking->getUser->firstname }} {{ $edit_booking->getUser->lastname }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">@lang('Member Name')</label>
                                    <input name="team_id" type="text" class="form-control" disabled
                                        value="{{ $edit_booking->team->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">@lang('Date')</label>
                                    <input name="team_id" type="text" class="form-control" disabled
                                        value="{{ $edit_booking->date }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">@lang('Time')</label>
                                    <input name="team_id" type="text" class="form-control" disabled
                                        value="{{ $edit_booking->time }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">@lang('Status')</label>
                                    <select name="status" class="form-control">
                                        <option value="0" {{ ($edit_booking->status === 0) ? 'selected' : '' }}> Unpaid </option>
                                        <option value="1" {{ ($edit_booking->status === 1) ? 'selected' : '' }} > Paid </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="form-group float-end p-3">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">
                                        @lang('Update')</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('breadcrumb-plugins')
        <a href="{{ route('admin.team.bookings') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="las la-angle-double-left"></i>@lang('Go Back')</a>
    @endpush

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
