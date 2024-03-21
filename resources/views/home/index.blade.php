<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
</head>

<body>

    <h2>Página Home</h2>

    <ul><!--Encapsular a li no <a> faz com que seja clicável-->
        <a href="{{ route('home.welcome') }}">
            <li>Welcome</li>
        </a>

        <a href="{{ route('home.hello') }}">
            <li>Hello</li>
        </a>

        <a href="{{ route('users.all') }}">
            <li>Users</li>
        </a>
    </ul>
</body>

</html>
