<?php
require_once("bootstrap.php");
require_once("utils/functions.php");

$templateParams["title"] = "CamperRomagna - Acquisto";
$templateParams["template"] = "acquisto-riuscito.php";


if(isset($_POST["nome"]) && isset($_POST["citta"]) && isset($_POST["via"])){
    $dbh->creaOrdine($_SESSION["email"]);
}


require("./templates/base.php");
?>