<?php
include 'db.php';
mysqli_set_charset($c, 'utf8');
$categoryID = intval($_GET["category_id"]);
$categories = [];
while (true) {
	$results = $c->query("SELECT * FROM categories WHERE id=" . $categoryID);
	if ($results && $results->num_rows > 0) {
		$row = $results->fetch_assoc();
		array_push($categories, $row);
		$categoryID = intval($row["parent_id"]);
		if ($categoryID == 0) {
			break;
		}
	}
	break;
}
echo json_encode($categories);
