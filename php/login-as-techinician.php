<?php
include 'db.php';
$phone = $_POST["phone"];
$uid = $_POST["uid"];
$results = $c->query("SELECT * FROM users WHERE phone='" . $phone . "'");
if ($results && $results->num_rows > 0) {
	echo -2;
	return;
}
$results = $c->query("SELECT * FROM technicians WHERE uid='" . $uid . "'");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	echo $row["id"];
} else {
	$c->query("INSERT INTO technicians (phone, uid) VALUES ('" . $phone . "', '" . $uid . "')");
	echo -1;
}
