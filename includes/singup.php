<?php

    session_start();

    require_once 'connect.php';
    require_once '../classes/user.php';
    
    $user = new User($_POST['login'],$_POST['email'],$_POST['full_name'],md5($_POST['password']));
    if(mysqli_query($connections, "INSERT INTO `Users` (`id`, `login`, `email`, `name`, `password`) VALUES (NULL, '$user->login', '$user->email', '$user->name', '$user->password')")){
       

        $check_user = mysqli_query($connections, "SELECT * FROM `Users` WHERE login = '$user->login' AND password = '$user->password'");

        if ($check_user) {
            $row = mysqli_fetch_assoc($check_user);
        
            if ($row) {
                unset($_SESSION['user']);
                $_SESSION['user'] = new User($row['login'], $row['email'],$row['name'],$row['password'],$row['avatar'],$row['id']);
                header('Location: ../main.php');
            }
        }
        
    }
    else{
        $_SESSION['errorLOGINorEMAIL'] = "Користувач із таким email або login вже існує";
        header('Location: ../register.php');
    }
    
    