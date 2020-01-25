<?php
include 'db.php';
include 'logs.php';
$senderID = intval($_POST["sender_id"]);
$receiverID = intval($_POST["receiver_id"]);
$start = intval($_POST["start"]);
$length = intval($_POST["length"]);
$results = $c->query("SELECT * FROM messages WHERE (sender_id=" . $senderID . " AND receiver_id=" . $receiverID . ") OR (sender_id=" . $receiverID . " AND receiver_id=" . $senderID . ") ORDER BY date DESC LIMIT " . $start . "," . $length);
$messages = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($messages, $row);
	}
}
echo json_encode($messages);
