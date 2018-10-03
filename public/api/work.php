<?php

require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'workPost.php';
  exit;
}

//IF GET
//intval = get integer value of variable,
$taskId= intval($_GET['taskId'] ?? 0);

if ($taskId <1) {
  throw new Exception('Invalid Task ID');
}

//1. Go to the database and get all work associated with the $taskID
$workArr = Work::getWorkByTaskId($taskId);

//2. Convert to JSON
$json = json_encode($workArr, JSON_PRETTY_PRINT);

//3. Print
header('Content-Type: application/json')
echo $json;
