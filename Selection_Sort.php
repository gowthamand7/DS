<?php

require_once 'autoLoad.php';

class Selection_Sort
{
    private $unsorted = [];

    public function __construct($unsorted)
    {
        $this->unsorted = $unsorted;
    }

    /**
     * @param string which type of sort it like asc or desc
     *
     * @return array sorted array
     */
    public function sort($type = 'asc')
    {
        $length = count($this->unsorted);
        $compare_method = ($type == 'asc') ? 'graterthan' : 'lessthan';

        for ($i = 0; $i < $length; $i++) {
            $min = $i;
            for ($j = $i; $j < $length; $j++) {
                if ($this->$compare_method(
                                $this->unsorted[$min], $this->unsorted[$j])) {
                    $min = $j;
                }
            }
            $temp = $this->unsorted[$i];
            $this->unsorted[$i] = $this->unsorted[$min];
            $this->unsorted[$min] = $temp;
        }

        return $this->unsorted;
    }

    public function graterthan($a, $b)
    {
        return $a > $b;
    }

    public function lessthan($a, $b)
    {
        return $a < $b;
    }
}
