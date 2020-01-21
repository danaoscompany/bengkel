<?php
include 'db.php';
$userID = intval($_POST["user_id"]);
$results = $c->query("SELECT * FROM users WHERE id=" . $userID);
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	echo $row["address"];
}
