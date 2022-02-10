<?php
require_once("bootstrap.php");
require_once("utils/functions.php");

$templateParams["title"] = "CamperRomagna - Acquisto";
$templateParams["template"] = "acquisto-riuscito.php";


if(isset($_POST["nome"]) && isset($_POST["citta"]) && isset($_POST["via"])){
    $dbh->creaOrdine($_SESSION["email"]);
    $idOrdine=$dbh->getLastOrderId($_SESSION["email"])[0]["idOrdine"];
    $cart = $dbh->getCartItems($_SESSION["email"]);

    $NomiProdotti="";
    #echo $idOrdine;
    foreach($cart as $prod):
        $dbh->aggiungiProdInOrdine($idOrdine,$prod["idProdotto"],$prod["qntCart"]);
    endforeach;
    $dbh->removeAllCart($_SESSION["email"]);
    $dbh->creaNotifica($idOrdine,$_SESSION["email"],"Il tuo ordine è stato ricevuto");
    
}


require("./templates/base.php");
?>