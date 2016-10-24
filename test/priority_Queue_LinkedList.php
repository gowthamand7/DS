<?php

require_once 'autoLoad.php';

$f = new priority_Queue_LinkedList();

$f->enqueue (1, 0);
$f->enqueue (2, 5);
$f->enqueue (3, 7);
$f->enqueue (4, 2);
$f->enqueue (5, 10);
$f->enqueue (6, 1);
Echo "Read List" . PHP_EOL;
$f->readList ();
echo $f->dequeue ()->data;
Echo "Read List After Dequeue" . PHP_EOL;
$f->readList ();
Echo "Read List After Peek" . PHP_EOL;
echo $f->peek()->data;
$f->readList ();