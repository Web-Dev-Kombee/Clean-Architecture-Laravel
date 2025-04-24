<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6e7dff, #4a90e2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            padding: 30px;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: 600;
            color: #555;
            font-size: 1rem;
        }
        .form-control {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #4a90e2;
            background-color: #fff;
            outline: none;
        }
        .form-control.invalid {
            border-color: #f44336;
        }
        .form-control.valid {
            border-color: #4CAF50;
        }
        .form-check {
            display: inline-block;
            margin-right: 15px;
            font-size: 0.95rem;
            color: #555;
        }
        .form-check input {
            margin-right: 5px;
        }
        .btn-primary {
            width: 100%;
            padding: 14px;
            background-color: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #357ab7;
        }
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 1rem;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .feedback {
            font-size: 0.9rem;
            color: #f44336;
        }
        .valid-feedback {
            color: #4CAF50;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>User Registration</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Registration Form -->
    <form method="POST" action="{{ route('register.submit') }}" id="registration-form">
        @csrf

        <div class="form-group">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter your first name" required>
            <small id="first_name-feedback" class="feedback"></small>
        </div>

        <div class="form-group">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your last name" required>
            <small id="last_name-feedback" class="feedback"></small>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            <small id="email-feedback" class="feedback"></small>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            <small id="password-feedback" class="feedback"></small>
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm your password" required>
        </div>

        <div class="form-group">
            <label class="form-label">Technologies Interested</label><br>
            @php
                $technologies = ['PHP', 'Laravel', 'Vue.js', 'React', 'Node.js', 'Python', 'Django', 'Flutter', 'Java', 'Spring Boot'];
            @endphp
            @foreach ($technologies as $tech)
                <label class="form-check">
                    <input type="checkbox" name="technologies_interested[]" value="{{ $tech }}">
                    {{ $tech }}
                </label>
            @endforeach
        </div>

        <div class="form-group">
            <label for="experience" class="form-label">Experience (in years)</label>
            <select name="experience" id="experience" class="form-control" required>
                @for ($i = 0; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'year' : 'years' }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn-primary">Register</button>
    </form>
</div>

<script>
    document.getElementById('email').addEventListener('input', function () {
        const email = this.value;
        const emailFeedback = document.getElementById('email-feedback');
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        
        if (!emailPattern.test(email)) {
            emailFeedback.textContent = 'Please enter a valid email address.';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            emailFeedback.textContent = 'Valid email address.';
            emailFeedback.classList.add('valid-feedback');
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    document.getElementById('password').addEventListener('input', function () {
        const password = this.value;
        const passwordFeedback = document.getElementById('password-feedback');
        
        if (password.length < 6) {
            passwordFeedback.textContent = 'Password should be at least 6 characters long.';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            passwordFeedback.textContent = 'Password is strong.';
            passwordFeedback.classList.add('valid-feedback');
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    // Restrict first name and last name to alphabets only
    document.getElementById('first_name').addEventListener('input', function () {
        this.value = this.value.replace(/[^a-zA-Z]/g, ''); // Allow only alphabets
        document.getElementById('first_name-feedback').textContent = '';
    });

    document.getElementById('last_name').addEventListener('input', function () {
        this.value = this.value.replace(/[^a-zA-Z]/g, ''); // Allow only alphabets
        document.getElementById('last_name-feedback').textContent = '';
    });
</script>

</body>
</html>
