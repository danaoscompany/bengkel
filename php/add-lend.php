<?php
include 'db.php';
$userID = intval($_POST["user_id"]);
$products = $_POST["products"];
$date = $_POST["date"];
$paid = intval($_POST["paid"]);
$c->query("INSERT INTO product_purchases (user_id, products, date, is_debt, paid) VALUES (" . $userID . ", '" . $products . "', '" . $date . "', 1, " . $paid . ")");