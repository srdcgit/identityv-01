@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Category')</th>
                                    <th>@lang('Subcategory')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('email')</th>
                                    <th>@lang('Phone')</th>
                                    <th>@lang('Experience')</th>
                                    <th>@lang('photo')</th>
                                    <th>@lang('DOB')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teams as $team)
                                    <tr>
                                        <td>{{ $team->category_id }}</td>
                                        <td>{{ $team->sub_category_id }}</td>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->email }}</td>
                                        <td>{{ $team->phone }}</td>
                                        <td>{{ $team->experience }}</td>
                                        <td><img src="{{ asset('Teams/'. $team->photo) }}" width="100" height="100" alt=""></td>
                                        <td>{{ $team->dob }}</td>

                                        <td>
                                            <a href="{{ route('admin.team.edit', $team->id) }}" title="@lang('Edit')"
                                                data-id="{{ $team->id }}" class="btn btn-sm btn--primary ">
                                                <i class="las la-edit"></i>
                                            </a>
                                            <button title="@lang('Remove')" data-id="{{ $team->id }}"
                                                class="btn btn-sm btn--danger rejectBtn">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                {{-- @if ($modules->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($modules) }}
                    </div>
                @endif --}}
            </div><!-- card end -->
        </div>
    </div>


    {{-- delete modal --}}
    <div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Delete Member Confirmation')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.team.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to') <span class="fw-bold">@lang('delete')</span> <span
                                class="fw-bold withdraw-amount text-success"></span> @lang('this member') <span
                                class="fw-bold withdraw-user"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--danger btn-global">@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.team.add') }}" class="btn btn-sm btn--primary ">
        @lang('Add Member')</a>
@endpush

@push('script')
    <script>
        $('.rejectBtn').on('click', function() {
            var modal = $('#rejectModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.modal('show');
        });
    </script>
@endpush
