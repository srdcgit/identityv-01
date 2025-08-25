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
                                    <th>@lang('Plan Name')</th>
                                    <th>@lang('Fetures')</th>
                                    <th>@lang('Module')</th>
                                    <th>@lang('Price')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($upgrades as $upgrade)
                                    @php
                                        $json_module_id = json_decode($upgrade->module_id);
                                    @endphp
                                    <tr>
                                        <td>{{ $upgrade->plan_name }}</td>
                                        <td>{!! $upgrade->fetures !!}</td>
                                        <td>
                                            @foreach ($json_module_id as $key => $module_id)
                                                @php
                                                    $model_name = App\Models\Module::findorfail($module_id);
                                                @endphp
                                                {{ $model_name->title }}@if ($key < count($json_module_id) - 1)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $upgrade->price }}</td>
                                        <td>
                                            <a href="{{ route('admin.upgradeplan.edit', $upgrade->id) }}"
                                                title="@lang('Edit')" data-id="{{ $upgrade->id }}"
                                                class="btn btn-sm btn--primary "><i class="las la-edit"></i></a>

                                            <button title="@lang('Remove')" data-id="{{ $upgrade->id }}"
                                                class="btn btn-sm btn--danger rejectBtn"><i
                                                    class="las la-trash"></i></button>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- delete modal --}}
        <div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Delete Path Confirmation')</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="las la-times"></i>
                        </button>
                    </div>
                    <form action="{{ route('admin.upgradeplan.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="modal-body">
                            <p>@lang('Are you sure to') <span class="fw-bold">@lang('delete')</span> <span
                                    class="fw-bold withdraw-amount text-success"></span> @lang('this Path') <span
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
        <a href="{{ route('admin.upgradeplan.add') }}" class="btn btn-sm btn--primary">
            @lang('Add Plans')</a>
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
