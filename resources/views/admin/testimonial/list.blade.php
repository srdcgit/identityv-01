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
                                    <th>@lang('Sl.No')</th>
                                    <th>@lang('Text')</th>
                                    <th>@lang('Video')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($testimonials as $key=> $testimonial)
                                    <tr>
                                        <td>{{ __($key + 1)}}</td>
                                        <td>{{ Str::limit($testimonial->text, 35) }}</td>
                                        <td>{{ $testimonial->video }}</td>
                                        

                                        <td>
                                            <a href="{{ route('admin.frontend.TestimonialEdit',$testimonial->id) }}"
                                                class="btn btn-sm btn--primary ">
                                                <i class="las la-edit"></i>
                                            </a>
                                         
                                            <a href="{{ route('admin.frontend.TestimonialDelete',$testimonial->id) }}"  class="btn btn-sm btn--danger rejectBtn">
                                                <i class="las la-trash"></i>    
                                            </a>
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
                @if ($testimonials->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($testimonials) }}
                    </div>
                @endif
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
                <form action="{{ route('admin.subcategory.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to') <span class="fw-bold">@lang('delete')</span> <span
                                class="fw-bold withdraw-amount text-success"></span> @lang('this Subcategory') <span
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

@push('breadcrumb-plugins')
    <a href="{{ route('admin.frontend.TestimonialAdd') }}" class="btn btn-sm btn--primary ">
        @lang('Add Testimonial')</a>
@endpush

{{-- @push('script')
    <script>
        $('.rejectBtn').on('click', function() {
            var modal = $('#rejectModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.modal('show');
        });
    </script>
@endpush --}}
