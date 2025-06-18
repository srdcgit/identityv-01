@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-30">
                <div class="card-body">
                    <form action="{{ route('admin.brand.Store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">@lang('Brand Logo')</label>
                                    <input type="file" name="logo" value="{{ old('logo') }}" class="form-control"
                                        placeholder="@lang('Brand Logo')" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn--primary btn-block btn-lg">@lang('Create')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('ID')</th>
                                    <th>@lang('Logo')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($logos as $data)
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td> <img src="{{ asset('brand/' . $data->logo) }}" alt=""
                                                style=" height:50px;"> </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn--primary" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $data->id }}">
                                                <i class="las la-edit"></i>
                                            </button>

                                            <button title="@lang('Remove')" data-id="{{ $data->id }}"
                                                class="btn btn-sm btn--danger rejectBtn">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $data->id }}">
                                                        @lang('Edit Logo')</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('admin.brand.update') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id" value="{{ $data->id }}" >
                                                            <label for="logo">@lang('Logo')</label>
                                                            <input type="file" name="logo" class="form-control"
                                                                id="logo" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <img src="{{ asset('brand/' . $data->logo) }}" alt="Logo"
                                                                style="height: 50px;" class="mt-2">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">@lang('Close')</button>
                                                        <button type="submit"
                                                            class="btn btn-primary">@lang('Save changes')</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- @if ($countries->hasPages())
                    <div class="card-footer py-4">
                        {{ $countries->links() }}
                    </div>
                @endif --}}
            </div>
        </div>
    </div>

    {{-- delete modal --}}
    <div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Delete logo Confirmation')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.brand.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to') <span class="fw-bold">@lang('delete')</span> <span
                                class="fw-bold withdraw-amount text-success"></span> @lang('this Logo') <span
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


@push('script')
     <script>
        $('.rejectBtn').on('click', function() {
            var modal = $('#rejectModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.modal('show');
        });
    </script>

    {{--<script>
        $(document).ready(function() {
            $('.editBtn').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');

                // Set values in the modal form fields
                $('#edit_name').val(name);

                // Set action attribute of the form to include the current country ID
                var action = "{{ route('admin.countries.update', ':id') }}";
                action = action.replace(':id', id);
                $('#editForm').attr('action', action);

                // Show the modal
                $('#editModal').modal('show');
            });
        });
    </script> --}}
@endpush
