<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if(count($errors)>0)
    <div class="error">
        @foreach($errors->all() as $error)
            <p>{!! $error !!}</p>
        @endforeach
    </div>
@endif
<form action="" method="post">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="user"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td><input type="submit" name="btnLogin" value="Login"></td>
        </tr>
    </table>
</form>
</body>
</html>
