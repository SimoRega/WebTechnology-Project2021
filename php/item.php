<?php
require_once("bootstrap.php");

$templateParams["title"] = "CamperRomagna - Home";
$templateParams["template"] = "shop-item.php";

$templateParams["articolo"] = $dbh->getItem(1);


require("./templates/base.php");
?>