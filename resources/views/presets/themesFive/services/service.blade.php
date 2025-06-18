@extends($activeTemplate.'layouts.frontend')
@section('content')
<!-- ==================== Services start ==================== -->
<section class="services services-page">
    <div class="container">
        @include($activeTemplate.'components.service')
        <div class="row mt-3">
            <div class="col-12">
                @if ($services->hasPages())
                <div class="py-4">
                    {{ paginateLinks($services) }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- ==================== Services end ==================== -->
@endsection

@push('script')
<script>
    (function ($) {
        "use strict";

        $("#searchValue").on('keyup', function () {
            var searchValue = $(this).val();
            getFilteredData(searchValue)

        });

        function getFilteredData(searchValue){

            $.ajax({
                type: "get",
                url: "{{ route('service.filtered') }}",
                data:{
                    "searchValue": searchValue,
                },
                dataType: "json",
                success: function (response) {
                    if(response.html){
                        $('.main-content').html(response.html);
                    }

                    if(response.error){
                        notify('error', response.error);
                    }
                }
            });
        }

    })(jQuery);
</script>
@endpush
