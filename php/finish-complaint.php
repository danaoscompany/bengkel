<?php
include 'db.php';
$complaintID = intval($_POST["complaint_id"]);
$c->query("UPDATE complaints SET done=1 WHERE id=" . $complaintID);
