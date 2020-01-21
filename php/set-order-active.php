<?php
include 'db.php';
$orderID = intval($_POST["id"]);
$c->query("UPDATE orders SET active=1 WHERE id=" . $orderID);
