<?php
include 'db.php';
include 'logs.php';
$kindID = intval($_POST["type_id"]);
$subcategoryID = intval($_POST["subcategory_id"]);
$name = $_POST["name"];
$unitPrice = intval($_POST["unit_price"]);
$technicalPrice = intval($_POST["technical_price"]);
$c->query("INSERT INTO sub_subcategories (type_id, subcategory_id, name, unit_price, technical_price) VALUES (" . $kindID . ", " . $subcategoryID . ", '" . $name . "', " . $unitPrice . ", " . $technicalPrice . ")");
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan subkategori baru dengan nama ' . $name);
echo "INSERT INTO subcategories (type_id, name, unit_price, technical_price) VALUES (" . $kindID . ", '" . $name . "', " . $unitPrice . ", " . $technicalPrice . ")";