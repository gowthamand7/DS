<?php

require_once 'autoLoad.php';

$f = new binary_search_tree();

$list = [];
for ($i = 0; $i < 50; $i++)
{
    $value = rand (0, 35);
    if (in_array ($value, $list))
        continue;

    $list[] = $value;
    $f->insert ($value);
}

echo "Search " . PHP_EOL;

foreach ($list as $l)
{
    echo $node = $f->search ($l) . PHP_EOL;
}

echo "Traverse " . PHP_EOL;

$f->traverse ('preorder');
echo PHP_EOL;
$f->traverse ('postorder');
echo PHP_EOL;
$f->traverse ('inorder');


