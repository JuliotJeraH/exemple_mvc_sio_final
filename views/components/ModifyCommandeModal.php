<!-- Modal Bootstrap -->
<div class="modal fade" id="modifyCommandeModal<?php echo $une_commande['id_commande']; ?>" tabindex="-1" aria-labelledby="modifyCommandeLabel<?php echo $une_commande['id_commande']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="modify_commande" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="modifyCommandeLabel<?php echo $une_commande['id_commande']; ?>">Modifier Commande #<?php echo $une_commande['id_commande']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_commande" value="<?php echo $une_commande['id_commande']; ?>">
          <!-- Ici les champs modifiables, exemple : -->
          <div class="mb-3">
            <label for="date_commande_<?php echo $une_commande['id_commande']; ?>" class="form-label">Date</label>
            <input type="date" class="form-control" id="date_commande_<?php echo $une_commande['id_commande']; ?>" name="date_commande" value="<?php echo htmlspecialchars($une_commande['date_commande']); ?>">
          </div>
          <!-- Ajoute les autres champs à modifier ici -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Enregistrer</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>
