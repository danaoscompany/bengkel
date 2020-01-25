<?php
include 'db.php';
$name = $_POST["name"];
$unitPrice = intval($_POST["unit_price"]);
$technicalPrice = intval($_POST["technical_price"]);
$c->query("INSERT INTO types (name, unit_price, technical_price) VALUES ('" . $name . "', " . $unitPrice . ", " . $technicalPrice . ")");