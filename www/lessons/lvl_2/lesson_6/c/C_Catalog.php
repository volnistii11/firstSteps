<?php
//Контроллер страницы каталог

class C_Catalog extends C_Base
{
    public function action_getGoods()
    {
        $this->title .= '::Каталог';
        $obj_catalog = new M_Catalog();
        $catalog = $obj_catalog->getCatalogWithLimit(0, 2);
        $this->content = $this->Template('v/v_catalog.php', ['catalog' => $catalog]);
    }

    public function action_getOneGoods()
    {
        $this->title .= '::Каталог';
        $obj_catalog = new M_Catalog();

        $oneItem = $obj_catalog->getOneItem($_GET['catalog_id']);
        $this->content = $this->Template('v/v_catalogOne.php', ['catalog' => $oneItem]);
    }

    public function action_ShowMore()
    {
        $this->title .= '::Каталог';
        $obj_catalog = new M_Catalog();

        $countView = (int)$_POST['count_add'];  // количество записей, получаемых за один раз
        $startIndex = (int)$_POST['count_show']; // с какой записи начать выборку

        $newCatalog = [];
        $newCatalog = $obj_catalog->getCatalogWithLimit($startIndex, $countView);

        if (empty($newCatalog)) {
            // если новостей нет
            echo json_encode(array(
                'result' => 'finish'
            ));
        } else {
            // если новости получили из базы, то сформируем html элементы
            // и отдадим их клиенту
            $html = "";
            foreach ($newCatalog as $item) {
                $html .= "<p><a href='index.php?c=Catalog&act=getOneGoods&catalog_id={$item['id']} '> {$item['name']} </a>
            Цена: {$item['price']}
            <input id='add_toBasket' catalog_id='{$item['id']}' type='button' value='Добавить в корзину' /><hr>
        </p>";
            }
            echo json_encode(array(
                'result' => 'success',
                'html' => $html
            ), JSON_UNESCAPED_UNICODE);

        }
        die();
    }
}