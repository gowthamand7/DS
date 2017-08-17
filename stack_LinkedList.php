<?php

require_once 'autoLoad.php';

class stack_LinkedList extends singlyLinkedList implements Stack
{
    public function push($value)
    {
        parent::addFirst($value);
    }

    public function pop()
    {
        $node = parent::removeFirst();

        return $node->value;
    }

    public function peek()
    {
        $node = parent::getFirst();

        return $node->value;
    }
}
