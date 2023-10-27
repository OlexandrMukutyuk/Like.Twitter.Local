<?php
require_once 'classes/user.php';
session_start();
$title = "Головна";
if (!$_SESSION['user']) {
    header('Location: authorization.php');
}

require('templates/header_HTML.php');
require('templates/menu.php');

require_once 'includes/database.php'; 
$dbOperations = new DatabaseOperations();
?>

<div class="main-content">
    <?php echo $dbOperations->mainWindow_data(); ?>
</div>

<?php
require('templates/foter_HTML.php');
?>
