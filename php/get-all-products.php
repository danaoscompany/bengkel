<?php
include 'db.php';
include 'logs.php';
$products = [];
$results = $c->query("SELECT * FROM products");
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $categories = $c->query("SELECT * FROM categories WHERE id=" . $row["category_id"]);
        if ($categories && $categories->num_rows > 0) {
            $row["category"] = $categories->fetch_assoc()["name"];
        }
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
