<?php

class M_Order
{
    public function addToOrder($order_number, $login, $address, $phone, $email, $status)
    {
        return M_DB::insert('INSERT INTO orders (order_number, login, address,phone, email, status) 
                                    VALUES (:order_number, :login, :address, :phone, :email, :status)',
            ['order_number' => $order_number, 'login' => $login, 'address' => $address, 'phone' => $phone, 'email' => $email, 'status' => $status]);
    }

    public function addIdOrderIdGoods($idOrder, $goods = [])
    {
        $sql = "INSERT INTO id_order_id_goods (id_order, id_catalog) VALUES ";
        foreach ($goods as $good) {
            $sql .= "({$idOrder}, {$good}),";
        }
        $sql = substr($sql, 0, -1);

        return M_DB::insert($sql);
    }

    public function selectOrder($login)
    {
        $orders = M_DB::Select('SELECT c.*, og.id_order
    FROM catalog c
        INNER JOIN id_order_id_goods og
            ON og.id_catalog = c.id AND og.id_order IN (
                SELECT order_number FROM orders WHERE login=:login
            )', ['login' => $login]);

        //Пересобираем массив, чтобы было удобно выводить заказы
        $new_order = [];
        foreach ($orders as $order) {
            $new_order[$order['id_order']][] = ['id'=>$order['id'], 'name'=>$order['name'], 'price'=>$order['price']];
        }
        return $new_order;
    }
}

