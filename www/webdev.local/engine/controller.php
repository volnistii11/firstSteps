<?php
//Файл с функциями нашего движка

function prepareVariables($page, $action) {
    //Для каждой страницы готовим массив со своим набором переменных
    //для подстановки их в соотвествующий шаблон
    $params = ['layout' => 'main'];

    switch ($page) {
        case 'index':
            $params['name'] = 'Alex';
            break;

        case 'catalog':
            $params['catalog'] = getCatalog();
            break;
        case 'catalogOne':
            //если не прокидать $params в функцию - затирает прежние параметры (layout)
            $params = doCatalogOneAction($params);
            break;

        case 'gallery':
            if (!empty($_FILES)) {
                upload();
            }
            $params['layout'] = 'gallery';
            $params['gallery'] = getGallery();
            $messages = getStatus();
            $params['message'] = $messages[$_GET['message']];
            break;
        case 'galleryOne':
            $id = (int)$_GET['id'];
            addLikes($id);
            $params['layout'] = 'gallery';
            $params['galleryOne'] = getOneGallery($id);
            break;
        case 'feedback':
            //если не прокидать $params в функцию - затирает прежние параметры (layout)
            $params = doFeedBackAction($params);
            break;
        case 'apicatalog':
            echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
            die();
    }
    return $params;
}
