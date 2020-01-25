<?php
include 'db.php';
include 'logs.php';
$results = $c->query("SELECT * FROM orders");
$orders = [];
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $kinds = $c->query("SELECT * FROM kinds WHERE id=" . intval($row["kind"]));
        if ($kinds && $kinds->num_rows > 0) {
            $row["kind_string"] = $kinds->fetch_assoc()["name"];
        }
        $technicianID = intval($row["technician_id"]);
        $technicians = $c->query("SELECT * FROM technicians WHERE id=" . $technicianID);
        if ($technicians && $technicians->num_rows > 0) {
            $technician = $technicians->fetch_assoc();
            $row["technician_name"] = $technician["name"];
        }
        array_push($orders, $row);
    }
}
echo json_encode($orders);