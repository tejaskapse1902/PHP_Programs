<?php
class Demo{
    public $a;
    public function __construct(){
        $this->a = 10000;
    }
    public function Demo(){
        $this->a = 20000;
    }
    public function Display(){
        echo "a: " . $this->a;
    }
}

$obj = new Demo();
$obj->Display();
?>