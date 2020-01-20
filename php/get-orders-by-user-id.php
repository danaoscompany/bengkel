<?php
include 'db.php';
$userID = intval($_POST["user_id"]);
$start = intval($_POST["start"]);
$length = intval($_POST["length"]);
$results = $c->query("SELECT * FROM orders WHERE user_id=" . $userID . " AND active=0 LIMIT " . $start . "," . $length);
$orders = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$kinds = $c->query("SELECT * FROM ac_kinds WHERE id=" . intval($row["kind"]));
		if ($kinds && $kinds->num_rows > 0) {
			$row["kind_string"] = $kinds->fetch_assoc()["name"];
		}
		array_push($orders, $row);
	}
}
echo json_encode($orders);
