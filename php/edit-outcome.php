<?php
include 'db.php';
$id = intval($_POST["id"]);
$amount = intval($_POST["amount"]);
$type = intval($_POST["type"]);
$typeName = $_POST["type_name"];
$date = $_POST["date"];
$c->query("UPDATE outcomes SET amount=" . $amount . ", type=" . $type . ", type_name='" . $typeName . "', date='" . $date . "' WHERE id=" . $id);