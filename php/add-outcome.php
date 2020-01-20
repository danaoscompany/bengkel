<?php
include 'db.php';
$amount = intval($_POST["amount"]);
$type = intval($_POST["type"]);
$typeName = $_POST["type_name"];
$date = $_POST["date"];
$c->query("INSERT INTO outcomes (amount, type, type_name, date) VALUES (" . $amount . ", " . $type . ", '" . $typeName . "', '" . $date . "')");