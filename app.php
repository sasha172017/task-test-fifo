<?php

require (__DIR__ . '/Shop.php');

$clients = [];

for ($i = 1; $i <= 10; $i++){
    $clients[] = 'Клиент - ' . $i;
}
$a = $clients;
new Shop($clients);