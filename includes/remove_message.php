<?php
    require_once 'connect.php';
    $id = $_GET['id'];
    mysqli_query($connections, "DELETE FROM post_message WHERE `post_message`.`id` = $id");
    header('Location: ../profile.php');