<?php
session_start();

require_once 'database.php'; 

$dbOperations = new DatabaseOperations();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_message_t'])) {
    $user_id = $_POST['user_id'];
    $post_message_t = $_POST['post_message_t'];  

    $dbOperations->insertPostMessage($user_id, $post_message_t) ;

}
?>
