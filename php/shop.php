<?php
require_once("bootstrap.php");

$tipo=$_GET["tipo"];

$templateParams["title"] = "CamperRomagna - Home";
$templateParams["template"] = "lista-articoli.php";

$templateParams["accessori"] = $dbh->getProdotti($tipo);


require("./templates/base.php");
?>