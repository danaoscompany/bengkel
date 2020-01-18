<?php
include 'db.php';
$categoryID = intval($_POST["category_id"]);
$name = $_POST["name"];
$price = intval($_POST["price"]);
$imageChanged = intval($_POST["image_changed"]);
move_uploaded_file($_FILES["file"]["tmp_name"], "../userdata/" . $_FILES["file"]["name"]);
$c->query("INSERT INTO products (category_id, name, price, img) VALUES (" . $categoryID . ", '" . $name . "', " . $price . ", '" . $_FILES["file"]["name"] . "')");