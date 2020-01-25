<?php
include 'db.php';
include 'logs.php';
$start = intval($_POST["start"]);
$length = intval($_POST["length"]);
$technicianID = intval($_POST["technician_id"]);
$results = $c->query("SELECT * FROM orders WHERE technician_id=" . $technicianID  . " AND active=0 AND done=0 ORDER BY date LIMIT " . $start . "," . $length);
$orders = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$kinds = $c->query("SELECT * FROM kinds WHERE id=" . intval($row["kind"]));
		if ($kinds && $kinds->num_rows > 0) {
			$row["kind_string"] = $kinds->fetch_assoc()["name"];
		}
		$results2 = $c->query("SELECT * FROM schedules WHERE order_id=" . $row["id"]);
		if ($results2 && $results2->num_rows > 0) {
			$row2 = $results2->fetch_assoc();
			if ($row2["date"] != null && $row2["date"] != "null") {
				array_push($orders, $row);
			}
		}
	}
}
echo json_encode($orders);
