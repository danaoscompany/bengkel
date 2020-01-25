<?php
include 'db.php';
include 'logs.php';
$name = $_POST["name"];
$id = intval($_POST["id"]);
$items = [];
$sql = "SELECT * FROM " . $name . " WHERE id=" . $id;
$results = $c->query($sql);
while ($row = $results->fetch_assoc()) {
	array_push($items, $row);
}
echo json_encode($items);
