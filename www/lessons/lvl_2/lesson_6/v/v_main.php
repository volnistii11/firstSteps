<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <link rel="stylesheet" type="text/css" media="screen" href="/style.css"/>
</head>
<body>
<div id="header">
    <h1><?= $title ?></h1>
</div>

<div id="menu">
    <?php if (!$_SESSION['flag_auth']): ?>
        <a href="index.php?c=User&act=reg">Регистрация</a> |
        <a href="index.php?c=User&act=auth">Войти</a> |
    <?php else: ?>
        <a href="index.php?c=User&act=cab">Личный кабинет</a> |
        <a href="index.php?c=User&act=out">Выйти</a> |
    <?php endif; ?>
    <a href="index.php">Читать текст</a> |
    <a href="index.php?c=page&act=edit">Редактировать текст</a> |
    <a href="index.php?c=Catalog&act=getGoods">Каталог</a> |
    <a href="index.php?c=Basket&act=getBasket">Корзина</a>
</div>

<div id="content">
    <?= $content ?>
</div>

<div id="footer">
    Все права защищены. Адрес. Телефон.
</div>
</body>
</html>
