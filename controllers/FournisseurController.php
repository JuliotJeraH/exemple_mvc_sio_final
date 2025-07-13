<?php
    class FournisseurController {
        public $fournisseur_model;
        public function createFournisseur($nom_fournisseur) {
            $this->fournisseur_model = new FournisseurModel();
            $this->fournisseur_model->nom_fournisseur = $nom_fournisseur;
            $success = $this->fournisseur_model->create();
            if($success) {
                header("Location: fournisseur_page");
            } else {
                header("Location: accueil");
            }
        }
        public function modifyFournisseur($id_fournisseur, $nom_fournisseur) {
            $this->fournisseur_model = new FournisseurModel();
            $this->fournisseur_model->id_fournisseur = $id_fournisseur;
            $this->fournisseur_model->nom_fournisseur = $nom_fournisseur;
            $success = $this->fournisseur_model->update();
            if($success) {
                header("Location: fournisseur_page");
            } else {
                header("Location: accueil");
            }
        }
        public function deleteFournisseur($id_fournisseur) {
            $this->fournisseur_model = new FournisseurModel();
            $this->fournisseur_model->id_fournisseur = $id_fournisseur;
            $success = $this->fournisseur_model->delete();
            if($success) {
                header("Location: fournisseur_page");
            } else {
                header("Location: accueil");
            }
        }
    }
?>