<?php
require_once("Connexion.php");
class ProduitModel {
    public $id_produit;
    public $nom_produit;
    public $prix_produit;
    public $stock_produit;
    public $id_fournisseur;
    public function readAll() {
        $bdd = Connexion::getConnexion();
        $req = "SELECT * FROM Produits NATURAL JOIN Fournisseurs ORDER BY id_produit";
        $etat = $bdd->prepare($req);
        $etat->execute();
        $data = $etat->fetchAll();
        $etat->closeCursor();
        return $data;
    }
    public function readById() {
        $bdd = Connexion::getConnexion();
        $req = "SELECT * FROM Produits WHERE id_produit = :id_produit";
        $etat = $bdd->prepare($req);
        $etat->bindParam(":id_produit", $this->id_produit);
        $etat->execute();
        $data = $etat->fetch();
        $etat->closeCursor();
        return $data;
    }
    public function readByNomPrix() {
        $bdd = Connexion::getConnexion();
        $req = "SELECT * FROM Produits NATURAL JOIN Fournisseurs WHERE nom_produit LIKE :nom_produit AND prix_produit < :prix_produit";
        $etat = $bdd->prepare($req);
        $pattern = $this->nom_produit;
        $pattern = "%$pattern%";
        $etat->bindParam(":nom_produit", $pattern);
        $etat->bindParam(":prix_produit", $this->prix_produit);
        $etat->execute();
        $data = $etat->fetchAll();
        $etat->closeCursor();
        return $data;
    }
    public function create() {
        try {
            $bdd = Connexion::getConnexion();
            $req = "INSERT INTO Produits VALUES (NULL, :nom_produit, :prix_produit, :stock_produit, :id_fournisseur)";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":nom_produit", $this->nom_produit);
            $etat->bindParam(":prix_produit", $this->prix_produit);
            $etat->bindParam(":stock_produit", $this->stock_produit);
            $etat->bindParam(":id_fournisseur", $this->id_fournisseur);
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
            $req = "UPDATE Produits SET nom_produit = :nom_produit, prix_produit = :prix_produit, stock_produit = :stock_produit, id_fournisseur = :id_fournisseur WHERE id_produit = :id_produit";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":nom_produit", $this->nom_produit);
            $etat->bindParam(":prix_produit", $this->prix_produit);
            $etat->bindParam(":stock_produit", $this->stock_produit);
            $etat->bindParam(":id_fournisseur", $this->id_fournisseur);
            $etat->bindParam(":id_produit", $this->id_produit);
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
            $req = "DELETE FROM Produits WHERE id_produit = :id_produit";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":id_produit", $this->id_produit);
            $etat->execute();
            $etat->closeCursor();
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
}
?>