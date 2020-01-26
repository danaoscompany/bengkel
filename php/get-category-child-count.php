<?php
include 'db.php';
$parentID = intval($_POST["parent_id"]);
$childCount = getChildCount($parentID);
echo $childCount;

function getChildCount($parentID) {
	$childCount = 0;
	$results = $GLOBALS["c"]->query("SELECT * FROM categories WHERE parent_id=" . $parentID);
	if ($results && $results->num_rows > 0) {
		$childCount += $results->num_rows;
		while ($row = $results->fetch_assoc()) {
			$parentID = intval($row["id"]);
			$childCount += getChildCount($parentID);
		}
	}
	return $childCount;
}
