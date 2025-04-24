@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Profile Edit Form -->
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <!-- First Name -->
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- Technologies Interested -->
        <div class="form-group">
            <label>Technologies Interested</label><br>
            @php
                $technologies = ['PHP', 'Laravel', 'Vue.js', 'React', 'Node.js', 'Python', 'Django', 'Flutter', 'Java', 'Spring Boot'];
                $userTechnologies = json_decode($user->technologies_interested, true) ?? [];
            @endphp
            @foreach ($technologies as $tech)
                <label class="form-check">
                    <input type="checkbox" name="technologies_interested[]" value="{{ $tech }}" {{ in_array($tech, $userTechnologies) ? 'checked' : '' }}>
                    {{ $tech }}
                </label>
            @endforeach
        </div>

        <!-- Experience -->
        <div class="form-group">
            <label for="experience">Experience (in years)</label>
            <select name="experience" id="experience" class="form-control" required>
                @for ($i = 0; $i <= 25; $i++)
                    <option value="{{ $i }}" {{ $user->experience == $i ? 'selected' : '' }}>
                        {{ $i }} {{ $i == 1 ? 'year' : 'years' }}
                    </option>
                @endfor
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>

    <!-- Delete Account Form -->
    <form method="POST" action="{{ route('profile.delete') }}" onsubmit="return confirm('Are you sure you want to delete your account?');" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
</div>
@endsection
