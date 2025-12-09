<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/statics/bootstrap.min.css">
    <title>CRUD Home</title>
</head>
<body>
    <div>
        <h3>Register</h3>
        <form action="/user-register" method="POST" >
            @csrf
            <input type="text" name="name" placeholder="Enter a username..." />
            <input type="email" name="email" placeholder="Please enter your email..." />
            <input type="password" name="password" placeholder="Create a password..." />
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>