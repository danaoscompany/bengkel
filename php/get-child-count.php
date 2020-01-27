<?php
include 'db.php';
$id = intval($_GET["id"]);
echo getChildCount($id);

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
