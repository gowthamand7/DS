<?php

require_once 'autoLoad.php';

class hash_Tables
{
    public $table = [];

    public function insert($value, $key = null)
    {
        if ($key == null) {
            $index = $this->getIndex($value);
        } else {
            $index = $this->getIndex($key);
        }
        if (isset($this->table[$index])) {
            $lList = $this->table[$index];
            $lList->addLast($value);
        } else {
            $lList = new singlyLinkedList();
            $lList->addLast($value);
            $this->table[$index] = $lList;
        }
    }

    public function get($key)
    {
        $index = $this->getIndex($key);
        if (isset($this->table[$index])) {
            return $this->table[$index];
        } else {
            return false;
        }
    }

    public function delete($key)
    {
        $index = $this->getIndex($key);
        if (isset($this->table[$index])) {
            unset($this->table[$index]);

            return true;
        } else {
            return false;
        }
    }

    //djb2
    public function getIndex($str)
    {
        $hash = 5381;
        $length = strlen($str);
        for ($i = 0; $i < $length; $i++) {
            $hash = (($hash << 5) + $hash) + ord($str[$i]); //172192 + 5381 + s
        }

        return $hash;
    }
}

$h = new hash_Tables();

$h->insert('gowthaman');
$h->insert('Gowthaman');
$h->insert('mani');
$h->insert('gokul');
$h->insert('arun');
$h->insert('arun');

$h = $h->get('arun');

echo '';
