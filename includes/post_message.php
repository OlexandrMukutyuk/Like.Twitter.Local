<?php
session_start();
require_once 'connect.php';
$date = date('Y-m-d H:i:s');
echo $date;
if(!mysqli_query($connections, "INSERT INTO `post_message` (`id`, `user_id`, `message`, `time`) VALUES (NULL, '$_POST[user_id]', '$_POST[post_message_t]', '$date')")){
    $_SESSION['post_message'] = "Незмогли добавити повідомлення у базу даних";
}
else{
    $_SESSION['post_message'] = "Успішно зроблений пост";
}
header('Location: ../make_post.php');