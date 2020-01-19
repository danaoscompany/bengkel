<?php
include 'db.php';
$id = intval($_POST["id"]);
$results = $c->query("SELECT * FROM products WHERE id=" . $id);
$products = [];
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	$images = $c->query("SELECT * FROM product_images WHERE product_id=" . $row["id"]);
	$imagesJSON = [];
	if ($images && $images->num_rows > 0) {
		while ($image = $images->fetch_assoc()) {
			array_push($imagesJSON, $image);
		}
	}
	$row["images"] = json_encode($imagesJSON);
	array_push($products, $row);
}
echo json_encode($products);
