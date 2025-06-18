@extends($activeTemplate . 'layouts.master')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/presets/themesFive/nav/teams.css') }}">
    <style>
        #booking_table {
            background-color: #9a221a !important;
        }
    </style>
    <div class="background gradient">
    </div>
    <div class="container">
        <div class="page">
            <header>
                <nav style="padding: 10px;">
                    <a href="#about" class="selected" id='getAbout'>
                        <span class="fas fa-user"></span>
                        <span class="link">About</span>
                    </a>
                    <a href="#resume" id='getResume'>
                        <span class="fas fa-file"></span>
                        <span class="link">Resume</span>
                    </a>
                    <a href="#contact" id='getContact'>
                        <span class="fas fa-at"></span>
                        <span class="link">My Session</span>
                    </a>
                </nav>
            </header>
            <main style="padding-bottom: 50px;">
                <section id="presentation" class="profile">
                    <div class="profile-background"></div>
                    <div>
                        <div class="profile-image">
                            <img src="{{ asset('teams/' . $view_team->photo) }}" style="height: 130px;width: 130px;"
                                alt="Ryan Adlard">
                        </div>
                        <h1 class="profile-name" id="nombre">{{ $view_team->name }}</h1>
                        <br>
                        <h2 class="profile-profession">{{ $view_team->designation }}</h2>
                        <div class="profile-social" id="profile-social">
                            <a href="{{ $view_team->linkedin }}" class="fab fa-linkedin" target="_blank"></a>
                            <a href="{{ $view_team->facebook }}" class="fab fa-facebook" target="_blank"></a>
                            <a href="{{ $view_team->twiter }}" class="fab fa-twitter" target="_blank"></a>
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary"
                            style="font-size: 13px; padding: 4px 9px; width: auto; height: auto;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Book Now</button>
                        <br>
                        <div class="d-flex justify-content-center mt-3">
                            {{-- <a href="{{ route('user.mysession.team_pay', $booking->team_id) }}" class="btn btn-info"
                                style="font-size: 13px; padding: 4px 9px; width: auto; height: auto;">
                                Payment Details
                            </a> --}}
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('user.mysession.storeBooking') }}" method="post"
                                            id="modalForm">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" name="team_id"
                                                    value="{{ $view_team->id }}">
                                                <input type="hidden" class="form-control" name="member_id"
                                                    value="{{ $view_team->member_id }}">
                                                <label for="name" class="form-label">Date</label>
                                                <input type="date" class="form-control" name="date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Time</label>
                                                <input type="time" class="form-control" name="time" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                                            style="font-size: 13px; padding: 4px 9px; width: auto; height: auto;">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm" form="modalForm"
                                            style="font-size: 13px; padding: 4px 9px; width: auto; height: auto;">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                <section id="about" class="about view" style="max-height: 540px; overflow-y: auto;">
                    <article class="about-aboutMe">
                        <h3 class="title">About Me</h3>
                        <div class="line-left">
                            <p>{!! $view_team->description !!}</p>
                            <br>
                            <div>
                                <div>
                                    <span>Age - </span>{{ $view_team->age }}
                                </div>
                                <div>
                                    <span>Current Adress - </span>{{ $view_team->current_address }}
                                </div>
                                <div>
                                    <span>Permanent Adress - </span>{{ $view_team->permanent_address }}
                                </div>
                                <div>
                                    <span>D.O.B - </span>{{ $view_team->dob }}
                                </div>
                                <div>
                                    <span>My Services - </span>{{ $view_team->my_services }}
                                </div>
                                <div>
                                    <span>Teaching Experience - </span>{{ $view_team->experience }}
                                </div>
                                <div>
                                    <span>Joining Date - </span>{{ $view_team->joining_date }}
                                </div>
                                <div>
                                    <span>Nationality - </span>{{ $view_team->nationality }}
                                </div>
                                <div>
                                    <span>Religion - </span>{{ $view_team->religion }}
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
                <section id="resume" class="resume" style="max-height: 540px; overflow-y: auto;">
                    <h3 class="title">Resume</h3>
                    <article class="resume-lines">
                        <section class="resume-line line-left">
                            <h4 class="line-down"> <i class="fas fa-briefcase"></i> Experience</h4>
                            <article class="line-down">
                                <div class="date active">2013 - PRESENT</div>
                                <h5 class="name">ART DIRECTOR</h5>
                                <h6 class="company">FACEBOOK INC.</h6>
                                <p>Collaborate with creative and development teams on the execution of ideas.</p>
                            </article>
                            <article class="line-down">
                                <div class="date">2011 - 2012</div>
                                <h5 class="name">FRONT-END DEVELOPER</h5>
                                <h6 class="company">GOOGLE INC.</h6>
                                <p>Monitored technical aspects of the front-end delivery for several projects.</p>
                            </article>
                            <article>
                                <div class="date">2009 - 2010</div>
                                <h5 class="name">SENIOR DEVELOPER</h5>
                                <h6 class="company">ABC INC.</h6>
                                <p>Optimize website performance using latest technology.</p>
                            </article>
                        </section>
                        <section class="resume-line line-left">
                            <h4 class="line-down"> <i class="fas fa-university"></i> Education</h4>
                            <article class="line-down">
                                <h5 class="name">College</h5>
                                <p>{!! $view_team->college !!}</p>
                            </article>
                            <article class="line-down">
                                <h5 class="name">University</h5>
                                <p>{!! $view_team->university !!}</p>
                            </article>
                            <article>
                                <h5 class="name">Master Degree </h5>
                                <p>{!! $view_team->master_degree !!}</p>
                            </article>
                        </section>
                    </article>
                    <article class="resume-skills">
                        <h3 class="title">My Skills</h3>
                        <div>

                            <section class="line-left">
                                <h4 class="line-down"><i class="fas fa-code"></i>{{ $view_team->my_skills }}</h4>
                                <div class="line-down">
                                    <div>
                                        <div style="width: 50%"></div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </article>
                </section>
                <section id="contact" class="contact" style="max-height: 540px; overflow-y: auto;">
                    <div>
                        <div class="col-md-12">

                            <div class="mt-3">
                                <h3>Booking Details</h3>
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
                                                        <form action="{{ route('user.razorpay.store') }}" method="POST"
                                                            class="razorpay-form">
                                                            @csrf
                                                            <input type="hidden" name="booking_id"
                                                                value="{{ $booking->id }}">
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

                        {{-- <div id="loader" style="display:none;">
                            <div class="spinner"></div>
                        </div>

                        <style>
                            #loader {
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background: rgba(255, 255, 255, 0.8);
                                z-index: 9999;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }

                            .spinner {
                                border: 8px solid #f3f3f3;
                                /* Light grey */
                                border-top: 8px solid #3498db;
                                /* Blue */
                                border-radius: 50%;
                                width: 60px;
                                height: 60px;
                                animation: spin 1s linear infinite;
                            }

                            @keyframes spin {
                                0% {
                                    transform: rotate(0deg);
                                }

                                100% {
                                    transform: rotate(360deg);
                                }
                            }
                        </style> --}}
                    </div>
                </section>
            </main>
        </div>
    </div>
