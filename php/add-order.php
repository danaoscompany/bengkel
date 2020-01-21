<?php
include 'db.php';
$address = $_POST["address"];
$orderID = $_POST["order_id"];
$userID = intval($_POST["user_id"]);
$units = intval($_POST["units"]);
$kind = intval($_POST["kind"]);
$type = intval($_POST["type"]);
$capacity = floatval($_POST["capacity"]);
$material = intval($_POST["material"]);
$priceEstimation = intval($_POST["price_estimation"]);
$technicalEstimation = intval($_POST["techinical_estimation"]);
$progress = intval($_POST["progress"]);
$latitude = doubleval($_POST["latitude"]);
$longitude = doubleval($_POST["longitude"]);
$date = $_POST["date"];
$progresses = json_decode($_POST["progresses"], true);
$priceChangeApproval = intval($_POST["price_change_approval"]);
$endResultApproval = intval($_POST["end_result_approval"]);
$paymentMethod = intval($_POST["payment_method"]);
$orderType = intval($_POST["order_type"]);
$complaint = $_POST["complaint"];
$sql = "INSERT INTO orders (user_id, order_id, order_type, address, units, kind, type, capacity, material, complaint, latitude, longitude, price_estimation, technical_estimation, date, progress, price_change_approval, end_result_approval, payment_method, done) VALUES (" . $userID . ", '" . $orderID . "', " . $orderType . ", '" . $address . "', " . $units. ", " . $kind . ", " . $type . ", " . $capacity . ", " . $material . ", '" . $complaint . "', " . $latitude . ", " . $longitude . ", " . $priceEstimation . ", " . $technicalEstimation . ", '" . $date . "', " . $progress . ", " . $priceChangeApproval . ", " . $endResultApproval . ", " . $paymentMethod . ", 0)";
$c->query($sql);
$orderID = mysqli_insert_id($c);
foreach ($progresses as $progressItem) {
	$c->query("INSERT INTO order_progress (order_id, progress, time) VALUES (" . $orderID . ", '" . $progressItem["progress"] . "', '" . $progressItem["time"] . "')");
}
