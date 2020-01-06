<?php
include 'db.php';
$purchaseInfo = json_decode(file_get_contents("php://input"), true);
$externalID = $purchaseInfo["external_id"];
$results = $c->query("SELECT * FROM purchases WHERE external_id='" . $externalID . "'");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	$userID = intval($row["user_id"]);
	$c->query("UPDATE users SET minimum_amount_paid=1 WHERE id=" . $userID);
}
$c->query("UPDATE purchases SET done=1 WHERE external_id='" . $externalID . "'");
echo 0;
