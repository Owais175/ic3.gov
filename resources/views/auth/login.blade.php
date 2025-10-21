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

                <form id="loginform">
                    @csrf

                    <label for="login_id">LOGIN ID: <span class="required">*</span></label>
                    <input type="email" id="login_id" name="email" placeholder="Your Login Id" required>

                    <label for="mobile">MOBILE NO: <span class="required">*</span></label>
                    <div class="mobile-group">
                        <select name="country_code" id="country_code">
                            @foreach ($countries as $c)
                                <option value="{{ $c['country_code'] }}">{{ $c['name'] }} ({{ $c['country_code'] }})
                                </option>
                            @endforeach
                        </select>
                        <input type="text" id="mobile" name="mobile" placeholder="Mobile No." required>
                    </div>

                    <button type="button" class="otp-btn" id="getOtpBtn">Get OTP</button>

                    <label for="otp">OTP:</label>
                    <input type="text" id="otp" name="otp" placeholder="Your OTP Number">

                    <button type="button" class="btn-submit" id="verifyOtpBtn">Verify OTP</button>

                    <p class="forgot"><a href="#">Forgot Login Id</a></p>
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
    $(document).ready(function() {

        // Send OTP
        $('#getOtpBtn').click(function() {
            $.ajax({
                url: "{{ route('login.sendOtp') }}",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email: $('#login_id').val(),
                    mobile: $('#mobile').val(),
                    country_code: $('#country_code').val()
                },
                success: function(res) {
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'OTP Sent!',
                            text: res.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.message
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: xhr.responseJSON?.message ||
                            'Please check input fields.'
                    });
                }
            });
        });

        // Verify OTP
        $('#verifyOtpBtn').click(function() {
            $.ajax({
                url: "{{ route('login.verify') }}",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email: $('#login_id').val(),
                    otp: $('#otp').val()
                },
                success: function(res) {
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful!',
                            text: 'Redirecting to dashboard...',
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
