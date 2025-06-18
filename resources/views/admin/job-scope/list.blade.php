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
                                    <th>@lang('Stream')</th>
                                    <th>@lang('Category')</th>
                                    <th>@lang('2nd Category')</th>
                                    <th>@lang('Sub Category')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse($job_scopes as $job_scope)
                                    <tr>
                                        <td>{{ @$job_scope->getStream->name }}</td>
                                        <td>{{ @$job_scope->getCategory->title}}</td>
                                        <td>{{ @$job_scope->get2Category->name}}</td>
                                        <td>{{ @$job_scope->getSubcategory->title}}</td>
                                        <td>{{ $job_scope->name}}</td>

                                        <td>
                                            <a href="{{ route('admin.jobscope.edit', $job_scope->id) }}" title="@lang('Edit')"
                                                data-id="{{ $job_scope->id }}" class="btn btn-sm btn--primary ">
                                                <i class="las la-edit"></i>
                                            </a>
                                            <button title="@lang('Remove')" data-id="{{ $job_scope->id }}"
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
                    <h5 class="modal-title">@lang('Delete Job Scope Confirmation')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.jobscope.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to') <span class="fw-bold">@lang('delete')</span> <span
                                class="fw-bold withdraw-amount text-success"></span> @lang('this Job Scope') <span
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
    <a href="{{ route('admin.jobscope.add') }}" class="btn btn-sm btn--primary ">
        @lang('Add Job Scope')</a>
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
