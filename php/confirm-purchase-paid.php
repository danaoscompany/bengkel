<?php
include 'db.php';
include 'logs.php';
$id = intval($_POST["id"]);
$c->query("UPDATE product_purchases SET paid=1 WHERE id=" . $id);
