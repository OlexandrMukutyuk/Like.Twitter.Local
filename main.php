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

$result = mysqli_query($connections, $sql);

if ($result) {

    while ($row = mysqli_fetch_assoc($result)) {
        $user_id = $row['user_id'];
        $user_query = mysqli_query($connections, "SELECT * FROM Users WHERE id = $user_id");
        if($_SESSION['user']->id != $row['user_id']){
            if ($user_query) {
                $user_row = mysqli_fetch_assoc($user_query);

                $htmlBlock = '<div class="result-block">';
                $htmlBlock .= '<div class="user-photo">';
                $htmlBlock .= '<img src="static/img/twitter_logo.png" alt="Фото користувача">';
                $htmlBlock .= '</div>';
                $htmlBlock .= '<div class="message-info">';
                $htmlBlock .= '<p class="message">' . $row['message'] . '</p>';
                $htmlBlock .= '<p class="user-name">Користувач: ' . $user_row['name'] . '</p>';
                $htmlBlock .= '<p class="time">Дата: ' . $row['time'] . '</p>';
                $htmlBlock .= '</div>';
                $htmlBlock .= '</div>';
            
                echo $htmlBlock;

                mysqli_free_result($user_query); // Звільнити результати запиту до user
            }
        }
    }

    mysqli_free_result($result);
} else {

    echo "Помилка: " . mysqli_error($connections);
}

// Закрийте підключення до бази даних
mysqli_close($connections);
?>




    </div>
</div>



<?php
    require('templates/foter_HTML.php');
?>