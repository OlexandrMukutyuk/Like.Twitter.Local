<?php
require_once 'classes/user.php';
session_start();
?>

<div class="container">
    <div class="sidebar">
        <div class="sidebar-content">
            <img id="home_img" src="static/img/twitter_logo.png">
            <ul>
                <li id="home"><img src="static/img/twitter_logo.png"><a>Головна</a></li>
                <li id="profile"><img src="static/img/twitter_logo.png"><a>Профіль</a></li>
                <li id="make-post"><img src="static/img/twitter_logo.png"><a>Зробити Пост</a></li>
                <li id="user-info">
                    <div class="item">
                        <img src="static/img/twitter_logo.png">
                        <div class="text">
                            <p>Ім'я: <?php echo $_SESSION['user']->name ?></p>
                            <p>Логін: <?php echo $_SESSION['user']->login ?></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div id="popup" class="popup">
        <h1>Ви дійсно хочете вийти із акауну</h1>
        <button id="logout-button">Вийти</button>
    </div>
    <div class="content">

    <script src="dist/main.js"></script>
    <script src = "static/js/menu.js"></script>