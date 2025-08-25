@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <main class="main mt-3 mb-3">
        <div class="container">
            <div class="row g-4">
                @foreach ($events as $event)
                    <div class="col-lg-4">
                        <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">
                            <div class="card-image">
                                <a href="{{ route('viewEvents', $event->id) }}" class="text-decoration-none">
                                    <img src="{{ asset('assets/frontend/event/' .$event->image) }}"
                                        class="img-fluid" alt="Flower"
                                        style="border-top-left-radius: 15px; border-top-right-radius: 15px; height:250px; width:auto;">
                                    <div class="p-3 text-center" style="background-color: #f8f9fa;">
                                        <p class="mb-0 fw-bold text-danger">{{ $event->title }}</p>
                                        <span>{{ $event->photos_count }} Photos</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Card 2 -->
                {{-- <div class="col-lg-4">
                    <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">
                        <div class="card-image">
                            <a href="#" class="text-decoration-none">
                                <img src="https://kidlingoo.com/wp-content/uploads/flowers_name_in_english.jpg"
                                    class="img-fluid" alt="Flower"
                                    style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                <div class="p-3 text-center" style="background-color: #f8f9fa;">
                                    <p class="mb-0 fw-bold text-secondary">Hello</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>
@endsection
