<?php
require_once("bootstrap.php");

$tipo = $_GET["tipo"];
if(isset($_GET["marca"])){
    $marca = $_GET["marca"];
    $templateParams["prodMarca"] = $dbh->getProductByBrand($marca);
}

$templateParams["title"] = "CamperRomagna - Shop";
$templateParams["template"] = "lista-articoli.php";

$templateParams["accessori"] = $dbh->getProdotti($tipo);


require("./templates/base.php");
?>