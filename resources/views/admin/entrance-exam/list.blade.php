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
                                    <th>@lang('Module Name')</th>
                                    <th>@lang('Category Name')</th>

                                    <th>@lang('Exam Name')</th>
                                    <th>@lang('Exam Issue Date')</th>
                                    <th>@lang('Last Date')</th>
                                    <th>@lang('URL')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($entrances as $entrance)
                                    <tr>
                                        <td>{{ $entrance->Module->title }}</td>
                                        <td>{{ $entrance->Category->title }}</td>

                                        <td>{{ $entrance->exam_name }}</td>
                                        <td>{{ $entrance->issue_date }}</td>
                                        <td>{{ $entrance->last_date }}</td>
                                        <td>{{ $entrance->url }}</td>
                                        <td>
                                            <a href="{{ route('admin.entrance.edit', $entrance->id) }}" title="@lang('Edit')"
                                                data-id="{{ $entrance->id }}" class="btn btn-sm btn--primary ">
                                                <i class="las la-edit"></i>
                                            </a>
                                            <button title="@lang('Remove')" data-id="{{ $entrance->id }}"
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
                        </table>
                    </div>
                </div>
                @if ($entrances->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($entrances) }}
                    </div>
                @endif
            </div><!-- card end -->
        </div>
    </div>


    {{-- delete modal --}}
    <div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Delete Module Confirmation')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.entrance.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to') <span class="fw-bold">@lang('delete')</span> <span
                                class="fw-bold withdraw-amount text-success"></span> @lang('this Entrance Exam') <span
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
    <a href="{{ route('admin.entrance.add') }}" class="btn btn-sm btn--primary ">
        @lang('Add Entrance Exam')</a>
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
