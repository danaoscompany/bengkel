<?php
include 'db.php';
$orderID = intval($_POST["order_id"]);
$progress = $_POST["progress"];
$time = $_POST["time"];
$c->query("INSERT INTO order_progress (order_id, progress, time) VALUES (" . $orderID . ", '" . $progress . "', '" . $time . "')");
