<?php
include 'db.php';
$userID = intval($_POST["user_id"]);
$results = $c->query("SELECT * FROM product_purchases WHERE user_id=" . $userID);
$purchases = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$productsJSON = json_decode($row["products"], true);
		$i = 0;
		foreach ($productsJSON as $productJSON) {
			$imagesJSON = [];
			$images = $c->query("SELECT * FROM product_images WHERE product_id=" . $productJSON["id"]);
			if ($images && $images->num_rows > 0) {
				$image = $images->fetch_assoc();
				array_push($imagesJSON, $image);
			}
			$productsJSON[$i]["images"] = json_encode($imagesJSON);
			$i++;
		}
		$row["products"] = json_encode($productsJSON);
		array_push($purchases, $row);
	}
}
echo json_encode($purchases);
