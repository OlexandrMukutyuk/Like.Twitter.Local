<?php
    require_once 'classes/user.php';
    session_start();
    if (!$_SESSION['user']){
        header('Location: authorization.php');
    }
    else{
        header('Location: main.php');
    }