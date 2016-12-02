<?php

require_once 'autoLoad.php';

class Insertion_Sort {

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
        $length = count ($this->unsorted);
        $compare_method = ($type == 'asc') ? 'graterthan' : 'lessthan';

        for ($i = 0; $i < $length; $i++)
        {
            $temp = $this->unsorted[$i];
            $j = $i - 1;
            
            while ($j >= 0 && $this->$compare_method (
                    $this->unsorted[$j], $temp))
            {
                $this->unsorted[$j + 1] = $this->unsorted[$j];
                $j -= 1;
            }
            
            $this->unsorted[$j + 1] = $temp;
        }
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
