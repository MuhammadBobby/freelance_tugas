<?php
require "pages/functions/function.php";
session_start();

if (isset($_POST['login'])) {

    $username   = $_POST['username'];
    $password   = $_POST['password'];

    if ($username == 'parfumelabart' and $password == '12345') {
        session_start();
        $_SESSION["login"] = true;
        header("location: pages/index.php");
    } else {
        header("location: ?data=error");
    }
}

?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/logo parfume.png">

    <title>Login</title>
    <style>
    </style>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form class="form-signin" action="" method="POST">
            <?php if (isset($_GET["data"]) == "error") { ?>
                <h2 class="center-text">Username/Password Salah/Belum Login</h2>
            <?php } else { ?>
                <h2 class="form-signin-heading">Please sign in</h2>
            <?php } ?>
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
        </form>
    </div>
    <!-- /container -->
</body>

</html>