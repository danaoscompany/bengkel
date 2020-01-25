<?php
include 'db.php';
include 'logs.php';
include 'messages.php';
$orderID = intval($_POST["id"]);
$date = $_POST["date"];
$technicianID = intval($_POST["technician_id"]);
$c->query("UPDATE orders SET date='" . $date . "', technician_id=" . $technicianID . ", active=0, done=0 WHERE id=" . $orderID);
$results = $c->query("SELECT * FROM schedules WHERE order_id=" . $orderID);
if ($results && $results->num_rows > 0) {
	$c->query("UPDATE schedules SET date='" . $date . "' WHERE order_id=" . $orderID);
} else {
	$c->query("INSERT INTO schedules (order_id, complaint_id, type, date) VALUES (" . $orderID . ", 0, 2, '" . $date . "')");
}
$orders = $c->query("SELECT * FROM orders WHERE id=" . $orderID);
if ($orders && $orders->num_rows > 0) {
	$order = $orders->fetch_assoc();
	$userID = intval($order["user_id"]);
	$users = $c->query("SELECT * FROM users WHERE id=" . $userID);
	if ($users && $users->num_rows > 0) {
		$user = $users->fetch_assoc();
		$technicians = $c->query("SELECT * FROM technicians WHERE id=" . $technicianID);
		if ($technicians && $technicians->num_rows > 0) {
			$technician = $technicians->fetch_assoc();
			$data = array(
				"type" => "7",
				"technician_id" => "" . $technicianID,
				"technician_name" => $technician["name"],
				"order_id" => "" . $orderID
			);
			sendMessage($user["fcm_id"], $data);
		}
	}
}
