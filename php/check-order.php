<?php
include 'db.php';
include 'logs.php';
date_default_timezone_set('Asia/Jakarta');
$results = $c->query("SELECT * FROM orders WHERE active=0");
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$orderDate = strtotime($row["date"])*1000;
		$currentDate = round(microtime(true)*1000);
		if ($currentDate > $orderDate) {
			$c->query("UPDATE orders SET active=1 WHERE id=" . $row["id"]);
		}
	}
}
