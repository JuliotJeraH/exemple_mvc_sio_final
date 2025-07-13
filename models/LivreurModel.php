<?php
require_once("Connexion.php");
class LivreurModel {
    public $id_livreur;
    public $nom_livreur;
    public $contact_livreur;
    public function readAll() {
        $bdd = Connexion::getConnexion();
        $req = "SELECT * FROM Livreurs";
        $etat = $bdd->prepare($req);
        $etat->execute();
        $data = $etat->fetchAll();
        $etat->closeCursor();
        return $data;
    }
    public function create() {
        try {
            $bdd = Connexion::getConnexion();
            $req = "INSERT INTO Livreurs VALUES (NULL, :nom_livreur, :contact_livreur)";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":nom_livreur", $this->nom_livreur);
            $etat->bindParam(":contact_livreur", $this->contact_livreur);
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
            $req = "UPDATE Livreurs SET nom_livreur = :nom_livreur, contact_livreur = :contact_livreur WHERE id_livreur = :id_livreur";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":nom_livreur", $this->nom_livreur);
            $etat->bindParam(":contact_livreur", $this->contact_livreur);
            $etat->bindParam(":id_livreur", $this->id_livreur);
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
            $req = "DELETE FROM Livreurs WHERE id_livreur = :id_livreur";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":id_livreur", $this->id_livreur);
            $etat->execute();
            $etat->closeCursor();
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
}
?>