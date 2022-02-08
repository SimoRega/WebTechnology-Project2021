<?php
require_once("bootstrap.php");

$templateParams["title"] = "SITO DELLA MADONNa";
$templateParams["template"] = "configuratore-template.php";

$templateParams["camper"] = $dbh->getProdottoSingolo(10)[0];


require("./templates/base.php");
?>