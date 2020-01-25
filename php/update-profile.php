<?php
include 'db.php';
include 'logs.php';
$uid = $_POST["uid"];
$name = $_POST["name"];
$email = $_POST["email"];
$accountType = intval($_POST["account_type"]);
$version = intval($_POST["version"]);
$username = $_POST["username"];
if (!file_exists('../userdata/profile_pictures')) {
    mkdir('../userdata/profile_pictures', 0777, true);
}
move_uploaded_file($_FILES["file"]["tmp_name"], "../userdata/profile_pictures/" . $_FILES["file"]["name"]);
$c->query("UPDATE users SET name='" . $name . "', account_type=" . $accountType . ", version=" . $version . ", username='" . $username . "', profile_picture='profile_pictures/" . $_FILES["file"]["name"] . "', email='" . $email . "', profile_set_up=1 WHERE uid='" . $uid . "'");
