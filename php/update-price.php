<?php
include 'db.php';
$typePrices = $_POST["type_prices"];
$kindPrices = $_POST["kind_prices"];
$materialPrices = $_POST["material_prices"];
$capacityPrices = $_POST["capacity_prices"];
$c->query("UPDATE price SET type='" . $typePrices . "', kind='" . $kindPrices . "', material='" . $materialPrices . "', capacity='" . $capacityPrices . "' WHERE id=1");