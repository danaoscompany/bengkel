<?php
include 'db.php';
$name = $_POST["name"];
$c->query("INSERT INTO categories (name, icon) VALUES ('" . $name . "', '" . $_FILES["file"]["name"] . "')");
move_uploaded_file($_FILES["file"]["tmp_name"], "../userdata/" . $_FILES["file"]["name"]);