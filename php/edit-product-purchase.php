<?php
include 'db.php';
include 'logs.php';
$id = intval($_POST["id"]);
$userID = intval($_POST["user_id"]);
$products = $_POST["products"];
$date = $_POST["date"];
$paid = intval($_POST["paid"]);
$c->query("UPDATE product_purchases SET user_id=" . $userID . ", products='" . $products . "', date='" . $date . "', paid=" . $paid . " WHERE id=" . $id);
echo "UPDATE product_purchases SET user_id=" . $userID . ", products='" . $products . "', date='" . $date . "', paid=" . $paid . " WHERE id=" . $id;
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' telah mengubah detail pembelian produk');