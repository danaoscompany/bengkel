<?php
include 'db.php';
include 'logs.php';
$type = intval($_POST["type"]);
$results = $c->query("SELECT * FROM logs WHERE type=" . $type);
$logs = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		if ($type == 0) {
			$admins = $c->query("SELECT * FROM admins WHERE id=" . $row["user_id"]);
			if ($admins && $admins->num_rows > 0) {
				$admin = $admins->fetch_assoc();
				$row["user"] = json_encode($admin);
				$row["name"] = $admin["name"];
			}
		} else if ($type == 1) {
			$users = $c->query("SELECT * FROM users WHERE id=" . $row["user_id"]);
			if ($users && $users->num_rows > 0) {
				$user = $users->fetch_assoc();
				$row["user"] = json_encode($user);
				$row["name"] = $user["name"];
			}
		}
		array_push($logs, $row);
	}
}
echo json_encode($logs);
