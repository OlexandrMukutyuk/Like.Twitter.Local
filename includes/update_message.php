<?php
require_once '../classes/user.php';
$id = $_GET['id'];
$mess = $_GET['mess'];

require_once 'database.php'; 

$dbOperations = new DatabaseOperations();
$dbOperations->updatePostMessage($id, $mess);

?>
