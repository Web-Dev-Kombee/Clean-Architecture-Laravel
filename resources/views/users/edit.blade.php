@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('user.update') }}">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ auth()->user()->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ auth()->user()->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Update Profile</button>
    </form>

    <form method="POST" action="{{ route('user.delete') }}">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
    </form>
</div>
@endsection
