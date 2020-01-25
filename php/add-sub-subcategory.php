<?php
include 'db.php';
include 'logs.php';
$name = $_POST["name"];
$unitPrice = intval($_POST["unit_price"]);
$technicalPrice = intval($_POST["technical_price"]);
$c->query("INSERT INTO sub_subcategories (name, unit_price, technical_price) VALUES ('" . $name . "', " . $unitPrice . ", " . $technicalPrice . ")");
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan sub-subkategori baru dengan nama ' . $name);