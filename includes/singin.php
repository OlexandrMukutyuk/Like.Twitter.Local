<?php
    require_once '../classes/user.php';
    session_start();
    require_once 'connect.php';
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connections, "SELECT * FROM `Users` WHERE login = '$login' AND password = '$password'");

    if ($check_user) {
        $row = mysqli_fetch_assoc($check_user);
    
        if ($row) {
            unset($_SESSION['user']);
            $_SESSION['user'] = new User($row['login'], $row['email'],$row['name'],$row['password'],$row['avatar'],$row['id']);
            header('Location: ../main.php');
        }
    }
    else{
        $_SESSION['errorLOGINorEMAIL'] = "Користувач із таким email або login вже існує";
        header('Location: ../register.php');
    }