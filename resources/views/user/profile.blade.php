@extends('front.app')


@section('content')
    <main id="main-content" class="usa-prose grid-container">

        <section class="user-profile">
            <div class="main-dashborad-flex">
                <div class="sidebar-user-profile">
                    @include('auth.include.sidebar')
                </div>
                <div class="dashborad-content">
                    <div class="profile-data">
                        <div class="manage-user">
                            <h3><span>Name:</span>{{ Auth::user()->name }}</h3>
                        </div>
                        <div class="manage-user">
                            <h3><span>Email:</span>{{ Auth::user()->email }}</h3>
                        </div>
                        <div class="manage-user">
                            <h3><span>Registered On:</span>{{ Auth::user()->created_at->format('d M Y') }}</h3>
                        </div>
                        <div class="edit-profile">
                            <a href="{{ route('user.edit') }}" class="usa-button usa-button--big">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
