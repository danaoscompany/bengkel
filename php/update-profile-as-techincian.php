<?php
include 'db.php';
$uid = $_POST["uid"];
$name = $_POST["name"];
$email = $_POST["email"];
if (!file_exists('../userdata/profile_pictures')) {
    mkdir('../userdata/profile_pictures', 0777, true);
}
move_uploaded_file($_FILES["file"]["tmp_name"], "../userdata/profile_pictures/" . $_FILES["file"]["name"]);
$c->query("UPDATE technicians SET name='" . $name . "', profile_picture='profile_pictures/" . $_FILES["file"]["name"] . "', email='" . $email . "' WHERE uid='" . $uid . "'");
