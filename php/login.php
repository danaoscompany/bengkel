<?php
include 'db.php';
$phone = $_POST["phone"];
$uid = $_POST["uid"];
$results = $c->query("SELECT * FROM technician WHERE phone='" . $phone . "'");
if ($results && $results->num_rows > 0) {
	echo "{\"response\": -2, \"user_id\": " . $id . "}";
	return;
}
$results = $c->query("SELECT * FROM users WHERE uid='" . $uid . "'");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	session_id("bengkel");
	session_start();
	$_SESSION["logged_in"] = true;
	$_SESSION["user_id"] = $row["id"];
	echo "{\"response\": 0, \"user_id\": " . $row["id"] . "}";
} else {
	$c->query("INSERT INTO users (phone, uid) VALUES ('" . $phone . "', '" . $uid . "')");
	$id = mysqli_insert_id($c);
	echo "{\"response\": -1, \"user_id\": " . $id . "}";
}
