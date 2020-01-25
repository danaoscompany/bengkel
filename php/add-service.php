<?php
include 'db.php';
include 'logs.php';
$name = $_POST["name"];
$services = $_POST["services"];
move_uploaded_file($_FILES["icon"]["tmp_name"], "../userdata/" . $_FILES["icon"]["name"]);
$c->query("INSERT INTO services (name, services, icon) VALUES ('" . $name . "', '" . $services . "', '" . $_FILES["icon"]["name"] . "')");
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan layanan baru dengan nama ' . $name);