<?php
include 'db.php';
$id = intval($_POST["id"]);
$name = $_POST["name"];
$services = $_POST["services"];
$iconChanged = intval($_POST["icon_changed"]);
if ($iconChanged == 1) {
    move_uploaded_file($_FILES["icon"]["tmp_name"], "../userdata/" . $_FILES["icon"]["name"]);
    $c->query("UPDATE services SET icon='" . $_FILES["icon"]["name"] . "' WHERE id=" . $id);
}
$c->query("UPDATE services SET name='" . $name . "', services='" . $services . "' WHERE id=" . $id);