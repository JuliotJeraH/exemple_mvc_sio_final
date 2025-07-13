<!-- Modal Bootstrap -->
<div class="modal fade" id="modifyCommandeModal<?php echo $une_commande['id_commande']; ?>" tabindex="-1" aria-labelledby="modifyCommandeLabel<?php echo $une_commande['id_commande']; ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- plus large pour lignes produits -->
    <div class="modal-content">
      <form action="modify_commande" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="modifyCommandeLabel<?php echo $une_commande['id_commande']; ?>">Modifier Commande #<?php echo $une_commande['id_commande']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_commande" value="<?php echo $une_commande['id_commande']; ?>">

          <div class="mb-3">
            <label for="date_commande_<?php echo $une_commande['id_commande']; ?>" class="form-label">Date</label>
            <input type="date" class="form-control" id="date_commande_<?php echo $une_commande['id_commande']; ?>" name="date_commande" value="<?php echo htmlspecialchars($une_commande['date_commande']); ?>" required>
          </div>

          <div class="mb-3">
            <label for="est_livre_<?php echo $une_commande['id_commande']; ?>" class="form-label">Livré ?</label>
            <select id="est_livre_<?php echo $une_commande['id_commande']; ?>" name="est_livre" class="form-select" required>
              <option value="0" <?php if($une_commande['est_livre'] == 0) echo "selected"; ?>>Non</option>
              <option value="1" <?php if($une_commande['est_livre'] == 1) echo "selected"; ?>>Oui</option>
            </select>
          </div>

          <!-- Lignes produits modifiables -->
          <h6>Produits commandés</h6>
          <?php
            // Récupérer les lignes
            require_once("models/LigneCommandeModel.php");
            $ligneModel = new LigneCommandeModel();
            $lignes = $ligneModel->readByCommande($une_commande['id_commande']);
            foreach($lignes as $index => $ligne) {
              ?>
              <div class="mb-3 row align-items-center">
                <input type="hidden" name="id_ligne[<?php echo $index; ?>]" value="<?php echo $ligne['id_ligne']; ?>">
                <label class="col-sm-4 col-form-label"><?php echo htmlspecialchars($ligne['nom_produit']); ?></label>
                <div class="col-sm-4">
                  <input type="number" name="quantite[<?php echo $index; ?>]" class="form-control" min="1" value="<?php echo intval($ligne['quantite']); ?>" required>
                </div>
              </div>
              <?php
            }
          ?>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Enregistrer</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>
