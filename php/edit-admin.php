<?php
include 'db.php';
$id = intval($_POST["id"]);
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$c->query("UPDATE admins SET name='" . $name . "', email='" . $email . "', password='" . $password . "' WHERE id=" . $id);