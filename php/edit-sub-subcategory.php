<?php
include 'db.php';
$id = intval($_POST["id"]);
$name = $_POST["name"];
$unitPrice = intval($_POST["unit_price"]);
$technicalPrice = intval($_POST["technical_price"]);
$c->query("UPDATE sub_subcategories SET name='" . $name . "', unit_price=" . $unitPrice . ", technical_price=" . $technicalPrice . " WHERE id=" . $id);