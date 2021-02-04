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


//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
$params = [
    'count' => 2
];

switch ($page) {
    case 'index':
        $params['name'] = 'Alex';
        break;

    case 'catalog':
        $params['catalog'] = getCatalog();
        break;

    case 'gallery':
        if (!empty($_FILES)) {
            upload();
        }
        $params['gallery'] = getGallery();
        $messages = getStatus();
        $params['message'] = $messages[$_GET['message']];
        break;
    case 'galleryOne':
        $id = (int)$_GET['id'];
        $params['galleryOne'] = getOneGallery($id);
        break;
    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

_log($params, "render");
echo render($page, $params);
