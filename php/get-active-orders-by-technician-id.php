<?php
include 'db.php';
include 'logs.php';
$start = intval($_POST["start"]);
$length = intval($_POST["length"]);
$technicianID = intval($_POST["technician_id"]);
$results = $c->query("SELECT * FROM orders WHERE active=1 AND done=0 AND technician_id=" . $technicianID  . " ORDER BY date LIMIT " . $start . "," . $length);
$orders = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$kinds = $c->query("SELECT * FROM kinds WHERE id=" . intval($row["kind"]));
		if ($kinds && $kinds->num_rows > 0) {
			$row["kind_string"] = $kinds->fetch_assoc()["name"];
		}
		array_push($orders, $row);
	}
}
echo json_encode($orders);
