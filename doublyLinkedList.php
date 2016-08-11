<?php

class linkedList {

    public $head = null;
    public $tail = null;
    public $count = 0;

    /**
     * Check wether the list is empty 
     * @return bool
     */
    private function isEmpty() {
        return ($this->head == null);
    }

    /**
     * Add new node in beginning of the list
     * @param string $value value to add to the list
     */
    public function addFirst($value) {
        $node = new node();
        $node->value = $value;

        if ($this->isEmpty()) {
            $this->tail = $node;
        } else {
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
    public function addLast($value) {
        $node = new node();
        $node->value = $value;
        if ($this->isEmpty()) {
            $this->addFirst($value);
        } else {
            $this->tail->next = $node;
            $node->previous = $this->tail;
            $this->tail = $node;
            $this->count++;
        }
    }

    /**
     * Remove a node from beginning of the list
     */
    public function removeFirst() {

        if ($this->head->next == NULL) {
            $this->tail = NULL;
        } else {
            $this->head->next->previous = NULL;
        }
        $this->head = $this->head->next;
        $this->count--;
    }

    /**
     * Remove the node at end of the list
     */
    public function removeLast() {
        if ($this->head->next == NULL) {
            $this->head = NULL;
        } else {
            $this->tail->previous->next = NULL;
        }

        $this->tail = $this->tail->previous;
        $this->count--;
    }

    /**
     * Remove the first occurence of the node which contain same given value
     * @param string $value Value to remove
     */
    public function removeNode($value) {
        $current = $this->head;

        while ($current->value != $value) {
            $current = $current->next;
            if ($current == NULL)
                return null;
        }

        if ($current == $this->head) {
            $this->head = $current->next;
        } else {
            $current->previous->next = $current->next;
        }

        if ($current == $this->tail) {
            $this->tail = $current->previous;
        } else {
            $current->next->previous = $current->previous;
        }

        $this->count--;
    }

    /**
     * Search the given value in the list
     * @param type $value value to search
     * @return string|boolean 
     */
    public function find($value) {
        $lastNode = $this->head;
        $current = $this->head->next;
        while ($current->value != $value) {
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
    public function readList() {
        $current = $this->head;
        while ($current != null) {
            echo $current->value . PHP_EOL;
            $current = $current->next;
        }
    }
    
    /**
     * Read the list
     */
    public function readListBackward() {
        $current = $this->tail;
        while ($current != null) {
            echo $current->value . PHP_EOL;
            $current = $current->previous;
        }
    }

    /**
     * Reverse the list
     */
    public function reverseList() {
        if ($this->count > 1) {
            $current = $this->head;
            $new = NULL;

            while ($current != NULL) {
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

$sl = new linkedList();
for ($i = 0; $i < 10; $i++) {
    $sl->addFirst($i);
}

for ($i = 15; $i < 25; $i++) {
    $sl->addLast($i);
}

Echo "Original" . PHP_EOL;
$sl->readList();
echo PHP_EOL;

Echo "Remove First" . PHP_EOL;
$sl->removeFirst();
$sl->readList();
echo PHP_EOL;

Echo "Remove Frst" . PHP_EOL;
$sl->removeFirst();
$sl->readList();
echo PHP_EOL;
echo PHP_EOL;

Echo "Remove Last" . PHP_EOL;
$sl->removeLast();
$sl->readList();
echo PHP_EOL;

Echo "Remove Last" . PHP_EOL;
$sl->removeLast();
$sl->readList();
echo PHP_EOL;

Echo "Remove Node - 15" . PHP_EOL;
$sl->removeNode(15);
$sl->readList();
echo PHP_EOL;

Echo "Remove Node - 22" . PHP_EOL;
$sl->removeNode(22);
$sl->readList();
echo PHP_EOL;


Echo "Find Node - 15" . PHP_EOL;
echo $sl->find(15);
echo PHP_EOL;


Echo "Find Node - 2" . PHP_EOL;
echo $sl->find(2);
echo PHP_EOL;

Echo "Reverse" . PHP_EOL;
$sl->reverseList();
$sl->readList();
echo PHP_EOL;
echo PHP_EOL;

$sl->readListBackward();


