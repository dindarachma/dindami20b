<?php
include '../controller/Auth.php';

$ctrl = new Auth();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LoginFix</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css"> -->
</head>

<body>
    <section class="login-clean">
        <form method="post" action="<?php echo $ctrl->Login(); ?>">
            <h2 class="sr-only">Login Form</h2>
            <h1 class="text-center">Login</h1>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-secondary btn-block" type="submit">Log In</button></div><a class="forgot" href="#">Forgot your email or password?</a>
        </form>
    </section>
</body>

</html>