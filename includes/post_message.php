<?php
print_r($_POST);
session_start();
require_once 'connect.php';

if(!mysqli_query($connections, "INSERT INTO `post_message`(`id`, `user_id`, `message`) VALUES (NULL,'$_POST[user_id]','$_POST[post_message_t]')")){
    $_SESSION['post_message'] = "Незмогли добавити повідомлення у базу даних";
}
$_SESSION['post_message'] = "Успішно зроблений пост";
header('Location: ../make_post.php');