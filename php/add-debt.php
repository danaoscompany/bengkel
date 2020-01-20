<?php
include 'db.php';
$amount = intval($_POST["amount"]);
$lender = $_POST["lender"];
$date = $_POST["date"];
$c->query("INSERT INTO debts (debt, borrower, date) VALUES (" . $amount . ", '" . $lender . "', '" . $date . "')");