<?php
try {
    $stmt = $connections->prepare("UPDATE post_message SET message = :mess WHERE id = :id");
     $stmt->bindParam(':mess', $mess, PDO::PARAM_STR);
     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
     if ($stmt->execute()) {
         header('Location: ../profile.php');
     } else {
         echo "Помилка при оновленні повідомлення.";
     }
 } catch (PDOException $e) {
     echo "Помилка: " . $e->getMessage();
 }
?>

