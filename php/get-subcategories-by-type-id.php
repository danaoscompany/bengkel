<?php
include 'db.php';
$kindID = intval($_GET["type_id"]);
$subcategories = [];
$results = $c->query("SELECT * FROM subcategories WHERE type_id=" . $kindID);
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        array_push($subcategories, $row);
    }
}
echo json_encode($subcategories);