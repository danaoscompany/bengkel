<?php
include 'db.php';
$orderID = intval($_POST["order_id"]);
$complaintID = intval($_POST["complaint_id"]);
$type = intval($_POST["type"]); //1 = order, 2 = complaint
$date = $_POST["date"];
$c->query("INSERT INTO schedules (order_id, complaint_id, type, date) VALUES (" . $orderID . ", " . $complaintID . ", " . $type . ", '" . $date . "')");
