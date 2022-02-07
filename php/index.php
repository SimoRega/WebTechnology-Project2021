<?php
require_once("bootstrap.php");

$templateParams["title"] = "CamperRomagna - Home";
$templateParams["template"] = "index-template.php";

$templateParams["randomCamper"]=$dbh->getRandomCamper(3);

require("./templates/base.php");
?>