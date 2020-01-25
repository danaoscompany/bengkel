<?php
include 'db.php';
include 'logs.php';

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$c->query("INSERT INTO admins (name, email, password) VALUES ('" . $name . "', '" . $email . "', '" . $password . "')");
$adminID = mysqli_insert_id($c);
sendLog($c, $adminID, 0, 'Admin baru ditambahkan');