<?php
    require_once 'connect.php';
    $id = $_GET['id'];
    $mess = $_GET['mess'];

    mysqli_query($connections, "UPDATE post_message SET message = '$mess' WHERE id = $id");
    header('Location: ../profile.php');