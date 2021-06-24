<?php


class Users
{
    public $name;
    public $pass;

    public function __construct($name, $pass)
    {
        $this->name = $name;
        $this->pass = $pass;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getPass()
    {
        return $this->pass;
    }


    public function setPass($pass): void
    {
        $this->pass = $pass;
    }


}