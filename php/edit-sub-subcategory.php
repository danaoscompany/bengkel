<?php
include 'db.php';
include 'logs.php';
$id = intval($_POST["id"]);
$name = $_POST["name"];
$unitPrice = intval($_POST["unit_price"]);
$technicalPrice = intval($_POST["technical_price"]);
$c->query("UPDATE sub_subcategories SET name='" . $name . "', unit_price=" . $unitPrice . ", technical_price=" . $technicalPrice . " WHERE id=" . $id);
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' telah mengubah detail sub-subkategori bernama ' . $name);