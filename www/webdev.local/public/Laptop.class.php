<?php
include "Goods.class.php";

class Laptop extends Goods{
    private $model;

    function __construct($type, $price, $name, $model)
    {
        parent::__construct($type, $price, $name);
        $this->model = $model;
    }

    public function show() {
        return Goods::show() . ", модель: " . $this->model . "<hr>";
    }
}

$msi = new Laptop("Ноутбук", "60000", "MSI", "GL63");
echo $msi->show();