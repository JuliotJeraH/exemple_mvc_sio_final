<?php
// On récupère ici $une_commande et $totaux_commandes accessibles dans la vue
require_once("models/LigneCommandeModel.php");
$ligneModel = new LigneCommandeModel();
$liste_lignes = $ligneModel->readByCommande($une_commande["id_commande"]);
?>

<div class="card" style="width: 18rem; margin-bottom:20px;">
    <div class="card-body">
        <h5 class="card-title">Commande #<?php echo $une_commande["id_commande"]; ?></h5>
        <p><strong>Date :</strong> <?php echo htmlspecialchars($une_commande["date_commande"]); ?></p>
        <p><strong>Client :</strong> <?php echo htmlspecialchars($une_commande["nom_client"]); ?></p>
        <p><strong>Livré :</strong> <?php echo ($une_commande["est_livre"] == 1) ? "Oui" : "Non"; ?></p>

        <p><strong>Produits :</strong></p>
        <ul>
        <?php
            foreach($liste_lignes as $ligne) {
                $sous_total = $ligne["quantite"] * $ligne["prix_produit"];
                echo "<li>" . htmlspecialchars($ligne["nom_produit"]) 
                     . " x " . intval($ligne["quantite"]) 
                     . " - Prix unitaire : " . number_format($ligne["prix_produit"], 0, ',', ' ') . " Ar"
                     . " - Sous-total : " . number_format($sous_total, 0, ',', ' ') . " Ar</li>";
            }
        ?>
        </ul>

        <p><strong>Total commande : </strong>
            <?php 
                echo number_format($totaux_commandes[$une_commande["id_commande"]], 0, ',', ' ') . " Ar"; 
            ?>
        </p>

        <div class="d-flex gap-2 mt-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifyCommandeModal<?php echo $une_commande["id_commande"]; ?>">Modifier</button>

            <form action="delete_commande" method="post" onsubmit="return confirm('Confirmer la suppression de la commande ?');" style="margin: 0;">
                <input type="hidden" name="id_commande" value="<?php echo $une_commande["id_commande"]; ?>">
                <button class="btn btn-danger">Supprimer</button>
            </form>
        </div>

        <?php require("ModifyCommandeModal.php"); ?>
    </div>
</div>
