<?php

require_once 'autoLoad.php';

class priority_Queue_LinkedList {

    private $head = null;
    private $count = 0;

    public function enqueue ($value, $priority)
    {

        if ($this->count == 0)
        {
            $node = new Node ($value, $priority);
            $this->head = &$node;
            $this->count++;
            return true;
        } else
        {
            $current = $this->head;
            $previous = $this->head;
            $node = new Node ($value, $priority);
            while ($current)
            {
                if ($priority > $current->priority)
                {
                    if ($current == $this->head) //If given priority is grater than head node
                    {
                        $old = $this->head;
                        $this->head = $node;
                        $this->head->next = $old;
                        $this->count++;
                        return;
                    }
                    $previous->next = $node;
                    $node->next = $current;
                    $this->count++;
                    return;
                }
                if ($current->next == NULL) //If given priority lessthan tail(last node)
                {
                    $current->next = $node;
                    $this->count++;
                    return;
                }
                $previous = $current;
                $current = $current->next;
            }
            $this->count++;
            return true;
        }

    }

    public function dequeue ()
    {
        $temp = $this->head;
        $this->head = $temp->next;
        $temp->next = null;
        return $temp;

    }

    public function peek ()
    {
        $temp = clone $this->head;
        $temp->next = null;
        return $temp;

    }

    public function readList ()
    {
        $current = $this->head;
        while ($current != null)
        {
            echo $current->data . '--' . $current->priority . PHP_EOL;
            $current = $current->next;
        }

    }

}

class node {

    public $data;
    public $priority;
    public $next;

    public function __construct ($data, $priority)
    {
        $this->data = $data;
        $this->priority = $priority;
        $this->next = null;

    }

}