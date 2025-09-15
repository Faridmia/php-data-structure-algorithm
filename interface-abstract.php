<?php

abstract class A
{
    public function abba()
    {
        echo "abba method";
    }
    abstract public function bar();
}

class B extends A
{
    public function bar()
    {
        $this->abba();
    }
}

$b = new B;
$b->bar();


interface Aa
{
    public function abba();
}
interface Bb
{
    public function bar();
}

class C implements Aa, Bb
{
    public function abba()
    {
        echo "abba";
    }
    public function bar()
    {
        echo "bar";
    }
}


$obj = new C;
$obj->bar();
$obj->abba();
