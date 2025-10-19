@extends('front.app')


@section('content')
    <main id="main-content" class="usa-prose grid-container dashborad-styling">

        <section class="user-profile">
            <div class="main-dashborad-flex">
                <div class="sidebar-user-profile">
                    @include('auth.include.sidebar')
                </div>
                <div class="dashborad-content">
                    <div class="content-dashborad-pg">
                        <h1>Welcome {{ Auth::user()->name }}</h1>
                        <p> You are successfully logged in to your account. Explore your dashboard to manage your profile
                            and
                            activities.
                        </p>
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
            title: 'Welcome Back!',
            text: "{{ session('success') }}",
            background: '#fefefe',
            color: '#333',
            showConfirmButton: false,
            timer: 2500,
            backdrop: `
    rgba(0,0,123,0.2)
    url("/images/nyan-cat.gif")
    left top
    no-repeat
  `
        });
    </script>
@endif
