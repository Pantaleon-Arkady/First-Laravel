<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @auth
        <h3>CRUD Home page</h3>
        <a class="btn btn-danger" href="/user-logout">Log out</a>
    @else
        <div class="border">
            <button onclick="showRegister()">Register</button>
            <button onclick="showLogin()">Log in</button>
        </div>
        <div class="border rounded px-4 py-2" id="registerForm">
            <h3>Register</h3>
            <form action="/user-register" method="POST" >
                @csrf
                <input type="text" name="name" placeholder="Enter a username..." />
                <input type="email" name="email" placeholder="Please enter your email..." />
                <input type="password" name="password" placeholder="Create a password..." />
                <button type="submit">Register</button>
            </form>
        </div>
        <div class="border rounded px-4 py-2" id="loginForm">
            <h3>Log In</h3>
            <form action="/user-login" method="POST" >
                @csrf
                <input type="text" name="logName" value="{{ old('logName') }}" placeholder="Username...">
                <input type="password" name="logPassword" placeholder="Password..." />
                <button type="submit">Log In</button>
            </form>
            @if ($errors->has('logName'))
                <div class="text-danger">{{ $errors->first('logName') }}</div>
            @endif
        </div>
    @endauth

</body>
</html>