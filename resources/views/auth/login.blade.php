<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'QuickSand', serif, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .login-container {
            background-color: #3c6e71;
            padding: 3rem 4rem;
            border-radius: 20px;
            box-shadow: 4px 5px 5px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            color: white;
            font-family: serif;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        label {
            color: rgba(0, 0, 0, 0.7);
            font-size: 18px;
            margin-bottom: 4px;
        }

        input[type='email'],
        input[type='password'] {
            width: 280px;
            height: 30px;
            background-color: #d9d9d9;
            border: 2px solid rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            padding: 4px 8px;
            font-size: 16px;
        }

        .form-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            margin-top: 1.5rem;
        }

        .btn-primary {
            width: 120px;
            color: white;
            background-color: rgba(45, 29, 8, 0.886);
            border-style: none;
            border-radius: 5px;
            padding: 6px 12px;
            font-size: 16px;
            transition: transform 0.2s ease;
        }

        .btn-primary:hover {
            cursor: pointer;
            transform: scale(1.1);
        }

        .btn-secondary {
            background-color: #d9d9d9;
            text-decoration: none;
            color: rgba(45, 29, 8, 0.886);
            border: 2px solid rgba(45, 29, 8, 0.886);
            text-align: center;
            border-radius: 5px;
            padding: 6px 12px;
            font-size: 16px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: #3c6e71;
            color: white;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 2px;
        }

        .status-message {
            color: green;
            font-weight: bold;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>login page.</h1>

        @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Log in</button>
                <a href="/" class="btn-secondary">Back to Posts</a>
            </div>
        </form>
    </div>
</body>
</html>
