<?php
require_once("models/ProduitModel.php");
class Utilities {
    public function drawPage($data_page) {
        extract($data_page);
        ob_start();
        require_once($view);
        $content = ob_get_clean();
        require_once($layout);
    }
    public function ajouterPanier($id_produit, $quantite) {
        if(session_status() != 2) {
            session_start();
        }
        if(!isset($_SESSION["panier"])) {
            $_SESSION["panier"] = array();
        }
        $existe_deja = false;
        $quantite_insuffisante = false;
        $liste_panier = $this->listerPanier();
        $produit_model = new ProduitModel();
        $produit_model->id_produit = $id_produit;
        $produit_en_cours = $produit_model->readById();
        $quantite_en_cours = 0;
        for($i = 0 ; $i < sizeof($liste_panier) ; $i++) {
            if($liste_panier[$i]["id_produit"] == $id_produit) {
                $quantite_en_cours = $_SESSION["panier"][$i]["quantite"] + $quantite;
                $existe_deja = true;
            }
        }
        if(!$existe_deja) {
            $quantite_en_cours = $quantite;
        }
        if($quantite_en_cours > $produit_en_cours["stock_produit"]) {
            $quantite_insuffisante = true;
        }
        $_SESSION["etat_stock"] = $quantite_insuffisante;
        if(!$quantite_insuffisante) {
            if($existe_deja) {
                for($i = 0 ; $i < sizeof($liste_panier) ; $i++) {
                    if($liste_panier[$i]["id_produit"] == $id_produit) {
                        $_SESSION["panier"][$i]["quantite"] = $quantite_en_cours;
                    }
                }
            } else {
                array_push($_SESSION["panier"], array(
                    "id_produit" => $id_produit,
                    "nom_produit" => $produit_en_cours["nom_produit"],
                    "quantite" => $quantite
                ));
            }
        }
    }
    public function listerPanier() {
        if(session_status() != 2) {
            session_start();
        }
        if(!isset($_SESSION["panier"])) {
            $_SESSION["panier"] = array();
        }
        return $_SESSION["panier"];
    }
}
?>