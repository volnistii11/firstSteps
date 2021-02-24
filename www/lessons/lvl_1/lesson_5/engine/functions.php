<?php
//Файл с функциями нашего движка

function prepareVariables($page) {
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
        case 'apicatalog':
            echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
            die();
    }
    return $params;
}


//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params) {
    return renderTemplate(LAYOUTS_DIR . $params['layout'], [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}


//$params = [
//    'menu' => renderTemplate('menu'),
//    'content' => renderTemplate('catalog')
//];
//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemplate($page, $params = []) {

    extract($params);
//    foreach ($params as $key => $value) {
//        $$key = $value;
//    }
    ob_start();
    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    }
    return ob_get_clean();
}