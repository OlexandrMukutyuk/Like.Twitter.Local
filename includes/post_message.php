<?php
session_start();
require_once 'connect.php'; 

$date = date('Y-m-d H:i:s');
echo $date;

try {
    $stmt = $connections->prepare("INSERT INTO post_message (user_id, message, time) VALUES (?, ?, ?)");
    if ($stmt->execute([$_POST['user_id'], $_POST['post_message_t'], $date])) {
        $_SESSION['post_message'] = "Успішно зроблений пост";
    } else {
        $_SESSION['post_message'] = "Незмогли добавити повідомлення у базу даних";
    }
} catch (PDOException $e) {
    $_SESSION['post_message'] = "Помилка при виконанні запиту: " . $e->getMessage();
}

header('Location: ../make_post.php');
?>
