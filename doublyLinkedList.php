<?php

require_once 'autoLoad.php';

class doublyLinkedList extends LinkedList {

    /**
     * Add new node in beginning of the list
     * @param string $value value to add to the list
     */
    public function addFirst ($value)
    {
        $node = new node();
        $node->value = $value;

        if ($this->isEmpty ())
        {
            $this->tail = $node;
        } else
        {
            $this->head->previous = $node;
        }
        $node->next = $this->head;
        $this->head = $node;
        $this->count++;

    }

    /**
     * Add new node at end of the list
     * @param string $value value to add to the list
     */
    public function addLast ($value)
    {
        $node = new node();
        $node->value = $value;
        if ($this->isEmpty ())
        {
            $this->addFirst ($value);
        } else
        {
            $this->tail->next = $node;
            $node->previous = $this->tail;
            $this->tail = $node;
            $this->count++;
        }

    }

    /**
     * Remove a node from beginning of the list
     */
    public function removeFirst ()
    {

        if ($this->head->next == NULL)
        {
            $this->tail = NULL;
        } else
        {
            $this->head->next->previous = NULL;
        }
        $this->head = $this->head->next;
        $this->count--;

    }

    /**
     * Remove the node at end of the list
     */
    public function removeLast ()
    {
        if ($this->head->next == NULL)
        {
            $this->head = NULL;
        } else
        {
            $this->tail->previous->next = NULL;
        }

        $this->tail = $this->tail->previous;
        $this->count--;

    }

    /**
     * Remove the first occurence of the node which contain same given value
     * @param string $value Value to remove
     */
    public function removeNode ($value)
    {
        $current = $this->head;

        while ($current->value != $value)
        {
            $current = $current->next;
            if ($current == NULL)
                return null;
        }

        if ($current == $this->head)
        {
            $this->head = $current->next;
        } else
        {
            $current->previous->next = $current->next;
        }

        if ($current == $this->tail)
        {
            $this->tail = $current->previous;
        } else
        {
            $current->next->previous = $current->previous;
        }

        $this->count--;

    }

    /**
     * Search the given value in the list
     * @param type $value value to search
     * @return string|boolean 
     */
    public function find ($value)
    {
        $lastNode = $this->head;
        $current = $this->head->next;
        while ($current->value != $value)
        {
            if ($current->next == null)
                return false;
            $lastNode = $current;
            $current = $lastNode->next;
        }
        return $current->value;

    }

    /**
     * Read the list
     */
    public function readList ()
    {
        $current = $this->head;
        while ($current != null)
        {
            echo $current->value . PHP_EOL;
            $current = $current->next;
        }

    }

    /**
     * Read the list
     */
    public function readListBackward ()
    {
        $current = $this->tail;
        while ($current != null)
        {
            echo $current->value . PHP_EOL;
            $current = $current->previous;
        }

    }

    /**
     * Reverse the list
     */
    public function reverseList ()
    {
        if ($this->count > 1)
        {
            $current = $this->head;
            $new = NULL;

            while ($current != NULL)
            {
                $temp = $current->next;
                $current->next = $new;
                $new = $current;
                $current = $temp;
            }
            $this->head = $new;
        }

    }

}

class node {

    public $value = null;
    public $next = null;
    public $previous = null;

}
