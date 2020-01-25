<?php
include 'db.php';
include 'logs.php';

$amount = intval($_POST["amount"]);
$lender = $_POST["lender"];
$date = $_POST["date"];
$c->query("INSERT INTO debts (debt, borrower, date) VALUES (" . $amount . ", '" . $lender . "', '" . $date . "')");
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' menambahkan pinjaman baru sebesar ' . $amount . ' dengan nama peminjam ' . $lender);