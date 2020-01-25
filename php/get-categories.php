<?php
include 'db.php';
include 'logs.php';
$categories = [];
$results = $c->query("SELECT * FROM categories");
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$productCount = 0;
		$results2 = $c->query("SELECT * FROM products WHERE category_id=" . $row["id"]);
		if ($results2) {
			$productCount = $results2->num_rows;
		}
		$row["total_products"] = $productCount;
		array_push($categories, $row);
	}
}
echo json_encode($categories);
