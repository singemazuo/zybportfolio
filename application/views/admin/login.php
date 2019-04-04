<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Login</title>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-deep-dark">
    <div class="container" style="margin-top: 10em;">
        <div class="card m-auto w-50 mt-5 align-middle shadow-lg p-3 mb-5" style="padding-top: 3em;">
            <div class="card-title text-center">
                <h5>Administrator Login</h5>
            </div>
            <div class="card-body">
                <form action="admin/login/verify_account" method="POST" class="form-group">
                    <label for="username" class="ml-2">User name</label>
                    <br>
                    <input type="text" name="user_name" class="form-control w-100 mx-2">
                    <br>
                    <label for="username" class="ml-2">Password</label>
                    <br>
                    <input type="password" name="password" class="form-control w-100 mx-2">
                    <br><br>

                    <input type="submit" name="submit" class="form-control w-100 mx-2 bg-soft-blue txt-soft-white" value="Login" value="">
                </form>
            </div>
        </div>
    </div>
</body>
</html>