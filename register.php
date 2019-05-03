<?php
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="register.css" />
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    ?>

    <div class="container">
        <form method="post" action="auth.php">
        
            <div class="form-input"><input type="text" name="username" placeholder="Username" /> </div>
            <div class="form-input"><input type="text" name="firstname" placeholder="First name" /> </div>
            <div class="form-input"><input type="text" name="lastname" placeholder="Last name" /> </div>
            <div class="form-input"><input type="text" name="email" placeholder="E-mail" /> </div>
            <div class="form-input"><input type="password" name="password" placeholder="Password" minlength="4" /> </div>
            <div class="form-input"><input type="password" name="passwordconf" placeholder="Confirm password" minlength="4" /> </div>
            <?php if (isset($_SESSION['emptyFields'])) {
        ?> <div class="error">
            <?php echo $_SESSION['emptyFields'];
            ?>

        </div> <?php
                unset($_SESSION['emptyFields']);
            } ?>

            

<?php if (isset($_SESSION['pwValidation'])) {
        ?> <div class="error">
            <?php echo $_SESSION['pwValidation'];
            ?>

        </div> <?php
                unset($_SESSION['pwValidation']);
            } ?>

            
            
            <button type="submit" name="register" class="btn-register">Register</button>
            

        </form>
    </div>
</body>

</html>