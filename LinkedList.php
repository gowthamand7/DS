<?php

abstract class LinkedList
{
    public $head = null;
    public $tail = null;
    public $count = 0;

    /**
     * Check wether the list is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->head == null;
    }

    abstract public function addFirst($value);

    abstract public function addLast($value);

    abstract public function removeFirst();

    abstract public function removeLast();

    abstract public function removeNode($value);

    abstract public function find($value);

    abstract public function readList();

    abstract public function reverseList();
}
