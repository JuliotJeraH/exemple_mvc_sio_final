<?php
require_once("Connexion.php");
class LigneCommandeModel {
    public $id_ligne;
    public $id_produit;
    public $id_commande;
    public $quantite;
    public function readAll() {
        $bdd = Connexion::getConnexion();
        $req = "SELECT * FROM Lignes_commande";
        $etat = $bdd->prepare($req);
        $etat->execute();
        $data = $etat->fetchAll();
        $etat->closeCursor();
        return $data;
    }
    public function create() {
        try {
            $bdd = Connexion::getConnexion();
            $req = "INSERT INTO Lignes_commande VALUES (NULL, :id_produit, :id_commande, :quantite)";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":id_produit", $this->id_produit);
            $etat->bindParam(":id_commande", $this->id_commande);
            $etat->bindParam(":quantite", $this->quantite);
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
            $req = "UPDATE Lignes_commande SET id_produit = :id_produit, id_commande = :id_commande, quantite = :quantite WHERE id_ligne = :id_ligne";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":id_produit", $this->id_produit);
            $etat->bindParam(":id_commande", $this->id_commande);
            $etat->bindParam(":est_livre", $this->est_livre);
            $etat->bindParam(":quantite", $this->quantite);
            $etat->bindParam(":id_ligne", $this->id_ligne);
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
            $req = "DELETE FROM Lignes_commande WHERE id_ligne = :id_ligne";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":id_ligne", $this->id_ligne);
            $etat->execute();
            $etat->closeCursor();
            return true;
        } catch(Exception $e) {
            return false;
        }
    }

    public function readByCommande($id_commande) {
        $bdd = Connexion::getConnexion();
        $req = "SELECT lc.id_ligne, lc.quantite, p.nom_produit, p.prix_produit
                FROM Lignes_commande lc
                JOIN Produits p ON lc.id_produit = p.id_produit
                WHERE lc.id_commande = :id_commande";
        $etat = $bdd->prepare($req);
        $etat->bindParam(":id_commande", $id_commande, PDO::PARAM_INT);
        $etat->execute();
        $data = $etat->fetchAll();
        $etat->closeCursor();
        return $data;
    }
    
    
}
?>