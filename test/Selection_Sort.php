<?php

require_once 'autoLoad.php';

/**
 * Input :  10 0 9 1 6 3 8 7 4 5 2
 * 0th Iteration  0 10 9 1 6 3 8 7 4 5 2
 * 1th Iteration  0 1 9 10 6 3 8 7 4 5 2
 * 2th Iteration  0 1 2 10 6 3 8 7 4 5 9
 * 3th Iteration  0 1 2 3 6 10 8 7 4 5 9
 * 4th Iteration  0 1 2 3 4 10 8 7 6 5 9
 * 5th Iteration  0 1 2 3 4 5 8 7 6 10 9
 * 6th Iteration  0 1 2 3 4 5 6 7 8 10 9
 * 7th Iteration  0 1 2 3 4 5 6 7 8 10 9
 * 8th Iteration  0 1 2 3 4 5 6 7 8 10 9
 * 9th Iteration  0 1 2 3 4 5 6 7 8 9 10
 * 10th Iteration 0 1 2 3 4 5 6 7 8 9 10.
 */
$a = range('0', '10');
shuffle($a);
shuffle($a);
shuffle($a);
shuffle($a);
shuffle($a);
shuffle($a);
shuffle($a);

$n = new Selection_Sort($a);
$r = $n->sort();
$r = $n->sort('desc');
print_r($r);
