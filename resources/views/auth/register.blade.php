@extends('front.app')


@section('content')
    <main id="main-content" class="usa-prose grid-container">

        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-fill-contact register-forms">
                            <form id="contactForm" method="POST" action="{{ route('registeruser') }}">
                                @csrf
                                <label for="name">Full Name: <span class="required">*</span></label>
                                <input type="text" id="name" name="name" placeholder="Your Full Name" required>

                                <label for="email">Email Address: <span class="required">*</span></label>
                                <input type="email" id="email" name="email" placeholder="you@example.com" required>

                                <label for="password">Password: <span class="required">*</span></label>
                                <input type="password" id="password" name="password" placeholder="Enter Password" required>

                                <button type="button" class="otp-btn" id="sendOtpBtn">Send OTP</button>

                                <div id="otpSection" style="display:none;">
                                    <label for="otp">Enter OTP:</label>
                                    <input type="text" id="otp" name="otp"
                                        placeholder="Enter OTP received on email">
                                    <button type="button" class="btn-submit" id="verifyOtpBtn">Verify OTP &
                                        Register</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Welcome!',
            text: "{{ session('success') }}",
            background: '#fefefe',
            color: '#333',
            showConfirmButton: false,
            timer: 2200,
            timerProgressBar: true,
            backdrop: `
        rgba(0,0,0,0.3)
        url("https://sweetalert2.github.io/images/nyan-cat.gif")
        center left
        no-repeat
    `
        });
    </script>
@endif
