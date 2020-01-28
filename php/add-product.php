<?php
include 'db.php';
include 'logs.php';
$categoryID = intval($_POST["category_id"]);
$name = $_POST["name"];
$buyPrice = intval($_POST["buy_price"]);
$sellPrice = intval($_POST["sell_price"]);
$imageChanged = intval($_POST["image_changed"]);
move_uploaded_file($_FILES["file"]["tmp_name"], "../userdata/" . $_FILES["file"]["name"]);
$sql = "INSERT INTO products (category_id, name, buy_price, sell_price) VALUES (" . $categoryID . ", '" . $name . "', " . $buyPrice . ", " . $sellPrice . ")";
$c->query($sql);
$productID = mysqli_insert_id($c);
$c->query("INSERT INTO product_images (product_id, img) VALUES (" . $productID . ", '" . $_FILES["file"]["name"] . "')");
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan produk baru dengan nama ' . $name);
echo $sql;