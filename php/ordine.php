<?php
require_once("bootstrap.php");
require_once("utils/functions.php");

$templateParams["title"] = "CamperRomagna - Acquisto";
$templateParams["template"] = "acquisto-riuscito.php";


if(isset($_POST["nome"]) && isset($_POST["citta"]) && isset($_POST["via"])){
    $dbh->creaOrdine($_SESSION["email"],$_POST["citta"],$_POST["via"],$_POST["cap"],);
    $idOrdine=$dbh->getLastOrderId($_SESSION["email"])[0]["idOrdine"];
    $cart = $dbh->getCartItems($_SESSION["email"]);

    $NomiProdotti="";
    #echo $idOrdine;
    foreach($cart as $prod):
        $dbh->aggiungiProdInOrdine($idOrdine,$prod["idProdotto"],$prod["qntCart"],$prod["idConfigurazione"]);
        $tmpQnt=$dbh->getProdottoSingolo($prod["idProdotto"])[0]["qnt"];
        $newQnt=$tmpQnt-$prod["qntCart"];
        #echo "Qnt prima".$tmpQnt." pezzi";
        #echo "Qnt dopo".$newQnt." pezzi";
        $dbh->editQntProd($prod["idProdotto"],$newQnt);

        if($newQnt==0){
            $admins=$dbh->getAllAdmins();
            foreach($admins as $a){
                $m = $a['email'];
                echo "<script type='text/javascript'>alert('$m');</script>";

                $subject = "Articolo esaurito";
                $message =  "Il tuo prodotto:".$prod["nome"]." è terminato.";
                mail($a["email"], $subject, $message);
                
            }
        }
    endforeach;
    $dbh->removeAllCart($_SESSION["email"]);
    $dbh->creaNotifica($idOrdine,$_SESSION["email"],"Il tuo ordine è stato ricevuto");

    
    $subject = "Acquisto effettuato";
    $message = "Il tuo ordine è andato a buon fine, ti manderemo una notifica quando verrà spedito";
    mail($_SESSION["email"], $subject, $message);
}


require("./templates/base.php");
?>