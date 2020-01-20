<?php
include 'db.php';
$id = intval($_POST["id"]);
$userID = intval($_POST["user_id"]);
$products = $_POST["products"];
$date = $_POST["date"];
$paid = intval($_POST["paid"]);
$c->query("UPDATE product_purchases SET user_id=" . $userID . ", products='" . $products . "', date='" . $date . "', paid=" . $paid . " WHERE id=" . $id);
echo "UPDATE product_purchases SET user_id=" . $userID . ", products='" . $products . "', date='" . $date . "', paid=" . $paid . " WHERE id=" . $id;