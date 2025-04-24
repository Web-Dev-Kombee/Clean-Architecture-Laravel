@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4>User Profile</h4>
        </div>
        <div class="card-body">
            <p><strong>First Name:</strong> {{ $user->first_name }}</p>
            <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            <p><strong>Technologies Interested:</strong>
                @php
                    $techList = json_decode($user->technologies_interested ?? '[]', true);
                @endphp
                @if (!empty($techList))
                    <ul>
                        @foreach ($techList as $tech)
                            <li>{{ $tech }}</li>
                        @endforeach
                    </ul>
                @else
                    <span>None</span>
                @endif
            </p>

            <p><strong>Experience:</strong> {{ $user->experience }} {{ $user->experience == 1 ? 'year' : 'years' }}</p>

            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
