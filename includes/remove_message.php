<?php
require_once 'database.php'; 

$dbOperations = new DatabaseOperations();
$id = $_GET['id'];
$dbOperations->deleteUserPost($id) ;

?>
