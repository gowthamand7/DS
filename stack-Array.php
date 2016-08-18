<?php

class stack  {

    public $size = 0;
    private $items = array();

    function push($value) {
        $this->items[$this->size] = $value;
        $this->size++;
    }

    function pop() {
        $pos = $this->size - 1;
        $temp = $this->items[$pos];
        unset($this->items[$pos]);
        $this->size--;
        return $temp;
    }

}

$stack = new stack();
for ($i = 0; $i < 123; $i++)
    $stack->push($i);

for ($i = 0; $i < 120; $i++)
    echo $stack->pop().PHP_EOL;
?>
