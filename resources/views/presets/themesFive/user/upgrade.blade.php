@extends($activeTemplate . 'layouts.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Pricing Plans</title>
        <style>
            .pricing-card {
                width: 100%;
                height: 450px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                border: 1px solid #ddd;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                transition: transform 0.3s;
            }

            .pricing-card:hover {
                transform: translateY(-10px);
            }

            .pricing-header {
                padding: 10px;
                color: white;
                text-align: center;
                background-color: #9d2821 !important;
                border-radius: 10px 10px 0 0;
            }

            .pricing-header h3 {
                font-size: 1.5rem;
                margin-bottom: 5px;
                color: white;
            }

            .pricing-header h2 {
                font-size: 2rem;
                margin: 0;
                color: white;
            }

            .pricing-body {
                padding: 10px;
                text-align: center;
                overflow: auto;

            }

            .pricing-body li {
                list-style: none;
                margin: 10px 0;
                color: #333;
            }

            .razorpay-payment-button {
                background-color: #9d2721ec !important;
                color: white !important;
                border: none !important;
                font-size: 1rem;
                padding: 5px 10px;
                border-radius: 20px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .razorpay-payment-button:hover {
                background-color: #9d2821 !important;
                transform: scale(1.05);
            }
        </style>
    </head>

    <body>
        <div class="container my-3">
            <div class="text-center mb-2">
                <h2>Our Pricing Plans</h2>
                <p>Choose the plan that suits you best!</p>
            </div>
            <div class="row g-4">
                @foreach ($upgrades as $upgrade)
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-card">
                            <div class="pricing-header bg-primary">
                                <h3>{{ $upgrade->plan_name }}</h3>
                                <h3>{{ $upgrade->price }}</h3>
                                <p style="color: white;">Valid for 1 Year</p>
                            </div>
                            <div class="pricing-body">
                                <li>{!! $upgrade->fetures !!}</li>
                                <li>
                                    @php
                                        $modules = json_decode($upgrade->module_id);
                                    @endphp
                                    @foreach ($modules as $key => $module_id)
                                        @php
                                            $model_name = App\Models\Module::findorfail($module_id);
                                        @endphp
                                        {{ $model_name->title }}@if ($key < count($modules) - 1)
                                            ,
                                        @endif
                                    @endforeach
                                </li>
                                <form action="{{ route('user.razorpay.upgrade') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="plan" value="{{ $upgrade->id }}">
                                    <input type="hidden" name="amount" value="{{ $upgrade->price }}">
                                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}"
                                        data-amount="{{ $upgrade->price * 100 }}" data-currency="INR" data-buttontext="Buy Now" data-name="SRDC Pvt. Ltd."
                                        data-description="{{ $upgrade->plan_name }}"
                                        data-image="http://srdcindia.co.in/wp-content/uploads/2020/08/logo_srdc.png"
                                        data-prefill.name="{{ auth()->user()->id }}" data-theme.color="#F37254"></script>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </body>

    </html>



    </section>
@endsection
