<?php

require_once 'autoLoad.php';

$a = range (0, 1500);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);
shuffle ($a);

$n = new Merge_Sort ($a);
$r = $n->sort ();
$r = $n->sort ('desc');
print_r ($r);
