<?php

trait ezcGetInstance{
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }
}


class SingletonTraits{
    protected static $_instance;

    private function __construct()
    {

    }

    use ezcGetInstance;

}