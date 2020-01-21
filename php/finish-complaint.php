<?php
include 'db.php';
$complaintID = intval($_POST["complaint_id"]);
$c->query("UPDATE complaints SET done=1 WHERE id=" . $complaintID);
$results = $c->query("SELECT * FROM complaints WHERE id=" . $complaintID);
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
                    "dxb7XyB_eGY:APA91bEQz17RgEZgN6iYAWpGEKwOWRzEZEkAzrWWViPE_u3qDZ8bMasASQxYJCWl8YL1LL6fkJmM0mXo543j0Ntqm5Womb0XbSY0kOlWpGPV9CjqaXhWrogToFoM7EPPAYn2HweTIeSJ"
            ),
            'data' => array (
                    "type" => "4",
                    "complaint_id" => "" . $complaintID
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
    	echo $fcmID;
	}
}
