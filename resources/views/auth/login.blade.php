@extends('front.app')


@section('content')
    <main id="main-content" class="usa-prose grid-container login-blade-file">
        <div class="checklist-complainant">
            <div class="citizen-login-container complain-citizen">
                <h2>CHECKLIST FOR COMPLAINANT
                </h2>
                <p class="para-purple">Please ensure you have the following information before submitting your complaint
                    through
                    the
                    <strong>Cyber Rapid
                        Action Unit (CRAU)</strong> portal:
                </p>
                <h3>Mandatory Information
                </h3>
                <ul>
                    <li>
                        <p>Date and time of the incident.
                        </p>
                    </li>
                    <li>
                        <p><strong>Brief description</strong> of the incident (minimum 200 characters).
                        </p>
                    </li>
                    <li>
                        <p><strong>Valid ID proof</strong> of the complainant (Voter ID, Aadhaar, PAN, Passport, or Driving
                            License) in
                            .jpeg, .jpg, or .png format (max size 5 MB).
                        </p>
                    </li>
                    <li>
                        <p><strong>For financial or online fraud cases</strong>, please also keep:

                        </p>
                        <ul>
                            <li>
                                <p> Name of <strong>bank / wallet / platform</strong> involved.</p>
                            </li>
                            <li>
                                <p> <strong>Transaction ID / UTR number.</strong> </p>
                            </li>
                            <li>
                                <p><strong>Date and time</strong> of transaction.
                                </p>
                            </li>
                            <li>
                                <p> <strong>Amount involved.
                                    </strong> </p>
                            </li>
                            <li>
                                <p> Supporting <strong>evidence files</strong> (transaction screenshots, SMS, emails, etc.)
                                    not exceeding 10
                                    MB each.
                                </p>
                            </li>
                        </ul>
                    </li>
                </ul>
                <h3>Additional / Helpful Information</h3>
                <p>1 <strong>Suspect details</strong> (if known) – mobile number, email, or account ID.
                </p>
                <p>2 <strong>Suspicious links or social media handles</strong> involved.
                </p>
                <p>3 <strong>Proofs / screenshots / chat records</strong> related to the cyber incident (in .jpeg, .jpg,
                    .png,
                    up to 5 MB).
                </p>
                <p>4 Any <strong>other document</strong> that may assist the investigation.</p>
            </div>
            <div class="citizen-login-container">
                <h2>CITIZEN LOGIN</h2>
                <p><a href="{{ route('auth.register') }}">Click Here for New User</a></p>

                <form id="registerForm">
                    @csrf
                    <input type="hidden" id="type" name="type" value="login">

                    <label for="login_id">LOGIN ID: <span class="required">*</span></label>
                    <input type="email" id="login_id" name="email" placeholder="Enter Your Email" required>

                    <label for="mobile">MOBILE NO: <span class="required">*</span></label>
                    <div class="mobile-group">
                        <select name="country_code" id="country_code">
                            @foreach ($countries as $c)
                                <option value="{{ $c['country_code'] }}">{{ $c['name'] }} ({{ $c['country_code'] }})</option>
                            @endforeach
                        </select>
                        <input type="text" id="mobile" name="mobile" placeholder="Mobile No." required>
                    </div>

                    <button type="button" class="otp-btn" id="getOtpBtn">Submit</button>

                    <label for="otp">OTP:</label>
                    <input type="text" id="otp" name="otp" placeholder="Your OTP Number">

                    <button type="button" class="btn-submit" id="verifyLoginOtpBtn">Verify OTP</button>

                    <!-- <p class="forgot"><a href="#">Forgot Login Id</a></p> -->
                </form>

            </div>
        </div>
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

    // 🔹 SEND OTP
    $(document).on('click', '#sendOtpBtn, #getOtpBtn', function () {
        const $btn = $(this);
        const originalText = $btn.text();

        $btn.prop('disabled', true).text('Sending...');

        const formType = $(this).closest('form').find('#type').val();
        const email = formType === 'register' ? $('#email').val() : $('#login_id').val();
        const mobile = formType === 'login' ? $('#mobile').val() : '';
        const country_code = formType === 'login' ? $('#country_code').val() : '';

        $.ajax({
            url: "{{ route('auth.sendOtp') }}",
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                type: formType,
                email: email,
                mobile: mobile,
                country_code: country_code
            },
            success: function (res) {
                if (res.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'OTP Sent!',
                        text: res.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    if (formType === 'register') $('#otpSection').slideDown();
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
                    text: xhr.responseJSON?.message || 'Please check input fields.'
                });
            },
            complete: function () {
                $btn.prop('disabled', false).text(originalText);
            }
        });
    });

    // 🔹 VERIFY OTP
    $(document).on('click', '#verifyOtpBtn, #verifyLoginOtpBtn', function () {
        const $btn = $(this);
        const originalText = $btn.text();

        $btn.prop('disabled', true).text('Verifying...');

        const formType = $(this).closest('form').find('#type').val();
        const email = formType === 'register' ? $('#email').val() : $('#login_id').val();
        const name = formType === 'register' ? $('#name').val() : '';
        const password = formType === 'register' ? $('#password').val() : '';
        const otp = $(this).closest('form').find('#otp').val();

        $.ajax({
            url: "{{ route('auth.verifyOtp') }}",
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                type: formType,
                name: name,
                email: email,
                password: password,
                otp: otp
            },
            success: function (res) {
                if (res.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: res.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    setTimeout(() => window.location.href = res.redirect, 1500);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: res.message
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.'
                });
            },
            complete: function () {
                $btn.prop('disabled', false).text(originalText);
            }
        });
    });

});
</script>
