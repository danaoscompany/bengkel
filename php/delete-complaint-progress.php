<?php
include 'db.php';
$id = intval($_POST["id"]);
$c->query("DELETE FROM complaint_progress WHERE id=" . $id);
