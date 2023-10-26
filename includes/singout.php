<?php
    require_once '../classes/user.php';
    session_start();
    unset($_SESSION['user']);
    header('Location: ../main.php');
