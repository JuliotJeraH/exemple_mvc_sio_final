<?php
    require_once("models/CommandeModel.php");
    require_once("models/LigneCommandeModel.php");
    require_once("models/ProduitModel.php");
    class CommandeController {
        public $commande_model;
        public $ligneCommande_model;
        public $produit_model;
        public function createCommande($id_client, $id_livreur) {
            $this->commande_model = new CommandeModel();
            $this->commande_model->id_client = $id_client;
            $this->commande_model->id_livreur = $id_livreur;
            $success = $this->commande_model->create();
            $toutes_commandes = $this->commande_model->readAll();
            $id_derniere_commande = 1;
            foreach($toutes_commandes as $seule_commande) {
                $id_derniere_commande = $seule_commande["id_commande"];
            }
            $util = new Utilities();
            $liste_panier = $util->listerPanier();
            $this->ligneCommande_model = new LigneCommandeModel();
            $this->produit_model = new ProduitModel();
            foreach($liste_panier as $un_item_panier) {
                $this->ligneCommande_model->id_produit = $un_item_panier["id_produit"];
                $this->ligneCommande_model->quantite = $un_item_panier["quantite"];
                $this->ligneCommande_model->id_commande = $id_derniere_commande;
                $this->produit_model->id_produit = $un_item_panier["id_produit"];
                $produit_concerne = $this->produit_model->readById();
                $this->produit_model->nom_produit = $produit_concerne["nom_produit"];
                $this->produit_model->prix_produit = $produit_concerne["prix_produit"];
                $this->produit_model->stock_produit = $produit_concerne["stock_produit"] - $un_item_panier["quantite"];
                $this->produit_model->id_fournisseur = $produit_concerne["id_fournisseur"];
                $success = $this->ligneCommande_model->create();
                $success = $this->produit_model->update();
            }
            if($success) {
                header("Location: produit_page");
            } else {
                header("Location: accueil");
            }
        }
        public function modifyProduit($id_produit, $nom_produit, $prix_produit, $stock_produit, $id_fournisseur) {
            $this->produit_model = new ProduitModel();
            $this->produit_model->id_produit = $id_produit;
            $this->produit_model->nom_produit = $nom_produit;
            $this->produit_model->prix_produit = $prix_produit;
            $this->produit_model->stock_produit = $stock_produit;
            $this->produit_model->id_fournisseur = $id_fournisseur;
            $success = $this->produit_model->update();
            if($success) {
                header("Location: produit_page");
            } else {
                header("Location: accueil");
            }
        }
        public function deleteProduit($id_produit) {
            $this->produit_model = new ProduitModel();
            $this->produit_model->id_produit = $id_produit;
            $success = $this->produit_model->delete();
            if($success) {
                header("Location: produit_page");
            } else {
                header("Location: accueil");
            }
        }
    }
?>