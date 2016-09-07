<?php

abstract class LinkedList {

    public $head = null;
    public $tail = null;
    public $count = 0;
    
    /**
     * Check wether the list is empty 
     * @return bool
     */
    function isEmpty ()
    {
        return ($this->head == null);

    }

    abstract function addFirst ($value);

    abstract function addLast ($value);

    abstract function removeFirst ();

    abstract function removeLast ();

    abstract function removeNode ($value);

    abstract function find ($value);

    abstract function readList ();

    abstract function reverseList ();

}
