<?php
include 'db.php';
$items = [];
$results = $c->query("SELECT * FROM price LIMIT 1");
while ($row = $results->fetch_assoc()) {
    array_push($items, $row);
}
echo json_encode($items);
