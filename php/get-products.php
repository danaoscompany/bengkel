<?php
include 'db.php';
include 'logs.php';
$categoryID = intval($_POST["category_id"]);
$products = [];
$results = $c->query("SELECT * FROM products WHERE category_id=" . $categoryID);
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$totalRatings = 0;
		$results2 = $c->query("SELECT * FROM ratings WHERE product_id=" . $row["id"]);
		if ($results2) {
			if ($results2->num_rows > 0) {
				while ($row2 = $results2->fetch_assoc()) {
					$totalRatings += intval($row2["rating"]);
				}
			}
			$row["total_raters"] = $results2->num_rows;
			if ($results2->num_rows > 0) {
				$row["rating"] = ($totalRatings/$results2->num_rows);
			} else {
				$row["rating"] = 0;
			}
		} else {
			$row["total_raters"] = 0;
			$row["rating"] = 0;
		}
		$imagesJSON = [];
		$images = $c->query("SELECT * FROM product_images WHERE product_id=" . $row["id"]);
		if ($images && $images->num_rows > 0) {
			$image = $images->fetch_assoc();
			array_push($imagesJSON, $image);
		}
		$row["images"] = json_encode($imagesJSON);
		array_push($products, $row);
	}
}
echo json_encode($products);
