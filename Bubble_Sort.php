<?php

require_once 'autoLoad.php';

class Bubble_Sort {

    private $unsorted = [];

    public function __construct ($unsorted)
    {
        $this->unsorted = $unsorted;

    }

    /**
     * 
     * @param string which type of sort it like asc or desc
     * @return array sorted array 
     */
    public function sort ($type = 'asc')
    {
        $length = count ($this->unsorted) - 1;
        $compare_method = ($type == 'asc') ? 'graterthan' : 'lessthan';
        do
        {
            $swaped = false;
            for ($i = 0; $i < $length; $i++)
            {
                if (
                        $this->$compare_method (
                                $this->unsorted[$i], $this->unsorted[$i + 1])
                )
                {
                    $temp = $this->unsorted[$i];
                    $this->unsorted[$i] = $this->unsorted[$i + 1];
                    $this->unsorted[$i + 1] = $temp;
                    $swaped = true;
                }
            }
        } while ($swaped);
        return $this->unsorted;

    }

    public function graterthan ($a, $b)
    {
        return $a > $b;

    }

    public function lessthan ($a, $b)
    {
        return $a < $b;

    }

}
