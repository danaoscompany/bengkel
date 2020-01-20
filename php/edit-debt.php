<?php
include 'db.php';
$id = intval($_POST["id"]);
$amount = intval($_POST["amount"]);
$lender = $_POST["lender"];
$date = $_POST["date"];
$c->query("UPDATE debts SET debt=" . $amount . ", borrower='" . $lender . "', date='" . $date . "' WHERE id=" . $id);