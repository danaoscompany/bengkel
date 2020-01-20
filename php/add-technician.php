<?php
include 'db.php';
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$c->query("INSERT INTO technicians (name, email, phone, password) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', '" . $password . "')");