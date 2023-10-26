<?php
require_once 'classes/user.php';
session_start();
$title = "Зробити Пост";
if(!$_SESSION['user']){
    header('Location: authorization.php');
}
if ($_SESSION['post_message']){
    echo '<script>alert("'.$_SESSION['post_message'] .'");</script>';
    unset($_SESSION['post_message']);
}
require('templates/header_HTML.php');

require('templates/menu.php');

?>      
        <div class="make_post">
            <form id="post_message" action="includes/post_message.php" method="post">
                <textarea id="post_message_t" name="post_message_t" required placeholder="Введіть Ваше повідомлення"></textarea>
                <button type = "submit">Опублікувати</button>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']->id ?>">
            </form>
        </div>

    </div>
</div>


<script src="dist/main.js"></script>
    <script src = "static/js/make_post.js"></script>

<?php
    require('templates/foter_HTML.php');
?>