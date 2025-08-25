@extends($activeTemplate . 'layouts.master')

<style>
    .category-card {
        transition: transform 0.3s, border-color 0.3s;
        border: 2px solid transparent;
    }

    .category-card:hover {
        transform: scale(1.05);
        border-color: hsl(var(--base));
    }
</style>

@section('content')
    <div class="body-wrapper">
        <div class="container mt-3 mb-5">
            <div style="text-align: center">


            </div>
            <div class="row">
                @foreach ($subcategories as $subcategory)
                    <div class="col-lg-3 col-md-6 mt-5">
                        <div class="card category-card" style="text-align:center; overflow:hidden;border-radius:20px">
                            <a href=" {{ route('user.viewSubcategory', $subcategory->id) }} ">
                                <div class="mt-3" style="margin-top:0px !important">
                                    <img src="{{ asset('Subcategory/' . $subcategory->file) }}" class="category-image"
                                        style="height: 150px; width:100%">
                                </div>
                                <div class="card-body text-center" style="padding:10px">
                                    <h5 class="card-title" style="font-family:sans-serif;"> {{ $subcategory->title }} </h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
