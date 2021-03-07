<?php
function getCatalog() {
return getAssocResult("SELECT id, name, price FROM catalog WHERE 1 ORDER BY id DESC LIMIT 2");
}

function catalogShowAjax() {

    $countView = (int)$_POST['count_add'];  // количество записей, получаемых за один раз
    $startIndex = (int)$_POST['count_show']; // с какой записи начать выборку

    $newCatalog = [];
    $newCatalog = getAssocResult("SELECT id, name, price FROM catalog WHERE 1 ORDER BY id DESC LIMIT {$startIndex}, {$countView}");

    if(empty($newCatalog)) {
        // если новостей нет
        echo json_encode(array(
            'result'    => 'finish'
        ));
    } else {
        // если новости получили из базы, то сформируем html элементы
        // и отдадим их клиенту
        $html = "";
        foreach($newCatalog as $item){
            $html .= "<p><a href='/catalogOne/?catalog_id={$item['id']} '> {$item['name']} </a>
            Цена: {$item['price']}
            <button>Купить</button>
        </p>";
        }
        echo json_encode(array(
            'result'    => 'success',
            'html'      => $html
        ), JSON_UNESCAPED_UNICODE);
    }
}