<?php
include 'db.php';
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$c->query("INSERT INTO admins (name, email, password) VALUES ('" . $name . "', '" . $email . "', '" . $password . "')");