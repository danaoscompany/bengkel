<?php
include 'db.php';
$orderID = intval($_POST["id"]);
$date = $_POST["date"];
$technicianID = intval($_POST["technician_id"]);
$c->query("UPDATE complaints SET date='" . $date . "', technician_id=" . $technicianID . " WHERE id=" . $orderID);
$results = $c->query("SELECT * FROM schedules WHERE order_id=" . $orderID);
if ($results && $results->num_rows > 0) {
	$c->query("UPDATE schedules SET date='" . $date . "' WHERE order_id=" . $orderID);
} else {
	$c->query("INSERT INTO schedules (order_id, complaint_id, type, date) VALUES (" . $orderID . ", 0, 2, '" . $date . "')");
}
