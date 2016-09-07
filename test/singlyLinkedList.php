<?php

require_once 'autoLoad.php';

$sl = new singlyLinkedList();
for ($i = 0; $i < 10; $i++)
{
    $sl->addFirst ($i);
}
for ($i = 15; $i < 25; $i++)
{
    $sl->addLast ($i);
}
Echo "Original" . PHP_EOL;
$sl->readList ();
echo PHP_EOL;
Echo "Remove First" . PHP_EOL;
$sl->removeFirst ();
$sl->readList ();
echo PHP_EOL;
Echo "Remove Frst" . PHP_EOL;
$sl->removeFirst ();
$sl->readList ();
echo PHP_EOL;
echo PHP_EOL;
Echo "Remove Last" . PHP_EOL;
$sl->removeLast ();
$sl->readList ();
echo PHP_EOL;
Echo "Remove Last" . PHP_EOL;
$sl->removeLast ();
$sl->readList ();
echo PHP_EOL;
Echo "Remove Node - 15" . PHP_EOL;
$sl->removeNode (15);
$sl->readList ();
echo PHP_EOL;
Echo "Remove Node - 22" . PHP_EOL;
$sl->removeNode (22);
$sl->readList ();
echo PHP_EOL;
Echo "Find Node - 15" . PHP_EOL;
echo $sl->find (15);
echo PHP_EOL;
Echo "Find Node - 2" . PHP_EOL;
echo $sl->find (2);
echo PHP_EOL;
Echo "Reverse" . PHP_EOL;
$sl->reverseList ();
$sl->readList ();
echo PHP_EOL;
