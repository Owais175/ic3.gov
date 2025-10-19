@extends('front.app')


@section('content')
    <main id="main-content" class="usa-prose grid-container tracking-container">

        <section class="track-order">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Id</th>
                        <th>Complainant Name</th>
                        <th>Complainant Business</th>
                        <th>Complainant Phone</th>
                        <th>Complainant Email</th>
                        <th>Victim Name</th>
                        <th>Victim Business</th>
                        <th>Victim Email</th>
                        <th>Victim Phone</th>
                        <th>Victim Country</th>
                        <th>Victim City</th>
                        <th>Victim Sector</th>
                        <th>Money Sent</th>
                        <th>Reported Loss</th>
                        <th>Incident Description</th>
                        <th>Law Enforcement</th>
                        <th>Witnesses</th>
                        <th>Digital Signature</th>
                        <th>Complaint Session</th>
                        <th>Created At</th>
                        <th>Complaint Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complaints as $index => $c)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $c->user_id }}</td>
                            <td>{{ $c->complainant_name ?? '-' }}</td>
                            <td>{{ $c->complainant_business_name ?? '-' }}</td>
                            <td>{{ $c->complainant_phone ?? '-' }}</td>
                            <td>{{ $c->complainant_email ?? '-' }}</td>
                            <td>{{ $c->victim_name ?? '-' }}</td>
                            <td>{{ $c->victim_business_name ?? '-' }}</td>
                            <td>{{ $c->victim_email ?? '-' }}</td>
                            <td>{{ $c->victim_phone ?? '-' }}</td>
                            <td>{{ $c->victim_country ?? '-' }}</td>
                            <td>{{ $c->victim_city ?? '-' }}</td>
                            <td>{{ $c->victim_sector ?? '-' }}</td>
                            <td>{{ $c->money_sent ? 'Yes' : 'No' }}</td>
                            <td>{{ $c->reported_loss ?? '-' }}</td>
                            <td>{{ Str::limit($c->incident_description, 60) ?? '-' }}</td>
                            <td>{{ $c->law_enforcement ?? '-' }}</td>
                            <td>{{ $c->witnesses ?? '-' }}</td>
                            <td>{{ $c->digital_signature ?? '-' }}</td>
                            <td>{{ $c->complaint_session ?? '-' }}</td>
                            <td>{{ $c->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                @if ($c->complaint_update)
                                    <span class="badge bg-success-green">Done</span>
                                @else
                                    <span class="badge bg-danger-red">Pending</span>

                                    @if (Auth::user()->role == 1)
                                        <form action="{{ route('complaint.approve', $c->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm bg-success-green">Approve</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

    </main>
@endsection
