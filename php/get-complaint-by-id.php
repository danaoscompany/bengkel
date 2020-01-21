<?php
include 'db.php';
$id = intval($_POST["id"]);
$results = $c->query("SELECT * FROM complaints WHERE id=" . $id);
$complaints = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$technicianID = intval($row["technician_id"]);
		$technicians = $c->query("SELECT * FROM technicians WHERE id=" . $technicianID);
		if ($technicians && $technicians->num_rows > 0) {
			$technician = $technicians->fetch_assoc();
			$row["technician_name"] = $technician["name"];
		}
		$orders = $c->query("SELECT * FROM orders WHERE id=" . $row["order_id"]);
		if ($orders && $orders->num_rows > 0) {
			$order = $orders->fetch_assoc();
			$row["order"] = json_encode($order);
		}
		$users = $c->query("SELECT * FROM users WHERE id=" . $row["user_id"]);
		if ($users && $users->num_rows > 0) {
			$row["user"] = json_encode($users->fetch_assoc());
		}
		array_push($complaints, $row);
	}
}
echo json_encode($complaints);
