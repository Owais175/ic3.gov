@extends('front.app')


@section('content')
    <main id="main-content" class="usa-prose grid-container">

        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-fill-contact register-forms">
                            <form id="contactForm">
                                @csrf
                                <input type="hidden" id="type" name="type" value="register">

                                <label for="name">Full Name: <span class="required">*</span></label>
                                <input type="text" id="name" name="name" placeholder="Your Full Name" required>

                                <label for="email">Email Address: <span class="required">*</span></label>
                                <input type="email" id="email" name="email" placeholder="you@example.com" required>

                                <label for="password">Password: <span class="required">*</span></label>
                                <input type="password" id="password" name="password" placeholder="Enter Password" required>

                                <button type="button" class="otp-btn" id="sendOtpBtn">Submit</button>

                                <div id="otpSection" style="display:none;">
                                    <label for="otp">Enter OTP:</label>
                                    <input type="text" id="otp" name="otp" placeholder="Enter OTP received on email">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

        $('#sendOtpBtn').click(function () {
            $.ajax({
                url: "{{ route('auth.sendOtp') }}",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    type: 'register',
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                },
                success: function (res) {
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'OTP Sent!',
                            text: res.message,
                            timer: 1500,
                            showConfirmButton: false
                        });
                        $('#otpSection').show();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.message
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: xhr.responseJSON?.message || 'Please check required fields.'
                    });
                }
            });
        });

        $('#verifyOtpBtn').click(function () {
            $.ajax({
                url: "{{ route('auth.verifyOtp') }}",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    type: 'register',
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    otp: $('#otp').val()
                },
                success: function (res) {
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registration Successful!',
                            text: 'Redirecting...',
                            timer: 1500,
                            showConfirmButton: false
                        });
                        setTimeout(() => window.location.href = res.redirect, 1500);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid OTP',
                            text: res.message
                        });
                    }
                }
            });
        });

    });
</script>