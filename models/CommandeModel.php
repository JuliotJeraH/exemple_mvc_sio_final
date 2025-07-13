<?php
require_once("Connexion.php");
class CommandeModel {
    public $id_commande;
    public $id_client;
    public $date_commande;
    public $est_livre;
    public $id_livreur;
    

    public function readAll() {
        $bdd = Connexion::getConnexion();
        $req = "SELECT Commandes.*, Clients.nom_client 
                FROM Commandes 
                JOIN Clients ON Clients.id_client = Commandes.id_client 
                ORDER BY Commandes.date_commande DESC";
        $etat = $bdd->prepare($req);
        $etat->execute();
        $data = $etat->fetchAll();
        $etat->closeCursor();
        return $data;
    }

    public function read($id) {
        $stmt = $this->conn->prepare("SELECT c.*, cl.nom AS nom_client FROM commande c JOIN client cl ON c.id_client = cl.id_client WHERE c.id_commande = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // retourne un seul résultat
    }
    
    
    
    
    

    public function create() {
        try {
            $bdd = Connexion::getConnexion();
            $req = "INSERT INTO Commandes VALUES (NULL, :id_client, NOW(), 0, :id_livreur)";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":id_client", $this->id_client);
            $etat->bindParam(":id_livreur", $this->id_livreur);
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
            $req = "UPDATE Commandes SET date_commande = :date_commande WHERE id_commande = :id_commande";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":date_commande", $this->date_commande);
            $etat->bindParam(":id_commande", $this->id_commande);
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
            $req = "DELETE FROM Commandes WHERE id_commande = :id_commande";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":id_commande", $this->id_commande);
            $etat->execute();
            $etat->closeCursor();
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
}
?>