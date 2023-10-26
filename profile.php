<?php
require_once 'classes/user.php';
session_start();
$title = "Профіль";
if(!$_SESSION['user']){
    header('Location: authorization.php');
}

require('templates/header_HTML.php');

require('templates/menu.php');

?>
<div class = "title">
    <h1>Ваші пости</h1>
</div>
<?php
require_once 'includes/connect.php';

if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']->id;
    
    $sql = "SELECT * FROM post_message WHERE user_id = :user_id ORDER BY time DESC";
    
    try {
        $stmt = $connections->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="result-block-user">';
            echo '<p class="message">' . htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8') . '</p>';
            echo '<input type="hidden" class="hidden-data" value="' . $row['id'] . '">';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo "Помилка: " . $e->getMessage();
    }
} else {
    echo "Користувач не авторизований.";
}

?>

<div class="redact-modal hidden">
    <div class="redact-content">
        <input type="hidden" id="hidden-input" value="">
        <textarea id="redact-textarea"></textarea>
        <button id="edit-button">Редагувати</button>
        <button id="delete-button">Видалити</button>
    </div>
</div>


    </div>
</div>


<script src="dist/main.js"></script>
<script src = "static/js/profile.js"></script>
<?php
    require('templates/foter_HTML.php');
?>