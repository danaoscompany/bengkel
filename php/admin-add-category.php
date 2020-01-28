<?php
include 'db.php';
$name = $_POST["name"];
$categoryID = intval($_POST["category_id"]);
$childCount = getChildCount($categoryID)+1;
$strips = "";
for ($i = 0; $i < $childCount; $i++) {
    $strips .= "—";
}
$strips .= " ";
$strips .= $name;
$name = $strips;
$c->query("INSERT INTO categories (name, parent_id) VALUES ('" . $name . "', " . $categoryID . ")");
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
