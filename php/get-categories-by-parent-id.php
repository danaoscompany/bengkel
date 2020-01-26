<?php
include 'db.php';
$parentID = intval($_POST["parent_id"]);
$results = $c->query("SELECT * FROM categories WHERE parent_id=" . $parentID);
$categories = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($categories, $row);
	}
}
echo json_encode($categories);
