<?php
include 'db.php';
$purchaseInfo = json_decode(file_get_contents("php://input"), true);
$externalID = $purchaseInfo["external_id"];
$c->query("UPDATE purchases SET done=1 WHERE external_id='" . $externalID . "'");
$c->query("INSERT INTO purchases (user_id, amount, external_id) VALUES (1, 10000, 'test')");
echo 0;
