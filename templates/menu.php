<?php
require_once 'classes/user.php';
session_start();
?>

<div class="container">
    <div class="sidebar">
        <div class="sidebar-content">
            <img src="static/img/twitter_logo.png">
            <ul>
                <li><img src="static/img/twitter_logo.png"><a>Головна</a></li>
                <li><img src="static/img/twitter_logo.png"><a>Профіль</a></li>
                <li><img src="static/img/twitter_logo.png"><a>Зробити Пост</a></li>
                <li>
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
    <div class="content">