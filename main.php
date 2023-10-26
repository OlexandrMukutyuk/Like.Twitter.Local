<?php
require_once 'classes/user.php';
session_start();
$title = "Головна";
if(!$_SESSION['user']){
    header('Location: authorization.php');
}

require('templates/header_HTML.php');

require('templates/menu.php');

?>
<?php
require_once 'includes/connect.php';

$sql = "SELECT * FROM post_message ORDER BY time DESC";

try {
    $stmt = $connections->query($sql);

    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user_id = $row['user_id'];
            $user_query = $connections->query("SELECT * FROM Users WHERE id = $user_id");

            if ($_SESSION['user']->id != $row['user_id'] && $user_query) {
                $user_row = $user_query->fetch(PDO::FETCH_ASSOC);

                $htmlBlock = '<div class="result-block">';
                $htmlBlock .= '<div class="user-photo">';
                $htmlBlock .= '<img src="static/img/twitter_logo.png" alt="Фото користувача">';
                $htmlBlock .= '</div>';
                $htmlBlock .= '<div class="message-info">';
                $htmlBlock .= '<p class="message">' . htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8') . '</p>';
                $htmlBlock .= '<p class="user-name">Користувач: ' . htmlspecialchars($user_row['name'], ENT_QUOTES, 'UTF-8') . '</p>';
                $htmlBlock .= '<p class="time">Дата: ' . $row['time'] . '</p>';
                $htmlBlock .= '</div>';
                $htmlBlock .= '</div>';

                echo $htmlBlock;

                $user_query->closeCursor(); // Звільнити результати запиту до user
            }
        }
        $stmt->closeCursor(); // Звільнити результати основного запиту
    }
} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
?>





    </div>
</div>



<?php
    require('templates/foter_HTML.php');
?>