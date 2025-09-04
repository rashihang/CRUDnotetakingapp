<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    @auth
    <p>Logged in!!</p>
    @else
        <div style="border: 3px solid black;">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input name="name" type = "text" placeholder="name">
                <input  name="email" type = "text" placeholder="email">
                <input  name ="password" type = "text" placeholder="password">
                <button>Register</button>
            </form>
        </div>
    @endauth

</body>
</html>
