<?php

require_once 'autoLoad.php';

$h = new hash_Tables();

$h->insert('gowthaman');
$h->insert('Gowthaman');
$h->insert('mani');
$h->insert('gokul');
$h->insert('arun');
$h->insert('arun');

$arun = $h->get('arun');

$mani = $h->delete('mani');

echo '';
