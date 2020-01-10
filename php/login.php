<?php
include 'db.php';
$phone = $_POST["phone"];
$uid = $_POST["uid"];
$results = $c->query("SELECT * FROM users WHERE uid='" . $uid . "'");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	if (intval($row["account_type"]) == 1 && intval($row["minimum_amount_paid"]) == 0) {
		echo -2;
	} else {
		echo $row["id"];
	}
} else {
	$c->query("INSERT INTO users (phone, uid) VALUES ('" . $phone . "', '" . $uid . "')");
	echo -1;
}
