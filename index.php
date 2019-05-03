<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="home.css" />
    <title>Document</title>
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['register'])) {
        ?>

        <div class="container">
            <?php
            echo $_SESSION['register'];
            header("Refresh: 3; Location: login.php");

            ?>
        </div>
    <?php

}


?>
</body>

</html>