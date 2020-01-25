<?php
include 'db.php';
include 'logs.php';
$orderID = intval($_POST["order_id"]);
$complaintID = intval($_POST["complaint_id"]);
$technicianID = intval($_POST["technician_id"]);
$type = intval($_POST["type"]); //1 = order, 2 = complaint
$date = $_POST["date"];
$c->query("INSERT INTO schedules (order_id, complaint_id, type, date) VALUES (" . $orderID . ", " . $complaintID . ", " . $type . ", '" . $date . "')");
$c->query("UPDATE complaints SET technician_id=" . $technicianID . " WHERE id=" . $complaintID);
echo "UPDATE complaints SET technician_id=" . $technicianID . " WHERE id=" . $complaintID;
