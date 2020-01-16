<?php
include 'db.php';
$externalID = $_POST["external_id"];
$c->query("UPDATE purchases SET done=1 WHERE external_id='" . $externalID . "'");
