<?php

require_once 'autoLoad.php';

class stack_Array implements Stack
{
    public $size = 0;
    private $items = [];

    public function push($value)
    {
        $this->items[$this->size] = $value;
        $this->size++;
    }

    public function pop()
    {
        $pos = $this->size - 1;
        $temp = $this->items[$pos];
        unset($this->items[$pos]);
        $this->size--;

        return $temp;
    }

    public function peek()
    {
        $pos = $this->size - 1;
        $temp = $this->items[$pos];

        return $temp;
    }
}
