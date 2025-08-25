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
                                    {{-- <th>@lang('Module Name')</th>
                                    <th>@lang('Category Name')</th>
                                    <th>@lang('Subcategory Name')</th> --}}
                                    <th>@lang('Sl.no')</th>                                   
                                    <th>@lang('Name')</th>
                                    <th>@lang('Logo')</th>
                                    <th>@lang('Address')</th>
                                    <th>@lang('Admission Process')</th>
                                    <th>@lang('Tentative Date')</th>
                                    <th>@lang('Institution Type')</th>
                                    <th>@lang('Url')</th>
                                    <th>@lang('Country')</th>
                                    <th>@lang('State')</th>
                                    <th>@lang('District')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($institutions as $key=> $institution)
                                    <tr>
                                        {{-- <td>{{ $institution->Modules->title }}</td>
                                        <td>{{ $institution->Category->title }}</td>
                                        <td>{{ $institution->Subcategory->title }}</td> --}}
                                      <td>{{ __($key +1 ) }}</td>
                                        <td>{{ $institution->name }}</td>
                                        <td>
                                            <img src="{{ asset('Institution/' . $institution->logo) }}" width="100"
                                                alt="">
                                        </td>
                                        <td>{{ $institution->address }}</td>
                                        <td>{{ $institution->admission_process }}</td>
                                        <td>{{ \Carbon\Carbon::parse($institution->tentative_date)->format('F Y') }}</td>
                                        <td>
                                            @if ($institution->institute_type == 0)
                                                Govt.
                                            @else
                                                Pvt.
                                            @endif
                                        </td>
                                        <td>{{ $institution->url }}</td>
                                        <td>{{ $institution->Country->name }}</td>
                                        <td>{{ $institution->State->name }}</td>
                                        <td>{{ $institution->Dist->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.institution.edit', $institution->id) }}"
                                                title="@lang('Edit')" data-id="{{ $institution->id }}"
                                                class="btn btn-sm btn--primary ">
                                                <i class="las la-edit"></i>
                                            </a>
                                            <button title="@lang('Remove')" data-id="{{ $institution->id }}"
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
                {{-- @if ($institutions->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($institutions) }}
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
                    <h5 class="modal-title">@lang('Delete Institution Confirmation')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.institution.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to') <span class="fw-bold">@lang('delete')</span> <span
                                class="fw-bold withdraw-amount text-success"></span> @lang('this Institution') <span
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
    <a href="{{ route('admin.institution.add') }}" class="btn btn-sm btn--primary">
        @lang('Add Institution')</a>
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
