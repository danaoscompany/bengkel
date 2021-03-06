<?php
include 'db.php';
include 'logs.php';
$orderID = intval($_POST["order_id"]);
$c->query("UPDATE orders SET active=0, done=1 WHERE id=" . $orderID);
$orders = $c->query("SELECT * FROM orders WHERE id=" . $orderID);
if ($orders && $orders->num_rows > 0) {
	$order = $orders->fetch_assoc();
	$userID = $order["user_id"];
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
                    "type" => "3",
                    "order_id" => "" . $orderID
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
