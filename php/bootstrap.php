<?php

#require_once("utils/functions.php");

require_once("../db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "camper", 3306);
define("UPLOAD_DIR", "./upload/")
?>