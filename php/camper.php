<?php
require_once("bootstrap.php");

$templateParams["title"] = "CamperRomagna - Camper";
$templateParams["template"] = "camper-template.php";



if(isset($_GET["id"])){
    $id=$_GET["id"];
    $templateParams["camper"] = $dbh->getProdottoSingolo($id)[0];
}else{
    echo "Non hai passato il codice identificativo del camper ";
    exit;
}

require("./templates/base.php");
?>