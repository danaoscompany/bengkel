<?php
include 'db.php';
$items = [];
$orderID = intval($_POST["id"]);
$results = $c->query("SELECT * FROM orders WHERE id=" . $orderID);
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$subcategories = $c->query("SELECT * FROM subcategories WHERE id=" . $row["subcategory"]);
		if ($subcategories && $subcategories->num_rows > 0) {
			$subcategory = $subcategories->fetch_assoc();
			$row["subcategory"] = $subcategory;
		} else {
			$row["subcategory"] = "";
		}
		$subsubcategories = $c->query("SELECT * FROM subsubcategories WHERE id=" . $row["subsubcategory"]);
		if ($subsubcategories && $subsubcategories->num_rows > 0) {
			$subsubcategory = $subsubcategories->fetch_assoc();
			$row["subsubcategory"] = $subsubcategory;
		} else {
			$row["subsubcategory"] = "";
		}
		$serviceID = intval($row["order_type"]);
		$services = $c->query("SELECT * FROM services WHERE id=" . $serviceID);
		if ($services && $services->num_rows > 0) {
			$service = $services->fetch_assoc();
			$row["services"] = $service["services"];
		}
		$withInstallation = intval($row["with_installation"]);
		$packagesJSON = [];
		if ($withInstallation == 1) {
			$results2 = $c->query("SELECT * FROM order_packages WHERE order_id=" . $row["id"]);
			if ($results2 && $results2->num_rows > 0) {
				$row2 = $results2->fetch_assoc();
				array_push($packagesJSON, $row2);
			}
		}
		$row["packages"] = json_encode($packagesJSON);
		$progresses = [];
		$results3 = $c->query("SELECT * FROM order_progress WHERE order_id=" . $row["id"]);
		if ($results3 && $results3->num_rows > 0) {
			while ($row3 = $results3->fetch_assoc()) {
				array_push($progresses, $row3);
			}
		}
		$row["progresses"] = json_encode($progresses);
		$userID = intval($row["user_id"]);
		$users = $c->query("SELECT * FROM users WHERE id=" . $userID);
		if ($users && $users->num_rows > 0) {
			$user = $users->fetch_assoc();
			$row["user"] = json_encode($user);
		}
		array_push($items, $row);
	}
}
echo json_encode($items);
