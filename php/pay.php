<?php
include 'db.php';
include 'logs.php';
$userID = intval($_POST["user_id"]);
$amount = intval($_POST["amount"]);
$externalID = $_POST["external_id"];
$c->query("INSERT INTO purchases (user_id, amount, external_id) VALUES (" . $userID . ", " . $amount . ", '" . $externalID . "')");
