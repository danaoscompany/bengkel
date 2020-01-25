<?php
include 'db.php';
include 'logs.php';
sendLog($c, 30, 1, 'Halo dunia 2');
/*include 'messages.php';
$results = $c->query("SELECT * FROM owners");
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$data = array(
			"type" => "1",
			"id" => "2"
		);
		sendMessage($row["fcm_id"], $data);
	}
}*/
