<?php
require_once("bootstrap.php");
require_once("utils/functions.php");

$templateParams["title"] = "CAMPER ROMAGNA - Configuratore";

if(isUserLoggedIn()){
    $templateParams["template"] = "configuratore-template.php";
}else{
    $templateParams["template"] = "login-page.php";
}

if(isset($_GET["id"])){
    $id=$_GET["id"];
    $templateParams["camper"] = $dbh->getProdottoSingolo($id)[0];
}else{
    echo "Non hai passato il codice identificativo del camper ";
    exit;
}

$templateParams["colore"] = $dbh->getColor();
$templateParams["motore"] = $dbh->getMotore();
$templateParams["optional"] = $dbh->getOptional();

require("./templates/base.php");
?>