<?php
include 'db.php';
$kindID = intval($_GET["type_id"]);
$subcategoryID = intval($_GET["subcategory_id"]);
$subsubcategories = [];
$results = $c->query("SELECT * FROM sub_subcategories WHERE type_id=" . $kindID . " AND subcategory_id=" . $subcategoryID);
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        array_push($subsubcategories, $row);
    }
}
echo json_encode($subsubcategories);