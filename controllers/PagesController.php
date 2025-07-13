<?php
require_once("Utilities.php");
require_once("models/FournisseurModel.php");
require_once("models/ProduitModel.php");
require_once("models/ClientModel.php");
require_once("models/LivreurModel.php");
class PagesController {
    public $fournisseur_model;
    public $produit_model;
    public $client_model;
    public $livreur_model;
    public function homePage() {
        $this->produit_model = new ProduitModel();
        $produits = $this->produit_model->readAll();
        $this->fournisseur_model = new FournisseurModel();
        $liste_fournisseurs = $this->fournisseur_model->readAll();
        $produits_affiches = array();
        if(sizeof($produits) >= 5){
            $nombre = 5;
        } else {
            $nombre = sizeof($produits);
        }
        for($i = 0 ; $i < $nombre ; $i++) {
            $produits_affiches[$i] = $produits[$i];
        }
        $liste_produits = $produits_affiches;
        $data_page = array(
            "title" => "Page d'accueil",
            "view" => "views/pages/HomePage.php",
            "layout" => "views/components/Layout.php",
            "liste_produits" => $liste_produits,
            "liste_fournisseurs" => $liste_fournisseurs
        );
        $util = new Utilities();
        $util->drawPage($data_page);
    }
    public function fournisseursPage() {
        $this->fournisseur_model = new FournisseurModel();
        $liste_fournisseurs = $this->fournisseur_model->readAll();
        $data_page = array(
            "title" => "Page d'accueil",
            "view" => "views/pages/FournisseursPage.php",
            "layout" => "views/components/Layout.php",
            "liste_fournisseurs" => $liste_fournisseurs
        );
        $util = new Utilities();
        $util->drawPage($data_page);
    }
    public function addFournisseurPage() {
        $data_page = array(
            "title" => "Page d'ajout de fournisseur",
            "view" => "views/pages/AddFournisseurPage.php",
            "layout" => "views/components/Layout.php"
        );
        $util = new Utilities();
        $util->drawPage($data_page);
    }
    public function produitsPage() {
        $this->produit_model = new ProduitModel();
        $liste_produits = $this->produit_model->readAll();
        $this->fournisseur_model = new FournisseurModel();
        $liste_fournisseurs = $this->fournisseur_model->readAll();
        $data_page = array(
            "title" => "Page des produits",
            "view" => "views/pages/ProduitsPage.php",
            "layout" => "views/components/Layout.php",
            "liste_produits" => $liste_produits,
            "liste_fournisseurs" => $liste_fournisseurs
        );
        $util = new Utilities();
        $util->drawPage($data_page);
    }
    public function produitsFiltresPage($nom_produit, $prix_reference) {
        $this->produit_model = new ProduitModel();
        $this->produit_model->nom_produit = $nom_produit;
        $this->produit_model->prix_produit = $prix_reference;
        $liste_produits = $this->produit_model->readByNomPrix();
        $this->fournisseur_model = new FournisseurModel();
        $liste_fournisseurs = $this->fournisseur_model->readAll();
        $data_page = array(
            "title" => "Page des produits",
            "view" => "views/pages/ProduitsPage.php",
            "layout" => "views/components/Layout.php",
            "liste_produits" => $liste_produits,
            "liste_fournisseurs" => $liste_fournisseurs
        );
        $util = new Utilities();
        $util->drawPage($data_page);
    }
    public function addProduitPage() {
        $this->fournisseur_model = new FournisseurModel();
        $liste_fournisseurs = $this->fournisseur_model->readAll();
        $data_page = array(
            "title" => "Page d'ajout de fournisseur",
            "view" => "views/pages/AddProduitPage.php",
            "layout" => "views/components/Layout.php",
            "liste_fournisseurs" => $liste_fournisseurs
        );
        $util = new Utilities();
        $util->drawPage($data_page);
    }
    public function panierPage() {
        $produit_model = new ProduitModel();
        $liste_produits = $produit_model->readAll();
        $util = new Utilities();
        $liste_panier = $util->listerPanier();
        $data_page = array(
            "title" => "Ajout au panier",
            "view" => "views/pages/PanierPage.php",
            "layout" => "views/components/layout.php",
            "liste_produits" => $liste_produits,
            "liste_panier" => $liste_panier
        );
        $util = new Utilities();
        $util->drawPage($data_page);
    }
    public function commandePage() {
        $client_model = new ClientModel();
        $livreur_model = new LivreurModel();
        $liste_clients = $client_model->readAll();
        $liste_livreurs = $livreur_model->readAll();
        $util = new Utilities();
        $liste_panier = $util->listerPanier();
        $data_page = array(
            "title" => "Page de commande",
            "view" => "views/pages/CommandePage.php",
            "layout" => "views/components/Layout.php",
            "liste_clients" => $liste_clients,
            "liste_livreurs" => $liste_livreurs,
            "liste_panier" => $liste_panier
        );
        $util = new Utilities();
        $util->drawPage($data_page);
    }

    public function lignesCommandePage() {
        $commande_model = new CommandeModel();
        $liste_commandes = $commande_model->readAll();

        $ligneCommande_model = new LigneCommandeModel();

        $totaux_commandes = [];

        foreach($liste_commandes as $commande) {
            $lignes = $ligneCommande_model->readByCommande($commande["id_commande"]);
            $total = 0;
            foreach($lignes as $ligne) {
                $total += $ligne["quantite"] * $ligne["prix_produit"];
            }
            $totaux_commandes[$commande["id_commande"]] = $total;
        }

        $data_page = array(
            "title" => "Page des lignes de commande",
            "view" => "views/pages/LignesCommandePage.php",
            "layout" => "views/components/Layout.php",
            "liste_commandes" => $liste_commandes,
            "totaux_commandes" => $totaux_commandes
        );
        $util = new Utilities();
        $util->drawPage($data_page);
    }
}
?>