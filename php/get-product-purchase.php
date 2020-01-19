<?php
include 'db.php';
$id = intval($_POST["id"]);
$results = $c->query("SELECT * FROM product_purchases WHERE id=" . $id);
$purchases = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($purchases, $row);
	}
}
echo json_encode($purchases);
