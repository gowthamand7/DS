<?php

require_once 'autoLoad.php';

$queue = new queue_LinkedList();

for ($i = 0; $i < 20; $i++)
{
    $queue->enqueue ($i);
}

echo $queue->dequeue ();
echo $queue->dequeue ();
echo $queue->dequeue ();
