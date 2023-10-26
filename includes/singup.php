<?php
session_start();
require_once 'connect.php';
require_once '../classes/user.php';

$user = new User($_POST['login'], $_POST['email'], $_POST['full_name'], md5($_POST['password']));

try {
    $stmt = $connections->prepare("INSERT INTO `Users` (`id`, `login`, `email`, `name`, `password`) VALUES (NULL, :login, :email, :name, :password)");
    $stmt->bindParam(':login', $user->login, PDO::PARAM_STR);
    $stmt->bindParam(':email', $user->email, PDO::PARAM_STR);
    $stmt->bindParam(':name', $user->name, PDO::PARAM_STR);
    $stmt->bindParam(':password', $user->password, PDO::PARAM_STR);

    if ($stmt->execute()) {
         $stmt = $connections->prepare("SELECT * FROM `Users` WHERE login = :login AND password = :password");
        $stmt->bindParam(':login', $user->login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $user->password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                unset($_SESSION['user']);
                $_SESSION['user'] = new User($row['login'], $row['email'], $row['name'], $row['password'], $row['avatar'], $row['id']);
                header('Location: ../main.php');
            }
        }
    } else {
        $_SESSION['errorLOGINorEMAIL'] = "Користувач із таким email або login вже існує";
        header('Location: ../register.php');
    }
} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
?>
