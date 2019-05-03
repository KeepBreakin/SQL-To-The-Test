<?php
include('header.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="login.css" />

    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['errorMsg'])) {
        ?> <div class="error">
            <?php echo $_SESSION['errorMsg'];
             ?>
        </div> <?php
                unset($_SESSION['errorMsg']);
            } ?>



    <div class="container">
        <form method="post" action="auth.php">
            <div class="form-input"><input type="text" name="username" placeholder="Username" /> </div>
            <div class="form-input"><input type="password" name="password" placeholder="Password" minlength="4" /> </div>
            <button type="submit" name="login" class="btn-login">LOGIN</button>
        </form>
    </div>
</body>

</html>