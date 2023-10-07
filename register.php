<?php
    $title = "Реєстраціця";
    require('templates/header_HTML.php');

?>
    <section class = "main_section">
        <div class = "login_img">
            <img src="static/img/twitter_logo.png">
        </div>
        <div class = reg_auth_form>    
            <form>
                <input type="text" id="login" name="login" required placeholder="Ведіть бажаний логін">
                <input type="email" id="email" name="email" required placeholder="Ведіть адрес електронної пошти">
                <input type="password" id="password" name="password" required placeholder="Пароль">
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Підтвердіть пароль">
                <button>Зареєструватись</button>
                <p>Маєте обліковий запис? <a href="authorization.php">Авторизуватись</a></p>
            </form>
        </div>
    </section>
    <script src="dist/main.js"></script>
    <script src = "static/js/register.js"></script>
<?php
    require('templates/foter_HTML.php');

?>
