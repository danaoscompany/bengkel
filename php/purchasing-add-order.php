<?php
include 'db.php';
$name = $_POST["name"];
$orderID = $_POST["order_id"];
$phone = $_POST["phone"];
$kind = intval($_POST["kind"]);
$type = intval($_POST["type"]);
$capacity = intval($_POST["capacity"]);
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
$packages = json_decode($_POST["packages"], true);
$sql = "INSERT INTO orders (order_id, order_type, name, phone, kind, type, capacity, complaint, latitude, longitude, price_estimation, technical_estimation, date, progress, price_change_approval, end_result_approval, payment_method, done) VALUES ('" . $orderID . "', " . $orderType . ", '" . $name . "', '" . $phone . "', " . $kind . ", " . $type . ", " . $capacity . ", '" . $complaint . "', " . $latitude . ", " . $longitude . ", " . $priceEstimation . ", " . $technicalEstimation . ", '" . $date . "', " . $progress . ", " . $priceChangeApproval . ", " . $endResultApproval . ", " . $paymentMethod . ", 0)";
$c->query($sql);
$orderID = mysqli_insert_id($c);
foreach ($progresses as $progressItem) {
	$c->query("INSERT INTO order_progress (order_id, progress) VALUES (" . $orderID . ", '" . $progressItem["progress"] . "', '" . $progressItem["time"] . "')");
}
foreach ($packages as $package) {
	$c->query("INSERT INTO order_packages (order_id, package_id) VALUES (" . $orderID . ", " . intval($package["id"]) . ")");
}
