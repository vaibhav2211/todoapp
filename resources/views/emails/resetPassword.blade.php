<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="http://localhost:8001/reset-password" style="text-align: center;">
        <input type="hidden" name="token" value="{{$token}}">
        <input type="hidden" name="userId" value="{{$id}}">
        <h2>Click below to reset your password</h2>
        <button style="padding: 20px 40px;background:green;color:white;border:none">Reset Password</button>
    </form>
</body>
</html>