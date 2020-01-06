<?php
include 'db.php';
$c->query("INSERT INTO purchases (user_id, amount, external_id) VALUES (1, 10000, 'test')");
echo 0;
