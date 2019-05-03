<?php
require('header.php');
session_start();


// REGISTER PAGE

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['passwordconf'];

    $pwHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
    $pwHash2 = password_hash($password2, PASSWORD_BCRYPT, array("cost" => 12));


    if (empty($username) || empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($password2)) {
        $_SESSION['emptyFields'] = 'There are some empty fields';
        header('location: register.php');
    } else if ($password != $password2) {
        $_SESSION['pwValidation'] = 'Passwords do not match, try again';
        header('location: register.php');
    } else {
        $sql = "INSERT INTO Users (Username,Firstname,Lastname,Email,Password,Password2) 
VALUES (:username, :firstname, :lastname, :email, :password, :password2)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $pwHash);
        $stmt->bindValue(':password2', $pwHash2);

        $stmt->execute();

        if ($stmt) {
            $_SESSION['register'] = 'Thank U for registering!';
            header("Location: index.php");
        } else {
            $_SESSION['register'] = 'Registration failed';
            header("Location: register.php");
        }
    }
}

// LOGIN PAGE

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $errormsg = "Username or Password is invalid";



    if (empty($_POST['username']) || empty($_POST['password'])) {

        $_SESSION['errorMsg'] =  $errormsg;

        header('Location: login.php');
    } else {

        $sql = "SELECT * FROM Users WHERE Username = :username AND Password = :password";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {

            $_SESSION['login-user'] = $user;
            $_SESSION['password'] = $user;
            header("Location: home.php");
        } else {
            $_SESSION['errorMsg'] =  'Could not find a user with that username!';
            header('Location: login.php');
        }
    }
}


// UPDATE

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];


    $sql = "UPDATE Users SET Username=:username, Firstname=:firstname, Lastname=:lastname, Email=:email WHERE Username = '$username'";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':email', $email);

    $result = $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    

    if ($result) {
       $_SESSION['updateSucces'] = 'Updated succesfully';
       header('Location: account.php');
        
    } else {
        // $_SESSION['updateFail'] = 'Update failed';

        echo 'fail';
        // $_SESSION['updateFail'] = 'failed';
        // header('Location: account.php');    
   
    }
}
