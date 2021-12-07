<?php
require_once("bootstrap.php");

$templateParams["title"] = "CamperRomagna - Home";
$templateParams["template"] = "lista-articoli.php";

$templateParams["accessori"] = $dbh->getAccessori();


require("./templates/base.php");
?>