<?php

require_once 'autoLoad.php';

class stack_LinkedList extends singlyLinkedList implements Stack {

    function push ($value)
    {
        parent::addFirst ($value);

    }

    function pop ()
    {
        $node = parent::removeFirst ();
        return $node->value;

    }

    function peek ()
    {
        $node = parent::getFirst ();
        return $node->value;

    }

}
