<?php

require_once 'autoLoad.php';

$stack = new stack_Array();
for ($i = 0; $i < 123; $i++)
    $stack->push($i);

for ($i = 0; $i < 120; $i++)
    echo $stack->pop().PHP_EOL;


echo $stack->peek();