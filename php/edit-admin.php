<?php
include 'db.php';
include 'logs.php';
$id = intval($_POST["id"]);
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$c->query("UPDATE admins SET name='" . $name . "', email='" . $email . "', password='" . $password . "' WHERE id=" . $id);
session_id("bengkel");
session_start();
$adminID = $id;
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' baru saja mengubah detail akunnya');