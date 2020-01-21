<?php
include 'db.php';
include 'messages.php';
$message = $_POST["message"];
$senderID = intval($_POST["sender_id"]);
$receiverID = intval($_POST["receiver_id"]);
$receiverRole = $_POST["receiver_role"];
$date = $_POST["date"];
$senderName = "";
$results = $c->query("SELECT * FROM users WHERE id=" . $senderID);
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	$senderName = $row["name"];
}
if ($senderName == NULL || $senderName == "null" || $senderName == "") {
	$senderName = "Pesan dari kustomer";
}
$c->query("INSERT INTO messages (message, sender_id, sender_role, receiver_id, receiver_role, date) VALUES ('" . $message . "', " . $senderID . ", 'customer', " . $receiverID . ", '" . $receiverRole . "', '" . $date . "')");
$messageID = mysqli_insert_id($c);
if ($receiverRole == "technician") {
	$technicians = $c->query("SELECT * FROM technicians WHERE id=" . $receiverID);
	if ($technicians && $technicians->num_rows > 0) {
		$technician = $technicians->fetch_assoc();
		$fcmID = $technician["fcm_id"];
		$data = array(
			"type" => "6",
			"message" => $message,
			"message_id" => "" . $messageID,
			"sender_name" => $senderName,
			"user_id" => "" . $senderID
		);
		sendMessage($fcmID, $data);
	}
}
echo $messageID;
