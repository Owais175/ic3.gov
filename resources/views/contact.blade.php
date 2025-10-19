@extends('front.app')


@section('content')
    <main id="main-content" class="usa-prose grid-container">

        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-fill-contact">
                            <form id="contactForm" action="{{ route('contactsubmit') }}" method="POST">
                                @csrf
                                <div class="field-grid">
                                    <div>
                                        <label for="name">Full name</label>
                                        <input id="name" name="name" type="text" required aria-required="true"
                                            placeholder="Jane Doe">
                                    </div>

                                    <div>
                                        <label for="email">Email address</label>
                                        <input id="email" name="email" type="email" required aria-required="true"
                                            placeholder="you@example.com">
                                    </div>
                                </div>

                                <div class="field-grid">
                                    <div>
                                        <label for="phone">Phone</label>
                                        <input id="phone" name="phone" type="tel" placeholder="">
                                    </div>

                                    <div>
                                        <label for="address">Address</label>
                                        <input id="address" name="address" type="text"
                                            placeholder="City, State / Street (optional)">
                                    </div>
                                </div>

                                <div>
                                    <label for="message">Message</label>
                                    <textarea id="message" name="message" required aria-required="true" placeholder="Tell us what's on your mind..."
                                        minlength="10"></textarea>
                                </div>

                                <div class="actions">
                                    <button type="submit" class="usa-button usa-button--big" id="submitBtn">Send
                                        message</button>
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
            title: 'Message Sent!',
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
