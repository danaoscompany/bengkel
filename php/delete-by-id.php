<?php
include 'db.php';
include 'logs.php';

$name = $_POST["name"];
$id = intval($_POST["id"]);
$c->query("DELETE FROM " . $name . " WHERE id=" . $id);
if ($name == "admins") {
    sendLog($c, $id, 0, 'Admin dihapus');
} else if ($name == "technicians") {
    sendLog($c, $id, 1, 'Teknisi dihapus');
}