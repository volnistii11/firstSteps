<?php
class Goods{
    private $type;
    private $price;
    private $name;

    function __construct($type, $price, $name){
        $this->price = $price;
        $this->type = $type;
        $this->name = $name;
    }

    public function getType() {
        return $this->type;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getName() {
        return $this->name;
    }

    public function show() {
        return "Наименование товара: " . $this->name . ", тип товара: " . $this->type . ", цена товара: " . $this->price;
    }

}
