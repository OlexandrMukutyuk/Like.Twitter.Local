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

$user_id = $_SESSION['user']->id;
$sql = "SELECT * FROM post_message WHERE user_id = $user_id ORDER BY time DESC";

$result = mysqli_query($connections, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="result-block-user">';
            echo '<p id="mess">' . $row['message'] . '</p>';
            echo '<input type="hidden" id="hidden-data" value="' . $row['id'] . '">';
        echo '</div>';
    }
    mysqli_free_result($result);
} else {
    echo "Помилка: " . mysqli_error($connections);
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