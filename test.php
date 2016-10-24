<?php

$ar = array('a', 'b', 'c');

foreach ($ar as $f)
{
    ${$f} = $f;
}
echo $a;
echo $b;
echo $c;