@extends('front.app')


@section('content')

    <main id="main-content" class="usa-prose grid-container">

        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-fill-contact register-forms">
                            @if ($errors->any())
                                <div
                                    style="background: #f8d7da; color: #721c24; padding: 10px 15px; border-radius: 8px; margin-bottom: 15px;">
                                    <ul style="margin:0; padding-left:20px;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <form id="contactForm" method="POST" action="{{ route('registerdata') }}">
                                @csrf
                                <h3>Sign Up </h3>
                                <div class="field-grid">
                                    <div>
                                        <label for="name">Full name</label>
                                        <input id="name" name="name" type="text" required aria-required="true"
                                            placeholder="Jane Doe">
                                    </div>
                                </div>
                                <div class="field-grid">

                                    <div>
                                        <label for="email">Email address</label>
                                        <input id="email" name="email" type="email" required aria-required="true"
                                            placeholder="you@example.com">
                                    </div>
                                </div>

                                <div class="field-grid">
                                    <div>
                                        <label for="phone">Password</label>
                                        <input id="password" name="password" type="password" placeholder="">
                                    </div>

                                </div>
                                <div class="actions">
                                    <button type="submit" class="usa-button usa-button--big"
                                        id="submitBtn">Register</button>
                                </div>
                            </form>
                            <form id="contactForm" method="POST" action="{{ route('login') }}">
                                @csrf
                                <h3>Login </h3>
                                <div class="field-grid">

                                    <div>
                                        <label for="email">Email address</label>
                                        <input id="email" name="email" type="email" required aria-required="true"
                                            placeholder="you@example.com">
                                    </div>
                                </div>

                                <div class="field-grid">
                                    <div>
                                        <label for="phone">Password</label>
                                        <input id="password" name="password" type="password" placeholder="">
                                    </div>

                                </div>
                                <div class="actions">
                                    <button type="submit" class="usa-button usa-button--big" id="submitBtn">Login</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>


@endsection