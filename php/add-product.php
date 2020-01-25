<?php
include 'db.php';
include 'logs.php';
$categoryID = intval($_POST["category_id"]);
$name = $_POST["name"];
$price = intval($_POST["price"]);
$imageChanged = intval($_POST["image_changed"]);
move_uploaded_file($_FILES["file"]["tmp_name"], "../userdata/" . $_FILES["file"]["name"]);
$c->query("INSERT INTO products (category_id, name, price, img) VALUES (" . $categoryID . ", '" . $name . "', " . $price . ", '" . $_FILES["file"]["name"] . "')");
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan produk baru dengan nama ' . $name);