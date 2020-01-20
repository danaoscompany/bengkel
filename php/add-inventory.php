<?php
include 'db.php';
$products = $_POST["products"];
$date = $_POST["date"];
$c->query("INSERT INTO inventory (products, date) VALUES ('" . $products . "', '" . $date . "')");
echo "INSERT INTO inventory (products, date) VALUES ('" . $products . "', '" . $date . "')";