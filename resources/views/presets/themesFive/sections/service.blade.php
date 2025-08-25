@php
    $service = getContent('service.content', true);
    $services = App\Models\Service::where('status', 1)->latest()->limit(6)->get();
@endphp
<!-- ==================== Services start ==================== -->
{{-- <section class="services py-100">
    <div class="container">
        <div class="title">
            <h6>{{ __(@$service->data_values->top_heading) }}</h6>
            <h4>{{ __(@$service->data_values->heading) }}</h4>
            <p>{{ __(@$service->data_values->sub_heading) }}</p>
        </div>
        @include($activeTemplate . 'components.service')
    </div>

</section> --}}
 
<style>

</style>
{{-- <section class="services">
    <div class="">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12 text-center mt-5">
                        <div class="mt-6 mb-6 font-weight-bold text-danger display-5" style="font-size: 2rem">
                            Choose your Perfect Career
                            <br>
                            <div class="h4 font-weight-semibold text-dark">
                                with a Personalised Career Guidance Report
                            </div>
                            With
                            <span style="color:#f8be14">ZERO</span>
                            Confusion
                        </div>
                        <div class="row mt-5 text-center">
                            <div class="col-3 border-right">
                                <p class=" font-weight-normal">
                                    Personalised Career Report
                                </p>
                            </div>
                            <div class="col-3 border-right">
                                <p class=" font-weight-normal">
                                    200+
                                    <br>
                                    Career Options
                                </p>
                            </div>
                            <div class="col-4 border-right">
                                <p class=" font-weight-normal">
                                    100+
                                    <br>
                                    MasterClass Videos
                                </p>
                            </div>
                            <div class="col-2">
                                <p class=" font-weight-normal">
                                    200+
                                    <br>
                                    Scholarships
                                </p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <span class="mt-1 d-block"></span>
                        <div>
                            <a href="{{ route('user.login') }}" class="btn--base">GET NOW <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <figure class="image">
                    <img src="https://lmes-mars-cdn.jujube.in/site/home/freedom_1.svg" class="img-fluid" style="height: 30rem">
                </figure>
            </div>

        </div>
    </div>
</section> --}}
<!-- ==================== Services end ==================== -->
