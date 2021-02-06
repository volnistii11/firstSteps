<?php

//Первым делом подключим файл с константами настроек
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
$url_array = explode('/', $_SERVER['REQUEST_URI']);
if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

$params = prepareVariables($page);

_log($params, "render");
echo render($page, $params);
