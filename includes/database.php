<?php
session_start();
require_once '../classes/user.php';
class DatabaseOperations {
    private $connections;

    public function __construct() {
        try {
            $this->connections = new PDO('mysql:host=localhost;dbname=Twitter', 'root', '');
            $this->connections->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error: Could not connect to the database.');
        }
    }

    public function insertPostMessage($user_id, $post_message_t) {
        $date = date('Y-m-d H:i:s');
        try {
            $stmt = $this->connections->prepare("INSERT INTO post_message (user_id, message, time) VALUES (:user_id, :post_message_t, :date)");
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':post_message_t', $post_message_t, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                $_SESSION['post_message'] = "Успішно зроблений пост";
            } else {
                $_SESSION['post_message'] = "Незмогли добавити повідомлення у базу даних";
            }
        } catch (PDOException $e) {
            $_SESSION['post_message'] = "Помилка при виконанні запиту: " . $e->getMessage();
        }
        
        header('Location: ../make_post.php');
    }
    
    

    public function deleteUserPost($id) {
        try {
            $stmt = $this->connections->prepare("DELETE FROM post_message WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                header('Location: ../profile.php');
            } else {
                echo "Помилка видалення запису.";
            }
        } catch (PDOException $e) {
            echo "Помилка виконання запиту: " . $e->getMessage();
        }
    }

    public function login($login, $password) {
        try {
            $sql = "SELECT * FROM `Users` WHERE (login = :login OR email = :email) AND password = :password";
            $stmt = $this->connections->prepare($sql);
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt->bindParam(':email', $login, PDO::PARAM_STR);
            $stmt->bindParam(':password', md5($password), PDO::PARAM_STR);
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
    }

    public function createUser($login, $email, $name, $password) {
        try {
            $stmt = $this->connections->prepare("INSERT INTO `Users` (`id`, `login`, `email`, `name`, `password`) VALUES (NULL, :login, :email, :name, :password)");
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':password', md5($password), PDO::PARAM_STR);

            if ($stmt->execute()) {

                unset($_SESSION['user']);
                $_SESSION['user'] = new User($login, $email, $name, $password);
                header('Location: ../main.php');
                

            } else {

                $_SESSION['errorLOGINorEMAIL'] = "Користувач із таким email або login вже існує";
                header('Location: ../register.php');
                
            }
        } catch (PDOException $e) {
            $_SESSION['errorLOGINorEMAIL'] = "Користувач із таким email або login вже існує";
            header('Location: ../register.php');
        }
    }

    public function updatePostMessage($id, $mess) {
        try {
            $stmt = $this->connections->prepare("UPDATE post_message SET message = :mess WHERE id = :id");
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
    }

    public function __destruct() {
        $this->connections = null;
    }
}


?>
