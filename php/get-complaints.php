<?php
include 'db.php';
$start = intval($_POST["start"]);
$length = intval($_POST["length"]);
$technicianID = intval($_POST["technician_id"]);
$results = $c->query("SELECT * FROM complaints WHERE technician_id=" . $technicianID . " LIMIT " . $start . "," . $length);
$complaints = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$technicianID = intval($row["technician_id"]);
		$technicians = $c->query("SELECT * FROM technicians WHERE id=" . $technicianID);
		if ($technicians && $technicians->num_rows > 0) {
			$technician = $technicians->fetch_assoc();
			$row["technician_name"] = $technician["name"];
		}
		array_push($complaints, $row);
	}
}
echo json_encode($complaints);
