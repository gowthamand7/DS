<?php

require_once 'autoLoad.php';

class Merge_Sort {

    private $unsorted = [];
    private $method = 'graterthan';

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
        $this->method = ($type == 'asc') ? 'graterthan' : 'lessthan';

        return $this->divide ($this->unsorted);

    }

    private function divide ($array)
    {
        $length = count ($array);
        if ($length == 1)
        {
            return $array;
        }

        $middle = ceil ($length / 2);
        list($a, $b) = array_chunk ($array, $middle);
        $a = $this->divide ($a);
        $b = $this->divide ($b);

        return $this->merge ($a, $b);

    }

//        while ( a and b have elements )
//        if (a[0] > b[0])
//            add b[0] to the end of c
//        remove b[0] from b
//        else
//        add a[0] to the end of c
//        remove a[0] from a
//        end if
//        end while
//
//        while ( a has elements )
//        add a[0] to the end of c
//        remove a[0] from a
//        end while
//
//        while ( b has elements )
//        add b[0] to the end of c
//        remove b[0] from b
//        end while
//
//        return c

    private function merge ($a, $b)
    {
        $c = [];

        while (count ($a) > 0 && count ($b) > 0)
        {
            if ($this->{$this->method} (
                            $a[0], $b[0]))
            {
                array_push ($c, array_shift ($b));
            } else
            {
                array_push ($c, array_shift ($a));
            }
        }

        while (count ($a) > 0)
        {
            array_push ($c, array_shift ($a));
        }

        while (count ($b) > 0)
        {
            array_push ($c, array_shift ($b));
        }

        return $c;

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
