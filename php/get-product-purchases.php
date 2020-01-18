<?php
include 'db.php';
$userID = intval($_POST["user_id"]);
$results = $c->query("SELECT * FROM product_purchases WHERE user_id=" . $userID);
$purchases = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($purchases, $row);
	}
}
echo json_encode($purchases);
