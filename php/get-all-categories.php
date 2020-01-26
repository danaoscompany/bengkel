<?php
include 'db.php';
$categories = [];
$results = $c->query("SELECT * FROM categories");
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        /*$childNumber = 0;
        $id = 0;
        while (true) {
            if ($id == 0) {
                $results2 = $c->query("SELECT * FROM categories WHERE id=" . $row["parent_id"]);
            } else {
                $results2 = $c->query("SELECT * FROM categories WHERE id=" . $id);
            }
            if ($results2 && $results2->num_rows > 0) {
                $row2 = $results2->fetch_assoc();
                $id = intval($row2["parent_id"]);
                if ($id == 0) {
                    break;
                }
            }
            $childNumber++;
        }
        $row["child_number"] = $childNumber;*/
        array_push($categories, $row);
    }
}
echo json_encode($categories);
