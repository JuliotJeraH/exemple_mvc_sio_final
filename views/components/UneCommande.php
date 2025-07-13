<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Commande #<?php echo $une_commande["id_commande"]; ?></h5>
        
        <p><strong>Date : </strong><?php echo $une_commande["date_commande"]; ?></p>
        
        <p><strong>Client : </strong><?php echo $une_commande["nom_client"]; ?></p>

        <p><strong>Livré : </strong>
            <?php echo ($une_commande["est_livre"] == 1) ? "Oui" : "Non"; ?>
        </p>

        <div class="d-flex justify-content-between mt-3">
            <!-- Modifier bouton (si tu veux plus tard) -->
            <!--
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifyCommandeModal<?php echo $une_commande["id_commande"]; ?>">
                Modifier
            </button>
            -->

            <!-- Supprimer -->
            <form action="delete_commande" method="post">
                <input type="hidden" name="id_commande" value="<?php echo $une_commande["id_commande"]; ?>">
                <button class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
