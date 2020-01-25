<?php
include 'db.php';
include 'logs.php';
$users = $c->query("SELECT * FROM users");