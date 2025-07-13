<h2>Détail du panier</h2>
<?php
    if($_SESSION["etat_stock"]) {
        require_once("QuantiteInsuffisante.php");
    }
?>
<?php
    if(sizeof($liste_panier) == 0) {
        require_once("PanierVide.php");
    }
    else {
        foreach($liste_panier as $un_element) {
            require("UnElementPanier.php");
        }
    }
?>