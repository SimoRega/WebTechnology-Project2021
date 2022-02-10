<?php
require_once("bootstrap.php");
require_once("utils/functions.php");

$templateParams["title"] = "CamperRomagna - Acquisto";
$templateParams["template"] = "acquisto-riuscito.php";


if(isset($_POST["nome"]) && isset($_POST["citta"]) && isset($_POST["via"])){
    $dbh->creaOrdine($_SESSION["email"]);
    $idOrdine=$dbh->getLastOrderId($_SESSION["email"])[0]["idOrdine"];
    $cart = $dbh->getCartItems($_SESSION["email"]);

    #echo $idOrdine;
    foreach($cart as $prod):
        $dbh->aggiungiProdInOrdine($idOrdine,$prod["idProdotto"],$prod["qntCart"]);
    endforeach;
    
}


require("./templates/base.php");
?>