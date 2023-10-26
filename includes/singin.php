<?php
    require_once '../classes/user.php';
    session_start();
    require_once 'connect.php';
    
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    
    try {
        $sql = "SELECT * FROM `Users` WHERE (login = :login OR email = :email) AND password = :password";
        $stmt = $connections->prepare($sql);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':email', $login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            unset($_SESSION['user']);
            $_SESSION['user'] = new User($row['login'], $row['email'], $row['name'], $row['password'], $row['avatar'], $row['id']);
            header('Location: ../main.php');
        } else {
            $_SESSION['errorLOGINorEMAIL'] = "Користувач із таким email або login не існує";
            header('Location: ../register.php');
        }
    } catch (PDOException $e) {
        echo "Помилка: " . $e->getMessage();
    }
    

    