<?php
    $title = "Авторизація";
    require('templates/header_HTML.php');

?>
    <section class = "main_section">
        <div class = "login_img">
            <img src="static/img/twitter_logo.png">
        </div>
        <div class = reg_auth_form>    
            <form action="includes/singin.php" method="post">
                <input type="text" id="login" name="login" required placeholder="Логін або електронна пошта">
                <input type="password" id="password" name="password" required placeholder="Пароль">
                <button type = "submit">Увійти</button>
                <p>Немає облікового запису? <a href="register.php">Зареєструватись</a></p>
            </form>
        </div>
    </section>
<?php
    require('templates/foter_HTML.php');

?>
