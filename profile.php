<?php
require_once 'classes/user.php';

session_start();
$title = "Профіль";
if (!$_SESSION['user']) {
    header('Location: authorization.php');
}

require('templates/header_HTML.php');
require('templates/menu.php');


require_once 'includes/database.php'; 

$dbOperations = new DatabaseOperations();
echo $dbOperations->profile_data(); ?>


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
<script src="static/js/profile.js"></script>

<?php
require('templates/foter_HTML.php');
?>
