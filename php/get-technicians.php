<?php
include 'db.php';
include 'logs.php';
$items = [];
$results = $c->query("SELECT * FROM technicians");
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $technicianID = intval($row["technician_id"]);
        $technicians = $c->query("SELECT * FROM technicians WHERE id=" . $technicianID);
        if ($technicians && $technicians->num_rows > 0) {
            $technician = $technicians->fetch_assoc();
            $row["technician"] = $technician["name"];
        }
        array_push($items, $row);
    }
}
echo json_encode($items);
