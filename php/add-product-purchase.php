<?php
include 'db.php';
include 'logs.php';
$userID = intval($_POST["user_id"]);
$products = $_POST["products"];
$date = $_POST["date"];
$paid = intval($_POST["paid"]);
$c->query("INSERT INTO product_purchases (user_id, products, date, paid) VALUES (" . $userID . ", '" . $products . "', '" . $date . "', " . $paid . ")");
echo "INSERT INTO product_purchases (user_id, products, date, paid) VALUES (" . $userID . ", '" . $products . "', '" . $date . "', " . $paid . ")";
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan pembelian produk baru pada tanggal ' . $date);