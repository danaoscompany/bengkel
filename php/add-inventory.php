<?php
include 'db.php';
include 'logs.php';
$products = $_POST["products"];
$date = $_POST["date"];
$c->query("INSERT INTO inventory (products, date) VALUES ('" . $products . "', '" . $date . "')");
echo "INSERT INTO inventory (products, date) VALUES ('" . $products . "', '" . $date . "')";
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan data inventaris baru');