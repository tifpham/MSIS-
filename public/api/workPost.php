<?php
//require once --> if already
require_once '../../app/common.php'


$work = new Work ($_POST);

$work->create();

echo json_encode($work);
