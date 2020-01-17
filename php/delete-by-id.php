<?php
include 'db.php';
$name = $_POST["name"];
$id = intval($_POST["id"]);
$c->query("DELETE FROM " . $name . " WHERE id=" . $id);