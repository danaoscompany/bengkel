<?php
include 'db.php';
include 'logs.php';

$name = $_POST["name"];
$c->query("INSERT INTO categories (name, icon) VALUES ('" . $name . "', '" . $_FILES["file"]["name"] . "')");
move_uploaded_file($_FILES["file"]["tmp_name"], "../userdata/" . $_FILES["file"]["name"]);
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan kategori baru: ' . $name);