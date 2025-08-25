@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive" style="padding: 10px;">
                        @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->user_type === 0)
                            <table class="table table--light style--two ">
                                <thead>
                                    <tr>
                                        <th>@lang('Sl No.')</th>
                                        <th>@lang('User Name')</th>
                                        <th>@lang('Member Name')</th>
                                        <th>@lang('Date')</th>
                                        <th>@lang('Time')</th>
                                        <th>@lang('Status')</th>
                                        @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->user_type === 1)
                                            <th>@lang('Action')</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $key=>$booking)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $booking->getUser->firstname }} {{ $booking->getUser->lastname }}</td>
                                            <td>{{ $booking->team->name }}</td>
                                            <td>{{ $booking->date }}</td>
                                            <td>{{ $booking->time }}</td>
                                            <td>
                                                @if ($booking->status == 1)
                                                    <span class="badge rounded-pill bg-success">Paid</span>
                                                @else
                                                    <span class="badge rounded-pill bg-warning text-dark">Unpaid</span>
                                                @endif
                                            </td>
                                            @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->user_type === 1)
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Approve</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    data-bs-target="#exampleModal{{ $booking->id }}"
                                                                    data-bs-toggle="modal" href="#">Approve &
                                                                    Reschedule</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item" href="">Schedule Google
                                                                    Meet</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <div class="modal fade" id="exampleModal{{ $booking->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel{{ $booking->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.team.updatetime') }}"
                                                                    method="post" id="modalForm">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <input type="hidden" class="form-control"
                                                                            name="id" value="{{ $booking->id }}">
                                                                        {{-- <input type="hidden" class="form-control" name="team_id"
                                                                    value="{{ $booking->id }}"> --}}
                                                                        <label for="name"
                                                                            class="form-label">Date</label>
                                                                        <input type="date" class="form-control"
                                                                            name="date" value="{{ $booking->date }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="name"
                                                                            class="form-label">Time</label>
                                                                        <input type="time" class="form-control"
                                                                            name="time" value="{{ $booking->time }}">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-bs-dismiss="modal"
                                                                    style="font-size: 13px; padding: 4px 9px; width: auto; height: auto;">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm"
                                                                    form="modalForm"
                                                                    style="font-size: 13px; padding: 4px 9px; width: auto; height: auto;">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        @else
                            <table class="table table--light style--two ">
                                <thead>
                                    <tr>
                                        <th>@lang('Sl No.')</th>
                                        <th>@lang('User Name')</th>
                                        {{-- <th>@lang('Member Name')</th> --}}
                                        <th>@lang('Date')</th>
                                        <th>@lang('Time')</th>
                                        <th>@lang('Status')</th>
                                        <th>@lang('Approve Status')</th>
                                        @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->user_type === 1)
                                            <th>@lang('Action')</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $key=>$booking)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $booking->getUser->firstname }} {{ $booking->getUser->lastname }}</td>
                                            {{-- <td>{{ $booking->team->name }}</td> --}}
                                            <td>{{ $booking->date }}</td>
                                            <td>{{ $booking->time }}</td>
                                            <td>
                                                @if ($booking->status == 1)
                                                    <span class="badge rounded-pill bg-success">Paid</span>
                                                @else
                                                    <span class="badge rounded-pill bg-warning text-dark">Unpaid</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($booking->approve_status == 0)
                                                    <span class="badge rounded-pill bg-warning text-dark">Pending</span>
                                                @else
                                                    <span class="badge rounded-pill bg-success text-dark">Approve</span>
                                                @endif
                                            </td>
                                            @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->user_type === 1)
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <form action="{{ route('admin.team.member_approve') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $booking->id }}">
                                                                <li> <button class="dropdown-item" type="submit">
                                                                        Approve</button></li>
                                                            </form>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <form action="{{ route('admin.team.updatetime') }}"
                                                                method="post">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $booking->id }}">
                                                                <li><button class="dropdown-item" type="submit"
                                                                        data-bs-target="#exampleModal{{ $booking->id }}"
                                                                        data-bs-toggle="modal">Approve &
                                                                        Reschedule</button>
                                                                </li>
                                                            </form>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item" href="">Schedule Google
                                                                    Meet</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <div class="modal fade" id="exampleModal{{ $booking->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel{{ $booking->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.team.updatetime') }}"
                                                                    method="post" id="modalForm">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <input type="hidden" class="form-control"
                                                                            name="id" value="{{ $booking->id }}">
                                                                        {{-- <input type="hidden" class="form-control" name="team_id"
                                                                    value="{{ $booking->id }}"> --}}
                                                                        <label for="name"
                                                                            class="form-label">Date</label>
                                                                        <input type="date" class="form-control"
                                                                            name="date" value="{{ $booking->date }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="name"
                                                                            class="form-label">Time</label>
                                                                        <input type="time" class="form-control"
                                                                            name="time" value="{{ $booking->time }}">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-bs-dismiss="modal"
                                                                    style="font-size: 13px; padding: 4px 9px; width: auto; height: auto;">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm"
                                                                    form="modalForm"
                                                                    style="font-size: 13px; padding: 4px 9px; width: auto; height: auto;">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                {{-- @if ($informations->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($information) }}
                    </div>
                @endif --}}
            </div><!-- card end -->
        </div>
    </div>


    {{-- delete modal --}}
    {{-- <div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Delete Module Confirmation')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ Route('admin.ibutton.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to') <span class="fw-bold">@lang('delete')</span> <span
                                class="fw-bold withdraw-amount text-success"></span> @lang('this Information has been deleted') <span
                                class="fw-bold withdraw-user"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--danger btn-global">@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
