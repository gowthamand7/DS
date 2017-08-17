<?php

require_once 'autoLoad.php';

class singlyLinkedList extends LinkedList
{
    /**
     * Add new node in beginning of the list.
     *
     * @param string $value value to add to the list
     */
    public function addFirst($value)
    {
        $node = new node();
        $node->value = $value;

        if ($this->count == 0) {
            $this->head = $this->tail = &$node;
        } else {
            $node->next = $this->head;
            $this->head = &$node;
        }
        $this->count++;
    }

    /**
     * Add new node at end of the list.
     *
     * @param string $value value to add to the list
     */
    public function addLast($value)
    {
        $node = new node();
        $node->value = $value;
        if ($this->count == 0) {
            $this->addFirst($value);
        } else {
            $this->tail->next = &$node;
            $this->tail = $node;
            $this->count++;
        }
    }

    public function getFirst()
    {
        if ($this->head != null) {
            $temp = clone $this->head;

            return $temp;
        }
    }

    /**
     * Remove a node from beginning of the list.
     */
    public function removeFirst()
    {
        if ($this->head != null) {
            $temp = $this->head;
            $this->head = $this->head->next;
            $this->count--;

            return $temp;
        }
    }

    /**
     * Remove the node at end of the list.
     */
    public function removeLast()
    {
        if ($this->count > 0) {
            if ($this->count == 1) {
                $this->head = $this->tail = null;
                $this->count--;
            } else {
                $current = $this->head;
                while ($current->next != $this->tail) {
                    $current = $current->next;
                }
                $current->next = null;
                $this->tail = $current;
                $this->count--;
            }
        }
    }

    /**
     * Remove the first occurence of the node which contain same given value.
     *
     * @param string $value Value to remove
     */
    public function removeNode($value)
    {
        if ($this->count > 0) {
            if ($value == $this->head->value) {
                $this->removeFirst();

                return;
            }

            if ($value == $this->tail->value) {
                $this->removeLast();

                return;
            }

            $lastNode = $this->head;
            $current = $this->head->next;
            while ($current->value != $value) {
                if ($current->next == null) {
                    return;
                }
                $lastNode = $current;
                $current = $lastNode->next;
            }
            $lastNode->next = $current->next;
            $this->count--;
        }
    }

    /**
     * Search the given value in the list.
     *
     * @param type $value value to search
     *
     * @return string|bool
     */
    public function find($value)
    {
        $lastNode = $this->head;
        $current = $this->head->next;
        while ($current->value != $value) {
            if ($current->next == null) {
                return false;
            }
            $lastNode = $current;
            $current = $lastNode->next;
        }

        return $current->value;
    }

    /**
     * Read the list.
     */
    public function readList()
    {
        $current = $this->head;
        while ($current != null) {
            echo $current->value.PHP_EOL;
            $current = $current->next;
        }
    }

    /**
     * Reverse the list.
     */
    public function reverseList()
    {
        if ($this->count > 1) {
            $current = $this->head;
            $new = null;

            while ($current != null) {
                $temp = $current->next;
                $current->next = $new;
                $new = $current;
                $current = $temp;
            }
            $this->head = $new;
        }
    }
}

class node
{
    public $value = null;
    public $next = null;
}
