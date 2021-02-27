<?php

include "Goods.class.php";

class WeightGoods extends Goods
{
    private $price;
    private $quantitySoldKilo;

    function __construct($type, $name, $price, $quantitySoldKilo)
    {
        parent::__construct($type, $name);
        $this->price = $price;
        $this->quantitySoldKilo = $quantitySoldKilo;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getIncome()
    {
        return $this->quantitySoldKilo * $this->getPrice();
    }

    function show()
    {
        return Goods::show() . "цена товара за киллограмм: " . $this->getPrice() . " общая прибыль: " . $this->getIncome() . ".<hr>";
    }
}

$msi = new WeightGoods("Шурупы", "Лучшие шурупы", 5000, 5);
echo $msi->show();

