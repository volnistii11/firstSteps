<?php
include "Goods.class.php";

class DigitalGoods extends Goods {
    private $price;
    private $quantitySold;

    function __construct($type, $name, $price, $quantitySold)
    {
        parent::__construct($type, $name);
        $this->price = $price;
        $this->quantitySold = $quantitySold;
    }

    function getPrice()
    {
        return $this->price/2;
    }

    function getIncome()
    {
        return $this->quantitySold * $this->getPrice();
    }

    function show() {
        return Goods::show() . "цена цифрового товара: " . $this->getPrice() . " общая прибыль: " . $this->getIncome() . ".<hr>";
    }
}

$msi = new DigitalGoods("Ноутбук", "MSI", 60000, 5);
echo $msi->show();
