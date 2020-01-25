<?php
include 'db.php';
include 'logs.php';
$email = $_POST["email"];
$password = $_POST["password"];
$results = $c->query("SELECT * FROM admins WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    if ($row["password"] != $password) {
        echo -1;
    } else {
        session_id("bengkel");
        session_start();
        $_SESSION["logged_in"] = true;
        $_SESSION["user_id"] = $row["id"];
        echo $row["id"];
        $adminID = $row["id"];
        $adminName = $c->query("SELECT * FROM admins WHERE id=" . $adminID)->fetch_assoc()["name"];
        sendLog($c, $adminID, 0, 'Admin dengan nama ' . $adminName . ' baru saja memasuki panel admin');
    }
} else {
    echo -2;
}
