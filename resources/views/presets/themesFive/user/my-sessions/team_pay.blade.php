@extends($activeTemplate . 'layouts.master')
<link rel="stylesheet" href="{{ asset('assets/presets/themesFive/nav/teams.css') }}">
@section('content')
    <style>
        .container {
            max-width: 1000px;
        }

        .data_table {
            color: #000;
        }

        .data_table th,
        .data_table td {
            padding: 10px;
            font-size: 0.9rem;
        }

        .table-bordered {
            border-color: #ddd;
        }

        .table-dark th {
            background-color: #343a40;
            color: #fff;
        }
    </style>
    {{-- <section>
    <div class="container">
        <div class="col-md-12">
            <div class="mt-3 mb-5">
                <h2>Booking Details</h2>
                <table class="table table-bordered data_table">
                    <thead>
                        <tr>
                            <th>Teacher Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->team->name }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>
                                    @if ($booking->status == 1)
                                        <span class="badge rounded-pill bg-success">Paid</span>
                                    @else
                                        <span class="badge rounded-pill bg-warning text-dark">Unpaid</span>
                                        <form action="{{ route('user.razorpay.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="150000"
                                            data-currency="INR" data-buttontext="Pay Now" data-name="SRDC Pvt. Ltd." data-description="Rozerpay"
                                            data-image="http://srdcindia.co.in/wp-content/uploads/2020/08/logo_srdc.png" data-prefill.name="name"
                                            data-prefill.email="email" data-theme.color="#F37254"></script>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section> --}}
    <section>

        <div class="container">
            <div class="col-md-12">
                <div class="mt-3 mb-5">
                    <h3 class="text-center">Booking Details</h3>
                    <div><a href="{{ route('user.mysession.viewTeam', $booking->team_id) }}" class="btn btn-primary"
                            style="font-size: 13px; padding: 4px 9px; width: auto; height: auto;">
                            <i class="fas fa-arrow-left"></i> Back
                        </a></div>
                    <table class="table table-bordered data_table bg-white text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Teacher Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->team->name }}</td>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->time }}</td>
                                    <td>
                                        @if ($booking->status == 1)
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-warning text-dark mt-2">Unpaid</span>
                                            <form class="mt-2" action="{{ route('user.razorpay.store') }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="150000"
                                                    data-currency="INR" data-buttontext="Pay Now" data-name="SRDC Pvt. Ltd." data-description="Rozerpay"
                                                    data-image="http://srdcindia.co.in/wp-content/uploads/2020/08/logo_srdc.png" data-prefill.name="name"
                                                    data-prefill.email="email" data-theme.color="#F37254"></script>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
                                            