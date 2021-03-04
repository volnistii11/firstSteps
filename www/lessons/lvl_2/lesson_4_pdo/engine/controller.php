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

            if (!empty(strip_tags(htmlspecialchars($_GET['action'])))) {
                catalogShowAjax();
                die();
            }
            break;
    }
    return $params;
}
