<?php
include 'db.php';
include 'logs.php';
$androidID = $_POST["android_id"];
$fcmID = $_POST["fcm_id"];
$results = $c->query("SELECT * FROM owners WHERE android_id='" . $androidID . "'");
if ($results && $results->num_rows > 0) {
	$c->query("UPDATE owners SET fcm_id='" . $fcmID . "' WHERE android_id='" . $androidID . "'");
} else {
	$c->query("INSERT INTO owners (fcm_id, android_id) VALUES ('" . $fcmID . "', '" . $androidID . "')");
}
