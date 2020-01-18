<?php
include 'db.php';
$id = intval($_POST["id"]);
$name = $_POST["name"];
$price = intval($_POST["price"]);
$imageChanged = intval($_POST["image_changed"]);
if ($imageChanged == 1) {
    move_uploaded_file($_FILES["file"]["tmp_name"], "../userdata/" . $_FILES["file"]["name"]);
    $c->query("UPDATE products SET img='" . $_FILES["file"]["name"] . "' WHERE id=" . $id);
}
$c->query("UPDATE products SET name='" . $name . "', price=" . $price . " WHERE id=" . $id);