<?php
include 'db.php';
include 'logs.php';
$warranty = $_POST["warranty"];
$orderID = intval($_POST["order_id"]);
$price = intval($_POST["price"]);
$c->query("INSERT INTO warranties (order_id, warranty, price) VALUES (" . $orderID . ", '" . $warranty . "', " . $price . ")");
$id = mysqli_insert_id($c);
echo $id;
