<?php
include 'db.php';
$name = $_POST["name"];
$categoryID = intval($_POST["category_id"]);
$unitPrice = intval($_POST["unit_price"]);
$technicalPrice = intval($_POST["technical_price"]);
$childCount = getChildCount($categoryID)+1;
$strips = "";
for ($i = 0; $i < $childCount; $i++) {
    $strips .= "—";
}
$strips .= " ";
$strips .= $name;
$name = $strips;
$c->query("INSERT INTO categories (name, parent_id, unit_price, technical_price) VALUES ('" . $name . "', " . $categoryID . ", " . $unitPrice . ", " . $technicalPrice . ")");
echo $categoryID;

function getChildCount($parentID)
{
    $childCount = 0;
    while (true) {
        $results = $GLOBALS["c"]->query("SELECT * FROM categories WHERE id=" . $parentID);
        if ($results && $results->num_rows > 0) {
            $row = $results->fetch_assoc();
            $parentID = intval($row["parent_id"]);
            if ($parentID == 0) {
                return $childCount;
            }
        }
        $childCount++;
    }
}
