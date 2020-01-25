<?php
include 'db.php';
include 'logs.php';
$results = $c->query("SELECT * FROM product_purchases WHERE is_debt=1");
$purchases = [];
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $users = $c->query("SELECT * FROM users WHERE id=" . $row["user_id"]);
        if ($users && $users->num_rows > 0) {
            $user = $users->fetch_assoc();
            $row["user_name"] = $user["name"];
        }
        $productsJSON = json_decode($row["products"], true);
        $i = 0;
        foreach ($productsJSON as $productJSON) {
            $imagesJSON = [];
            $images = $c->query("SELECT * FROM product_images WHERE product_id=" . $productJSON["id"]);
            if ($images && $images->num_rows > 0) {
                $image = $images->fetch_assoc();
                array_push($imagesJSON, $image);
            }
            $productsJSON[$i]["images"] = json_encode($imagesJSON);
            $i++;
        }
        $row["products"] = json_encode($productsJSON);
        array_push($purchases, $row);
    }
}
echo json_encode($purchases);
