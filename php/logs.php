<?php
include 'messages.php';

function sendLog($c, $userID, $type, $content) {
	$date = date('Y:m:d H:i:s');
	$c->query("INSERT INTO logs (user_id, content, type, date) VALUES (" . $userID . ", '" . $content . "', " . $type . ", '" . $date . "')");
	$logID = mysqli_insert_id($c);
	$results = $c->query("SELECT * FROM owners");
	if ($results && $results->num_rows > 0) {
		while ($row = $results->fetch_assoc()) {
			$data = array(
				"type" => "" . $type,
				"id" => "" . $logID
			);
			sendMessage($row["fcm_id"], $data);
		}
	}
}
