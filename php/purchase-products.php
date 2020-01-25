<?php
include 'db.php';
include 'logs.php';
$userID = intval($_POST["user_id"]);
$products = $_POST["products"];
$c->query("INSERT INTO product_purchases (user_id, products, date, paid) VALUES (" . $userID . ", '" . $products . "', '" . date('Y:m:d H:i:s') . "', 0)");
$id = mysqli_insert_id($c);
echo $id;
