<?php
require_once("Connexion.php");
class ClientModel {
    public $id_client;
    public $nom_client;
    public $email_client;
    public $adresse_client;
    public function readAll() {
        $bdd = Connexion::getConnexion();
        $req = "SELECT * FROM Clients";
        $etat = $bdd->prepare($req);
        $etat->execute();
        $data = $etat->fetchAll();
        $etat->closeCursor();
        return $data;
    }
    public function create() {
        try {
            $bdd = Connexion::getConnexion();
            $req = "INSERT INTO Clients VALUES (NULL, :nom_client, :email_client, :adresse_client)";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":nom_client", $this->nom_client);
            $etat->bindParam(":email_client", $this->email_client);
            $etat->bindParam(":adresse_client", $this->adresse_client);
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
            $req = "UPDATE Clients SET nom_client = :nom_client, email_client = :email_client, adresse_client = :adresse_client WHERE id_client = :id_client";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":nom_client", $this->nom_client);
            $etat->bindParam(":email_client", $this->email_client);
            $etat->bindParam(":adresse_client", $this->adresse_client);
            $etat->bindParam(":id_client", $this->id_client);
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
            $req = "DELETE FROM Clients WHERE id_client = :id_client";
            $etat = $bdd->prepare($req);
            $etat->bindParam(":id_client", $this->id_client);
            $etat->execute();
            $etat->closeCursor();
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
}
?>