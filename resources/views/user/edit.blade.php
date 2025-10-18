@extends('front.app')


@section('content')
    <main id="main-content" class="usa-prose grid-container">

        <section class="user-profile">
            <div class="main-dashborad-flex">
                <div class="sidebar-user-profile">
                    @include('auth.include.sidebar')
                </div>
                <div class="dashborad-content">
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
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form id="contactForm" method="POST" action="{{ route('user.update') }}">
                        <h4>Edit Profile <a href="{{ route('dashboard') }}" class="usa-button usa-button--big">Back</a>
                        </h4>
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <div>
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" required aria-required="true"
                                    value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" required aria-required="true"
                                    value="{{ old('email', $user->email) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password (optional)</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="actions">
                            <button type="submit" class="usa-button usa-button--big" id="submitBtn">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
