<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex items-center justify-center">

    @auth
        <div class="text-center space-y-4">
            <h3 class="text-2xl font-semibold">CRUD Home page</h3>
            <a href="/user-logout"
               class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
                Log out
            </a>
        </div>
    @else

        <!-- Toggle Buttons -->
        <div class="border border-gray-400 p-4 rounded-md flex gap-4 justify-center mb-6">
            <button onclick="showRegister()"
                class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
                Register
            </button>
            <button onclick="showLogin()"
                class="px-4 py-2 bg-gray-300 text-gray-900 rounded hover:bg-gray-400 transition">
                Log in
            </button>
        </div>

        <!-- Register Form -->
        <div class="form-div" id="registerForm">
            <h3 class="text-xl font-semibold mb-3">Register</h3>
            <form action="/user-register" method="POST" class="space-y-3">
                @csrf
                <input type="text" name="name" placeholder="Enter a username..."
                       class="input-field"/>

                <input type="email" name="email" placeholder="Please enter your email..."
                       class="input-field"/>

                <input type="password" name="password" placeholder="Create a password..."
                       class="input-field"/>

                <button type="submit"
                        class="btn-secondary">
                    Register
                </button>
            </form>
        </div>

        <!-- Login Form -->
        <div class="form-div" id="loginForm">
            <h3 class="text-xl font-semibold mb-3">Log In</h3>

            <form action="/user-login" method="POST" class="space-y-3">
                @csrf

                <input type="text" name="logName" value="{{ old('logName') }}" placeholder="Username..."
                       class="input-field"/>

                <input type="password" name="logPassword" placeholder="Password..."
                       class="input-field"/>

                <button type="submit"
                        class="btn-secondary">
                    Log In
                </button>
            </form>

            @if ($errors->has('logName'))
                <div class="mt-2 text-sm text-red-500">{{ $errors->first('logName') }}</div>
            @endif
        </div>

    @endauth

</body>
</html>