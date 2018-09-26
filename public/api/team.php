<?php

require '../../common.php';








$teams = Team:: getAll();

//2. Convert to JSON
$json = json_encode($teams, JSON_PRETTY_PRINT);

//3. Print
header('Content-Type: application/json')
echo $json;
