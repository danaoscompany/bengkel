<?php
include 'db.php';
include 'logs.php';include 'logs.php';
$userID = intval($_POST["user_id"]);
$fcmID = $_POST["fcm_id"];
$role = $_POST["role"];
if ($role == "user") {
	$c->query("UPDATE users SET fcm_id='" . $fcmID . "' WHERE id=" . $userID);
	echo "UPDATE users SET fcm_id='" . $fcmID . "' WHERE id=" . $userID;
} else if ($role == "admin") {
	$c->query("UPDATE admins SET fcm_id='" . $fcmID . "' WHERE id=" . $userID);
} else if ($role == "technician") {
	$c->query("UPDATE technicians SET fcm_id='" . $fcmID . "' WHERE id=" . $userID);
}
