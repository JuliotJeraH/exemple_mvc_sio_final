<?php
    class ProduitController {
        public $produit_model;
        public function createProduit($nom_produit, $prix_produit, $stock_produit, $id_fournisseur) {
            $this->produit_model = new ProduitModel();
            $this->produit_model->nom_produit = $nom_produit;
            $this->produit_model->prix_produit = $prix_produit;
            $this->produit_model->stock_produit = $stock_produit;
            $this->produit_model->id_fournisseur = $id_fournisseur;
            $success = $this->produit_model->create();
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