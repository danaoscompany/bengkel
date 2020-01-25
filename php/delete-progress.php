<?php
include 'db.php';
include 'logs.php';
$id = intval($_POST["id"]);
$c->query("DELETE FROM order_progress WHERE id=" . $id);
