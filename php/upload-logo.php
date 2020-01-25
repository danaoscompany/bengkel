<?php
include 'db.php';
include 'logs.php';
move_uploaded_file($_FILES["logo"]["tmp_name"], "../logo.png");
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' telah mengubah logo aplikasi');