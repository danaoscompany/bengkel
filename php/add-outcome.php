<?php
include 'db.php';
include 'logs.php';
$amount = intval($_POST["amount"]);
$type = intval($_POST["type"]);
$typeName = $_POST["type_name"];
$date = $_POST["date"];
$c->query("INSERT INTO outcomes (amount, type, type_name, date) VALUES (" . $amount . ", " . $type . ", '" . $typeName . "', '" . $date . "')");
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan pengeluaran sebesar ' . $amount . ' pada tanggal ' . $date);