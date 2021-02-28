<?php
abstract class Goods{
    private $type;
    private $name;

    function __construct($type, $name){
        $this->type = $type;
        $this->name = $name;
    }

    public function getType() {
        return $this->type;
    }

    public function getName() {
        return $this->name;
    }

    abstract function getPrice();

    abstract function getIncome();


    public function show() {
        return "Наименование товара: " . $this->name . ", тип товара: " . $this->type . ", ";
    }

}
