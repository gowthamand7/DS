<?php

require_once 'autoLoad.php';

/**
  Input :  1 3 2 9 8 10 4 7 6 5
  Pass 1 : 1 2 3 8 9 4 7 6 5 10
  Pass 2 : 1 2 3 8 4 7 6 5 9 10
  Pass 3 : 1 2 3 4 7 6 5 8 9 10
  Pass 4 : 1 2 3 4 6 5 7 8 9 10
  Pass 5 : 1 2 3 4 5 6 7 8 9 10
  Pass 6 : 1 2 3 4 5 6 7 8 9 10

 */
$a = range (1, 10);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);

$n = new Bubble_Sort ($a);
$r = $n->sort ();
//$r = $n->sort ('desc');
//print_r ($r);
