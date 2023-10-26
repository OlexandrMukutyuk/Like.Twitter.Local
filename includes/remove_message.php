<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $stmt = $connections->prepare("DELETE FROM post_message WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            header('Location: ../profile.php');
        } else {
            echo "Помилка видалення запису.";
        }
    } catch (PDOException $e) {
        echo "Помилка виконання запиту: " . $e->getMessage();
    }
} else {
    echo "Не вказано ID для видалення.";
}
?>
