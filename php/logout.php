<?php
session_id("bengkel");
session_start();
$_SESSION["user_id"] = 0;
$_SESSION["logged_in"] = false;
unset($_SESSION["user_id"]);
unset($_SESSION["logged_in"]);
session_destroy();