<?php
include 'db.php';
mysqli_query($c, "SET CHARACTER SET 'utf8'");
$parentID = intval($_POST["parent_id"]);
$results = $c->query("SELECT * FROM categories WHERE parent_id=" . $parentID);
$categories = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$childCount = getChildCount($row["id"]);
		if ($childCount == 0) {
			$results2 = $c->query("SELECT * FROM products WHERE category_id=" . $row["id"]);
			if ($results2) {
				$childCount = $results2->num_rows;
			}
			$row["has_product"] = 1;
			$row["child_count"] = $childCount;
		} else {
			$row["child_count"] = $childCount;
			$row["has_product"] = 0;
		}
		array_push($categories, $row);
	}
}
echo json_encode($categories);

function getChildCount($id) {
	$results2 = $GLOBALS["c"]->query("SELECT * FROM categories WHERE parent_id=" . $id);
	$childCount = $results2->num_rows;
	if ($results2 && $results2->num_rows > 0) {
		while ($row2 = $results2->fetch_assoc()) {
			$childCount += getChildCount(intval($row2["id"]));
		}
	}
	return $childCount;
}
