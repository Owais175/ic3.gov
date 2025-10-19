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
                        <section class="track-order user-contact-show">
                           <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact as $contacts)
                                    <tr>
                                         <td>{{ $contacts->id }}</td>
                                        <td>{{ $contacts->name }}</td>
                                        <td>{{ $contacts->email }}</td>
                                        <td>{{ $contacts->phone }}</td>
                                        <td>{{ $contacts->address }}</td>
                                        <td>{{ $contacts->message }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Message</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
