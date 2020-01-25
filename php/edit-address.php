<?php
include 'db.php';
include 'logs.php';
$userID = intval($_POST["user_id"]);
$address = $_POST["address"];
$c->query("UPDATE users SET address='" . $address . "' WHERE id=" . $userID);
