<?php
include 'db.php';
include 'logs.php';
$orderID = intval($_POST["id"]);
$c->query("UPDATE orders SET active=1 WHERE id=" . $orderID);
