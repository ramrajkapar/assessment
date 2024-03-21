<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Github Login</title>
</head>
<body>
    <div style="display:flex;justify-content:center;align-items:center;min-height:100vh;background:rgb(241, 187, 187);">
        <form action="{{route('github.login')}}" >
            @csrf
            <button style="background:rgb(28, 28, 28);padding:10px;color:white;">Login with Github</button>
        </form>
    </div>
</body>
</html>