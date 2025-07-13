<?php
class Connexion {
    public static $connex;
    public static function getConnexion() {
        if(self::$connex == null) {
            $user = "mysql:host=127.0.0.1;dbname=donnees_vente_fictives";
            $login = "root";
            $mdp = "";
            self::$connex = new PDO($user, $login, $mdp);
        }
        return self::$connex;
    }
}
?>