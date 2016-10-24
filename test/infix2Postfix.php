<?php
$r = pathinfo('gowthaman');
$r = pathinfo('gowthaman.txt.r');
$datetimenow = DateTime::createFromFormat ('U.u', microtime (true));
$ZipFileName = $datetimenow->format ("YmdHisu") . 'SysZip';

require_once 'autoLoad.php';

$d = new infix2Postfix ("a+b^(c-d)+z*h");
echo $d->convert () . PHP_EOL;
echo $d->convert ("a+b+c+d^e") . PHP_EOL;
echo $d->convert ("a-b") . PHP_EOL;
echo $d->convert ("a+b+c+(d-e)") . PHP_EOL;
echo $d->convert () . PHP_EOL;
echo $d->convert () . PHP_EOL;

?>
