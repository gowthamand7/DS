<?php

require_once 'autoLoad.php';

/**
    Input :  1 2 5 6 9 4 8 7 3 10
    0st Iteration : 1 2 5 6 9 4 8 7 3 10
    1st Iteration : 1 2 5 6 9 4 8 7 3 10
    2st Iteration : 1 2 5 6 9 4 8 7 3 10
    3st Iteration : 1 2 5 6 9 4 8 7 3 10
    4st Iteration : 1 2 5 6 9 4 8 7 3 10
    5st Iteration : 1 2 5 6 9 4 8 7 3 10
             1 2 5 6 9 9 8 7 3 10
             1 2 5 6 6 9 8 7 3 10
             1 2 5 5 6 9 8 7 3 10
    6st Iteration : 1 2 4 5 6 9 8 7 3 10
             1 2 4 5 6 9 9 7 3 10
    7st Iteration : 1 2 4 5 6 8 9 7 3 10
             1 2 4 5 6 8 9 9 3 10
             1 2 4 5 6 8 8 9 3 10
    8st Iteration : 1 2 4 5 6 7 8 9 3 10
             1 2 4 5 6 7 8 9 9 10
             1 2 4 5 6 7 8 8 9 10
             1 2 4 5 6 7 7 8 9 10
             1 2 4 5 6 6 7 8 9 10
             1 2 4 5 5 6 7 8 9 10
             1 2 4 4 5 6 7 8 9 10
    9st Iteration : 1 2 3 4 5 6 7 8 9 10

 */

$a = range ('a', 'z');
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);

$n = new Insertion_Sort ($a);
$r = $n->sort ();
$r = $n->sort ('desc');
print_r ($r);
