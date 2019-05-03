<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="account.css" />
    <title>Document</title>
</head>

<div class="container">
    <form method="post" action="auth.php">

        <div class="form-input"><input type="text" name="username" placeholder="Username" /> </div>
        <div class="form-input"><input type="text" name="firstname" placeholder="First name" /> </div>
        <div class="form-input"><input type="text" name="lastname" placeholder="Last name" /> </div>
        <div class="form-input"><input type="text" name="email" placeholder="E-mail" /> </div>
        <div class="form-input"><input type="password" name="password" placeholder="Password" minlength="4" /> </div>
        <div class="form-input"><input type="password" name="passwordconf" placeholder="Confirm password" minlength="4" /> </div>

        <button type="submit" name="update" class="btn-update">Update </button><br>
        <?php
        // if (isset($_SESSION['updateSucces'])) {

        //     echo $_SESSION['updateSucces'];
        //  }

        session_start();
        if (isset($_SESSION['updateSucces'])) {
            ?> 
                <?php echo $_SESSION['updateSucces'];
                ?>
            <?php
                    unset($_SESSION['updateSucces']);
                } ?>

    </form>
</div>