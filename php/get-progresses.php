<?php
include 'db.php';
$orderID = intval($_POST["id"]);
$progresses = [];
$results = $c->query("SELECT * FROM order_progress WHERE order_id=" . $orderID);
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($progresses, $row);
	}
}
echo json_encode($progresses);
