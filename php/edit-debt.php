<?php
include 'db.php';
include 'logs.php';
$id = intval($_POST["id"]);
$amount = intval($_POST["amount"]);
$lender = $_POST["lender"];
$date = $_POST["date"];
$c->query("UPDATE debts SET debt=" . $amount . ", borrower='" . $lender . "', date='" . $date . "' WHERE id=" . $id);
session_id("bengkel");
session_start();
$adminID = $_SESSION["user_id"];
$adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' telah mengubah informasi pinjaman');