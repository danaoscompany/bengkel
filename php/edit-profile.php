<?php
include 'db.php';
include 'logs.php';
$id = intval($_POST["id"]);
$name = $_POST["name"];
$accountType = intval($_POST["account_type"]);
$version = intval($_POST["version"]);
$username = $_POST["username"];
$usernameChanged = intval($_POST["username_changed"]);
$profilePictureChanged = intval($_POST["profile_picture_changed"]);
if ($usernameChanged == 1) {
	$results = $c->query("SELECT * FROM users WHERE username='" . $username . "'");
	if ($results && $results->num_rows > 0) {
		echo -1;
		return;
	}
	$c->query("UPDATE users SET username='" . $username . "' WHERE id=" . $id);
}
if (!file_exists('../userdata/profile_pictures')) {
    mkdir('../userdata/profile_pictures', 0777, true);
}
$sql = "UPDATE users SET name='" . $name . "', account_type=" . $accountType . ", version=" . $version . ", username='" . $username . "' WHERE id=" . $id;
$c->query($sql);
if ($profilePictureChanged == 1) {
	move_uploaded_file($_FILES["file"]["tmp_name"], "../userdata/profile_pictures/" . $_FILES["file"]["name"]);
	$c->query("UPDATE users SET profile_picture='profile_pictures/" . $_FILES["file"]["name"] . "' WHERE id=" . $id);
}
echo $sql;
$c->query("UPDATE users SET profile_set_up=1 WHERE id=" . $id);
