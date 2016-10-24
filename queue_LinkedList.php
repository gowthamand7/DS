<?php

require_once 'autoLoad.php';

class queue_LinkedList extends singlyLinkedList {

    function enqueue ($value)
    {
        parent::addLast ($value);

    }

    function dequeue ()
    {
        return parent::removeFirst ()->value;

    }

}
