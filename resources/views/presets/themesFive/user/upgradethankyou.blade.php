@extends($activeTemplate . 'layouts.master')
@section('content')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-success text-white">
                    <h4>Thank You for Your Purchase!</h4>
                </div>
                <div class="card-body text-center">
                    <p>We have successfully received your payment for the plan: <strong>{{ Auth::user()->is_upgrade }}</strong>.</p>
                    <p>Your purchase is now active and valid for 1 year.</p>
                    <p>We appreciate your business and look forward to serving you!</p>
                    <a href="{{ url('/') }}" class="btn btn-primary">Go to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
