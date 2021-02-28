<?php

//Первым делом подключим файл с константами настроек
include "../config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}


//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
$params = [];

switch ($page) {
    case 'index':
        $params['name'] = 'Elijah';
        break;

    case 'gallery':
        $params['gallery'] = getGallery();
        break;
}

echo render($page, $params);
