<?php
include 'db.php';
include 'logs.php';
$products = [];
$results = $c->query("SELECT * FROM products");
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
    	$categoryID = intval($row["category_id"]);
        $categories = [];
        while (true) {
        	$results2 = $c->query("SELECT * FROM categories WHERE id=" . $categoryID);
        	if ($results2 && $results2->num_rows > 0) {
        		$row2 = $results2->fetch_assoc();
        		$categoryID = intval($row2["parent_id"]);
        		array_push($categories, $row2["name"]);
        		if ($categoryID == 0) {
        			break;
        		}
        	}
        }
        $row["category"] = json_encode($categories);
        $totalRatings = 0;
        $results2 = $c->query("SELECT * FROM ratings WHERE product_id=" . $row["id"]);
        if ($results2) {
            if ($results2->num_rows > 0) {
                while ($row2 = $results2->fetch_assoc()) {
                    $totalRatings += intval($row2["rating"]);
                }
            }
            $row["total_raters"] = $results2->num_rows;
            if ($results2->num_rows == 0) {
                $row["rating"] = 0;
            } else {
                $row["rating"] = ($totalRatings/$results2->num_rows);
            }
        } else {
            $row["total_raters"] = 0;
            $row["rating"] = 0;
        }
        array_push($products, $row);
    }
}
echo json_encode($products);
