<?php
require_once("bootstrap.php");

$templateParams["title"] = "CamperRomagna - Camper";
$templateParams["template"] = "camper-template.php";

$templateParams["camper"] = $dbh->getProdottoSingolo(10)[0];


require("./templates/base.php");
?>