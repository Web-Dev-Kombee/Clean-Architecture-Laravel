@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Your Profile</h4>
                    <div class="avatar" style="width: 40px; height: 40px; color: #fff; font-size: 18px; display: flex; justify-content: center; align-items: center; border-radius: 50%; background-color: hsl({{ rand(0, 360) }}, 70%, 60%);">
                        {{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5 class="text-muted">Full Name</h5>
                            <p>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5 class="text-muted">Email</h5>
                            <p>{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5 class="text-muted">Experience</h5>
                            <p>{{ auth()->user()->experience }} {{ auth()->user()->experience == 1 ? 'year' : 'years' }}</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="text-muted">Technologies Interested</h5>
                        <ul class="list-inline">
                            @foreach (json_decode(auth()->user()->technologies_interested) as $tech)
                                <li class="list-inline-item badge bg-secondary">{{ $tech }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <!-- PDF Download Button -->
                    <a href="{{ route('user.pdf') }}" class="btn btn-outline-primary" target="_blank">
                        <i class="fas fa-file-pdf"></i> Download Profile as PDF
                    </a>

                    <!-- Update Profile Button -->
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-warning mx-2">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>

                    <!-- Delete Profile Button -->
                    <form method="POST" action="{{ route('profile.delete') }}" onsubmit="return confirm('Are you sure you want to delete your account?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash-alt"></i> Delete Account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
