<?php

session_start();

#require_once("utils/functions.php");
require_once("utils/functions.php");
require_once("../db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "CamperRomagna", 8000);
define("UPLOAD_DIR", "./upload/")

?>