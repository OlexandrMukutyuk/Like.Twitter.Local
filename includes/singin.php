<?php
    require_once '../classes/user.php';
    session_start();
    require_once 'connect.php';
    
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    require_once 'database.php'; 

    $dbOperations = new DatabaseOperations();
    $dbOperations->login($login, $password);
    

    