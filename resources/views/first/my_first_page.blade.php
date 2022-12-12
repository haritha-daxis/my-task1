<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>My First Page</h1>
    <form action="/form" method="post">
        @csrf();
    <input type="text" name="name" placeholder="Enter your name">
    <input type="submit" name="button" value="submit">
    </form>
</body>
</html>
