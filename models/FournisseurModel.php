<?php
require_once("Connexion.php");
class FournisseurModel {
    public $id_fournisseur;
    public $nom_fournisseur;
    public function readAll() {
        $bdd = Connexion::getConnexion();
        $req = "SELECT * FROM Fournisseurs";
        $etat = $bdd->prepare($req);
        $etat->execute();
        $data = $etat->fetchAll();
        $etat->closeCursor();
        return $data;
    }
    public function create() {
        try {
            $bdd = Connexion::getConnexion();
            $req = "INSERT INTO Fournisseurs VALUES (NULL, :nom_fournisseur)";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":nom_fournisseur", $this->nom_fournisseur);
            $etat->execute();
            $etat->closeCursor();
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
    public function update() {
        try {
            $bdd = Connexion::getConnexion();
            $req = "UPDATE Fournisseurs SET nom_fournisseur = :nom_fournisseur_fournisseur WHERE id_fournisseur = :id_fournisseur";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":nom_fournisseur_fournisseur", $this->nom_fournisseur);
            $etat->bindParam(":id_fournisseur", $this->id_fournisseur);
            $etat->execute();
            $etat->closeCursor();
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
    public function delete() {
        try {
            $bdd = Connexion::getConnexion();
            $req = "DELETE FROM Fournisseurs WHERE id_fournisseur = :id_fournisseur";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":id_fournisseur", $this->id_fournisseur);
            $etat->execute();
            $etat->closeCursor();
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
}
?>