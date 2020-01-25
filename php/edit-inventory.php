<?php
include 'db.php';
include 'logs.php';
$id = intval($_POST["id"]);
$products = $_POST["products"];
$date = $_POST["date"];
$type = intval($_POST["type"]);
$c->query("UPDATE inventory SET products='" . $products . "', type=" . $type . ", date='" . $date . "' WHERE id=" . $id);
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' telah mengubah detail inventaris');