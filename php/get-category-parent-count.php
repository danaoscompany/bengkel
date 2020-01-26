<?php
include 'db.php';
$id = intval($_GET["id"]);
echo getChildCount($id);

function getChildCount($parentID) {
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
