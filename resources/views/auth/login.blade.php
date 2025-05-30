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
        }

        .login-container {
            height: 240px;
            background-color: #B7EBBD;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 4px 5px 5px rgba(0, 0, 0, 0.5)
            gap: 12px; /* spacing between buttons */
        }

        .form-group {
            margin: 20px;
        }

        label {
            color: rgba(0, 0, 0, 0.5);
            font-size: 20px;
        }

        input[type='email'],
        input[type='password'] {
            max-width: 300px;
            width: 200px;
            height: 25px;
            background-color: #ADDFB3;
            border: 2px solid rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }

        .form-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px; /* spacing between buttons */
        }

        .btn-primary {
            width: 100px;
            color: white;
            background-color: rgba(45, 29, 8, 0.886);
            border-style: none;
            border-radius: 5px;
            padding: 5px 12px;
            transition: transform 0.2s ease;
        }

        .btn-primary:hover {
            cursor: pointer;
            transform: scale(1.2);
        }

        .btn-secondary {
            background-color: #B7EBBD;
            text-decoration: none;
            color: rgba(45, 29, 8, 0.886);
            text-align: center;
            transition: background-color 0.2s ease, color 0.2s ease;
            border-radius: 5px;
            padding: 5px;
        }

        .btn-secondary:hover {
            background-color: #76b17d;
            color: white;
        }

    </style>
</head>
<body>
    <div class="login-container">
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
                <button type="submit" class="btn btn-primary">Log in</button>
                <a href="/" class="btn btn-secondary">Back to Posts</a>
            </div>
        </form>
    </div>
</body>
</html>
