@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="services services-page">
    <div class="container" style="padding-top:30px;padding-bottom:30px">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="content wyg">
                    <h3>{{__($service->title)}}</h3>
                    @php
                    echo $service->description;
                    @endphp
                </div>

                
            </div>

            <div class="col-lg-4 col-12">

                <div class="right-side">
                    <h4 class="price">Other Services</h4>
                    @foreach ($latests as $item)
                    <div class="latest-blog">
                        <div class="latest-blog__content">
                            <h5 class="latest-blog__title"><a
                                    href="{{ route('service.details', ['slug' => slug($item->title), 'id' => $item->id])}}">
                                    @if(strlen(__($item->title)) >50)
                                    {{substr( __($item->title), 0,50).'...' }}
                                    @else
                                    {{__($item->title)}}
                                    @endif
                                </a>
                            </h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('style')
<style>
    .wyg h1,
    .wyg h2,
    .wyg h3,
    .wyg h4 {
        color: hsl(var(--black));
    }



    .wyg ul {
        margin: 35px;
    }

    .wyg ul li {
        list-style-type: decimal;
        color: hsl(var(--black));
        font-family: var(--body-font);
    }
</style>
@endpush
