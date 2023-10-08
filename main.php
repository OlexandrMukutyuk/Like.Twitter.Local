<?php
require_once 'classes/user.php';
session_start();

if(!$_SESSION['user']){
    header('Location: authorization.php');
}

require('templates/header_HTML.php');

require('templates/menu.php');

?>





    </div>
</div>



<?php
    require('templates/foter_HTML.php');
?>