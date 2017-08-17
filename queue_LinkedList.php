<?php

require_once 'autoLoad.php';

class queue_LinkedList extends singlyLinkedList
{
    public function enqueue($value)
    {
        parent::addLast($value);
    }

    public function dequeue()
    {
        return parent::removeFirst()->value;
    }
}
