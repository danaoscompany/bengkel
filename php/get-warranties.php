<?php
include 'db.php';
include 'logs.php';
$orderID = intval($_POST["order_id"]);
$warranties = [];
$results = $c->query("SELECT * FROM warranties WHERE order_id=" . $orderID);
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($warranties, $row);
	}
}
echo json_encode($warranties);
