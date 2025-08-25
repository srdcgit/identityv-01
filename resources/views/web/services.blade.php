@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <style>
        .card-container {
            perspective: 1000px;
            width: 300px;
            height: 400px;
        }

        .service-card {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transform: rotateY(0deg);
            transition: transform 0.8s ease;
        }

        .card-container:hover .service-card {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-front {
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        .card-front h2 {
            margin: 0;
            font-size: 25px;
            color: #c60031;
        }

        .card-front p {
            font-weight: 300 !important;
            color: #666;
        }

        .card-back {
            background-color: #fff;
            transform: rotateY(180deg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .card-back img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .card-back h2 {
            margin.-top: 15px;
            font-size: 25px;
            color: #c60031;
        }
    </style>
    <div class="card-container">
        <div class="service-card">
            <div class="card-front">
                <h2>Fix Your Carrer</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
            </div>
            <div class="card-back">
                <img src="https://thecareermap.in/wp-content/uploads/2023/07/WhatsApp-Image-2023-07-12-at-5.20.19-PM.jpeg"
                    alt="Service Image">
                <h2>Fix Your Carrer</h2>
            </div>
        </div>
    </div>
@endsection
