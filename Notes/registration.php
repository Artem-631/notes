<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <div class="wrapper">
        <div class="form">
            <form id="form" method="POST" action="<?php require 'php.php'?>">
                <input type="text" name="login" placeholder="Логин" id="login"><br>
                <input type="password" name="password" placeholder="Пароль" id="password"><br>
                <input type="submit" value="Регистрация" id="submit"><br>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>