@endsection
@push('script')
    <script>
        // Menu links
        let getAbout = document.getElementById("getAbout");
        let getResume = document.getElementById("getResume");
        let getContact = document.getElementById("getContact");

        // Sections
        let about = document.getElementById("about");
        let resume = document.getElementById("resume");
        let contact = document.getElementById("contact");

        function removeClass() {
            // Links
            getAbout.classList.remove('selected');
            getResume.classList.remove('selected');
            getContact.classList.remove('selected');
            // Sections
            about.classList.remove('view');
            resume.classList.remove('view');
            contact.classList.remove('view');
        }

        getAbout.addEventListener('click', function(e) {
            if (window.innerWidth > 1040) {
                e.preventDefault();
                removeClass();
                about.classList.add('view');
                getAbout.classList.add('selected');
            }

        });
        getResume.addEventListener('click', function(e) {
            if (window.innerWidth > 1040) {
                e.preventDefault();
                removeClass();
                resume.classList.add('view');
                getResume.classList.add('selected');
            }
        })
        getContact.addEventListener('click', function(e) {
            if (window.innerWidth > 1040) {
                e.preventDefault();
                removeClass();
                contact.classList.add('view');
                getContact.classList.add('selected');
            }
        })
    </script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.querySelectorAll('.pay-now-button').forEach(function(button) {
            button.addEventListener('click', function() {
                var form = this.closest('.razorpay-form');
                var bookingId = form.getAttribute('data-booking-id');

                // Show the loader
                document.getElementById('loader').style.display = 'flex';

                var options = {
                    key: '{{ env('RAZORPAY_KEY') }}', // Your Razorpay key
                    amount: 150000, // Amount in paise (1500 INR)
                    currency: 'INR',
                    name: 'SRDC Pvt. Ltd.',
                    description: 'Payment for booking',
                    image: 'http://srdcindia.co.in/wp-content/uploads/2020/08/logo_srdc.png',
                    handler: function(response) {
                        // Handle successful payment response
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '{{ route('user.razorpay.store') }}', true);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.onload = function() {
                            document.getElementById('loader').style.display = 'none';
                            if (xhr.status === 200) {
                                alert('Payment successful!');
                                window.location
                                    .reload(); // Reload the page or redirect as needed
                            } else {
                                alert('Payment failed. Please try again.');
                            }
                        };
                        xhr.onerror = function() {
                            document.getElementById('loader').style.display = 'none';
                            alert('Network error. Please try again.');
                        };
                        xhr.send(JSON.stringify({
                            razorpay_payment_id: response.razorpay_payment_id,
                            booking_id: bookingId // Include booking ID for processing
                        }));
                    },
                    prefill: {
                        name: 'Your Name', // Replace with actual name
                        email: 'your.email@example.com' // Replace with actual email
                    },
                    theme: {
                        color: '#F37254'
                    }
                };

                var rzp = new Razorpay(options);
                rzp.open();
            });
        });
    </script>
@endpush
