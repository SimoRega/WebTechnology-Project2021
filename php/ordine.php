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
        $dbh->aggiungiProdInOrdine($idOrdine,$prod["idProdotto"],$prod["qntCart"],$prod["idConfigurazione"]);
    endforeach;
    $dbh->removeAllCart($_SESSION["email"]);
    $dbh->creaNotifica($idOrdine,$_SESSION["email"],"Il tuo ordine è stato ricevuto");

 
    $to      = 'federicoraffoni00@gmail.com';
    $subject = 'the subject';
    $message = 'hello';
    $headers = array(
        'From' => 'fede.raffoni00@gmail.com',
        'Reply-To' => 'fede.raffoni00@gmail.com',
        'X-Mailer' => 'PHP/' . phpversion()
    );
    
    mail($to, $subject, $message, $headers);
    
    $recipient = 'fede.raffoni00@gmail.com';
    $subject = "sus";
    $message = "messaggio";
    $sender = "From: federicoraffoni00@gmail.com";

    if(mail($recipient, $subject, $message, $sender)){

        echo   "mail inviata correttamente";
    }else{
        echo   "errore mail ";

    }
}


require("./templates/base.php");
?>