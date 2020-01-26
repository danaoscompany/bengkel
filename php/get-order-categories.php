<?php
include 'db.php';
$categoryID = intval($_GET["category_id"]);
$categories = [];
	$results = $c->query("SELECT * FROM categories WHERE id=" . $categoryID);
	if ($results && $results->num_rows > 0) {
		$row = $results->fetch_assoc();
		array_push($categories, $row);
		$categoryID = intval($row["parent_id"]);
	}
echo json_encode($categories);
