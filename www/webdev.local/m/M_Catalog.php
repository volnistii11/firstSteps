<?php

class M_Catalog
{
    public function getCatalogWithLimit( $startIndex, $countView) {
        return M_DB::Select('SELECT id, name, price, image FROM catalog WHERE 1 ORDER BY id DESC 
                                    LIMIT ' . (int)$startIndex . ', ' . (int)$countView);
    }

    public function getOneItem($id) {
        return M_DB::getRow('SELECT name, price, description FROM catalog WHERE id = :id',
            ['id' => $id]);
    }

}
