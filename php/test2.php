<?php
include 'db.php';
include 'logs.php';
$url = 'https://fcm.googleapis.com/fcm/send';
    	$fields = array (
            'registration_ids' => array (
                    "eyX9Qpeowy8:APA91bF0HprKFBS56XNtdWDr0y_BPohddGpcbElQWicOcPcjkcNaP6PBlVuE_u6lFjghE9cfwdJyQJnmKS50G_q9GT4CL0z79YjHkYXbCOfNM1MKvkfTSzqj_c_b8RPdEN1BkH_MhR65"
            ),
            'data' => array (
                    "type" => "1",
                    "complaint_id" => "1"
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
