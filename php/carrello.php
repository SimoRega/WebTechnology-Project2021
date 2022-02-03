<?php
require_once("bootstrap.php");
require_once("utils/functions.php");

$id=$_GET["id"];
$qnt=$_GET["qnt"];
if(isset($id)){
    addToCart($id,$qnt);
}

$templateParams["title"] = "CamperRomagna - Carrello";
$templateParams["template"] = "carrello-template.php";

#$templateParams["accessori"] = $dbh->getCartItems($tipo);


require("./templates/base.php");
?>