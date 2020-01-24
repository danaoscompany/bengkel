<?php
include 'db.php';
$items = [];
$sql = "SELECT * FROM sub_subcategories";
$results = $c->query($sql);
while ($row = $results->fetch_assoc()) {
    array_push($items, $row);
}
echo json_encode($items);
