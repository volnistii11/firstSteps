<?php

class M_Basket
{
    public function getBasket($session_id)
    {
        return M_DB::Select('SELECT basket.id as basket_id, 
       catalog.name as catalog_name, catalog.price as catalog_price FROM basket, catalog 
        WHERE basket.catalog_id = catalog.id AND session_id = :session_id', ['session_id' => $session_id]);
    }

    public function addToBasket($session_id,$catalog_id)
    {
        return M_DB::insert('INSERT INTO basket (session_id, catalog_id) VALUES (:session_id, :catalog_id)',
            ['session_id'=>$session_id,'catalog_id'=>$catalog_id]);
    }

    public function deleteFromBasket($basket_id)
    {
        return M_DB::delete('DELETE FROM basket WHERE id = :basket_id', ['basket_id'=>$basket_id]);
    }
}