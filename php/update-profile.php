<?php
include 'db.php';
$uid = $_POST["uid"];
$name = $_POST["name"];
$accountType = intval($_POST["account_type"]);
$version = intval($_POST["version"]);
$minimumPayment = intval($_POST["minimum_payment"]);
$username = $_POST["username"];
if (!file_exists('../userdata/profile_pictures')) {
    mkdir('../userdata/profile_pictures', 0777, true);
}
move_uploaded_file($_FILES["file"]["tmp_name"], "../userdata/profile_pictures/" . $_FILES["file"]["name"]);
$c->query("UPDATE users SET name='" . $name . "', account_type=" . $accountType . ", version=" . $version . ", minimum_payment=" . $minimumPayment . ", username='" . $username . "', profile_picture='profile_pictures/" . $_FILES["file"]["name"] . "' WHERE uid='" . $uid . "'");
