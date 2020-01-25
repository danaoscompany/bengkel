<?php
include 'db.php';
include 'logs.php';
$purchaseInfo = json_decode(file_get_contents("php://input"), true);
$externalID = $purchaseInfo["external_id"];
$results = $c->query("SELECT * FROM purchases WHERE external_id='" . $externalID . "'");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	$userID = intval($row["user_id"]);
	$users = $c->query("SELECT * FROM users WHERE id=" . $userID);
	if ($users && $users->num_rows > 0) {
		$user = $users->fetch_assoc();
		$fcmID = $user["fcm_id"];
		$url = 'https://fcm.googleapis.com/fcm/send';
    	$fields = array (
            'registration_ids' => array (
                    $fcmID
            ),
            'data' => array (
                    "type" => "1",
                    "external_id" => $user["external_id"]
            )
    	);
    	$fields = json_encode ($fields);
    	$headers = array (
            'Authorization: key=' . "AAAAcZcuZLs:APA91bFWEwLctUPgIYnUcaKewsdWmNw5Ipu1DiTxY6qdtmkBYdi9US8W-o69_q9Jd3qZLO_c6oQymRNfu8s0HPS62p-Uqh-DXPRi4wD0UdFcPbeIjG0v_MhGuW86b3s0uCfLQ5QxRAwN",
            'Content-Type: application/json'
    	);

    	$ch = curl_init ();
    	curl_setopt ( $ch, CURLOPT_URL, $url );
    	curl_setopt ( $ch, CURLOPT_POST, true );
    	curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
	
    	$result = curl_exec ( $ch );
    	curl_close ( $ch );
	}
}
$c->query("UPDATE purchases SET done=1 WHERE external_id='" . $externalID . "'");
echo 0;
