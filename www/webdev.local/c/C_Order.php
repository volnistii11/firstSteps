<?php

class C_Order extends C_Base
{
    public function action_order()
    {
        if (!empty($_SESSION['login']))
        {
            $this->title .= '::Ваши заказы';
            $login = $_SESSION['login'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $order_number = mt_rand();
            //Добавляем данные о заказчике в таблицу orders
            $obj_order = new M_Order();
            $lastOrder = $obj_order->addToOrder($order_number, $login, $address, $phone, $email, 'в обработке');

            //Выцепляем все продукты из таблицы basket по session_id
            $session_id = $_POST['session_id'];
            $order_goods = M_Basket::getBasket($session_id);

            $catalog_id = [];
            foreach ($order_goods as $item){
                $catalog_id[] = $item['catalog_id'];
            }

            //Записываем в таблицу id_order_id_goods связь между заказом и товарами из каталога
            $obj_order->addIdOrderIdGoods($order_number,$catalog_id);

            //Выводим все товары из каталога(все заказы) по номеру логина
            $orders = $obj_order->selectOrder($login);
            $this->content = $this->Template('v_cab.php', ['orders' => $orders]);
        }
        else {
            $this->title .= '::Авторизация';
            $info = "Авторизуйтесь, преждем чем оформить заказ.";
            $_SESSION['flag_auth'] = NULL;
            $this->content = $this->Template('v_auth.php', ['text' => $info]);
        }




    }
}
