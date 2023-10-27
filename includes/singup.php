<?php
session_start();
require_once 'connect.php';
require_once '../classes/user.php';
require_once 'database.php'; 
$dbOperations = new DatabaseOperations();
$login = $_POST['login'];
$email = $_POST['email'];
$full_name = $_POST['full_name'];
$password = $_POST['password'];
$dbOperations->createUser( $login, $email, $full_name, $password);

?>
