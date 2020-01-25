<?php
include 'db.php';
$kindID = intval($_GET["kind_id"]);
$subcategories = [];
$results = $c->query("SELECT * FROM subcategories WHERE kind_id=" . $kindID);
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        array_push($subcategories, $row);
    }
}
echo json_encode($subcategories);