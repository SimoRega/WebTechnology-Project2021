<?php
require_once("bootstrap.php");
require_once("utils/functions.php");

$templateParams["title"] = "CamperRomagna - Ricerca";
$templateParams["template"] = "ricerca-template.php";

if(isset($_GET["testoRicerca"]) && $_GET["testoRicerca"]!="none"){$testo=$_GET["testoRicerca"];}else{$testo=NULL;}
if(isset($_GET["ddMarca"]) && $_GET["ddMarca"]!="default"){$marca=$_GET["ddMarca"];}else{$marca=NULL;}
if(isset($_GET["ddProdotto"]) && $_GET["ddProdotto"]!="default"){$prod=$_GET["ddProdotto"];}else{$prod=NULL;}
if(isset($_GET["ddTipo"]) && $_GET["ddTipo"]!="default"){$tipo=$_GET["ddTipo"];}else{$tipo=NULL;}

if($testo!=NULL){
    $templateParams["itemFound"]=$dbh->findByText($testo);

}else{

    $templateParams["itemFound"]=$dbh->findItem($marca,$prod,$tipo);
}

require("./templates/base.php");
?>