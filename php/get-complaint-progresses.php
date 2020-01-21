<?php
include 'db.php';
$complaintID = intval($_POST["id"]);
$progresses = [];
$results = $c->query("SELECT * FROM complaint_progress WHERE complaint_id=" . $complaintID);
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($progresses, $row);
	}
}
echo json_encode($progresses);
