<?php
include 'db.php';
include 'logs.php';
$items = [];
$sql = "SELECT * FROM subcategories";
$results = $c->query($sql);
while ($row = $results->fetch_assoc()) {
    array_push($items, $row);
}
echo json_encode($items);
