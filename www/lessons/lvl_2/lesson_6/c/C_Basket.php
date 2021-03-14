<?php

class C_Basket extends C_Base
{
    public function action_getBasket()
    {
        $this->title .= '::Корзина';
        $obj_basket = new M_Basket();
        $session_id = session_id();
        $basket = $obj_basket->getBasket($session_id);
        $this->content = $this->Template('v/v_basket.php', ['basket' => $basket]);
    }


    public function action_addToBasket()
    {
        $this->title .= '::Каталог';
        $obj_basket = new M_Basket();
        $session_id = session_id();

        $newBasket = $obj_basket->addToBasket($session_id, $_POST['catalog_id']);

        if (!empty($newBasket)) {
            echo json_encode(array(
                'result' => 'success'
            ));
        }
        die();
    }

    public function action_deleteFromBasket()
    {
        $this->title .= '::Корзина';
        $obj_basket = new M_Basket();

        $deletedBasket = $obj_basket->deleteFromBasket($_POST['basket_id']);

        if (!empty($deletedBasket)) {
            echo json_encode(array(
                'result' => 'success'
            ));
        }
        die();
    }
}