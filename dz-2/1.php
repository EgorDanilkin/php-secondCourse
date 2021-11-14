<?php

trait Single {

    protected static $instance = null;

    static function getInstance(){

        if (self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }
}

class A
{
    use Single;
}
