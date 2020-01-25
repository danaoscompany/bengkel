<?php
include 'db.php';
include 'logs.php';
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$c->query("INSERT INTO technicians (name, email, phone, password) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', '" . $password . "')");
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan teknisi baru: ' . $name);