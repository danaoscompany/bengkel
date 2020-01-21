<?php
include 'db.php';
$start = intval($_POST["start"]);
$length = intval($_POST["length"]);
$technicianID = intval($_POST["technician_id"]);
$results = $c->query("SELECT * FROM complaints WHERE technician_id=" . $technicianID . " AND done=0 ORDER BY date DESC LIMIT " . $start . "," . $length);
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
		array_push($complaints, $row);
	}
}
echo json_encode($complaints);
