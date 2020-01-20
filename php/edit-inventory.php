<?php
include 'db.php';
$id = intval($_POST["id"]);
$products = $_POST["products"];
$date = $_POST["date"];
$type = intval($_POST["type"]);
$c->query("UPDATE inventory SET products='" . $products . "', type=" . $type . ", date='" . $date . "' WHERE id=" . $id);