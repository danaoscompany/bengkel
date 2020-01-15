<?php
include 'db.php';
$orderID = intval($_POST["id"]);
$date = $_POST["date"];
//$c->query("UPDATE orders SET date='" . $date . "' WHERE id=" . $orderID);
$c->query("UPDATE complaints SET date='" . $date . "' WHERE id=" . $orderID);
