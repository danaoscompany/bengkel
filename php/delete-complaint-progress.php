<?php
include 'db.php';
include 'logs.php';
$id = intval($_POST["id"]);
$c->query("DELETE FROM complaint_progress WHERE id=" . $id);
