<?php
//Контроллер страницы каталог

class C_Catalog extends C_Base
{
    public function action_getGoods()
    {
        $this->title .= '::Каталог';
        $obj_catalog = new M_Catalog();
        $catalog = $obj_catalog->getCatalogWithLimit(0, 4);
        $this->content = $this->Template('v_catalog.php', ['catalog' => $catalog]);
    }

    public function action_getOneGoods()
    {
        $this->title .= '::Каталог';
        $obj_catalog = new M_Catalog();

        $oneItem = $obj_catalog->getOneItem($_GET['catalog_id']);
        $this->content = $this->Template('v_catalogOne.php', ['catalog' => $oneItem]);
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
                $html .= "<div class='col-sm-3'>
            <div class='card'>
            <img src='images/catalog/{$item['image']}' class='card-img-top' alt='image' height='300px'>
                <div class='card-body'>
                    <h5 class='card-title'><a
                                href='index.php?c=Catalog&act=getOneGoods&catalog_id={$item['id']}'>{$item['name']}</a>
                    </h5>
                    <p class='card-text'>Цена: {$item['price']}</p>
                    <button class='add_toBasket btn btn-primary' data-catalog_id='{$item['id']}'>Добавить в корзину</button>
                </div>
            </div><br>
        </div>";
            }
            echo json_encode(array(
                'result' => 'success',
                'html' => $html
            ), JSON_UNESCAPED_UNICODE);

        }
        die();
    }
}