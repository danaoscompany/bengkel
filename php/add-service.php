<?php
include 'db.php';
$name = $_POST["name"];
$services = $_POST["services"];
move_uploaded_file($_FILES["icon"]["tmp_name"], "../userdata/" . $_FILES["icon"]["name"]);
$c->query("INSERT INTO services (name, services, icon) VALUES ('" . $name . "', '" . $services . "', '" . $_FILES["icon"]["name"] . "')");
