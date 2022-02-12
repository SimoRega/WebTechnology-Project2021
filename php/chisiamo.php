<?php
require_once("bootstrap.php");

$templateParams["title"] = "CamperRomagna - Chi siamo";
$templateParams["template"] = "chisiamo-template-prova.php";

$templateParams["staff"] = $dbh->getStaff();


require("./templates/base.php");
?>