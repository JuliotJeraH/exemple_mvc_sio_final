<div class="modal fade" id="modifyCommandeModal<?php echo $une_commande["id_commande"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification d'une commande</h1>
      </div>
      <div class="modal-body">
        <form action="modify_commande" method="post">
          <input type="hidden" value="<?php echo $une_commande["id_commande"]; ?>" name="id_commande">  
          <div class="mb-3">
            <label for="date_commande" class="form-label">Date de la commande : </label>
            <input type="date" id="date_commande" name="date_commande" class="form-control" value="<?php echo $une_commande["date_commande"]; ?>" required>
          </div>
          <div class="mb-3">
            <label for="fournisseur_id" class="form-label">Fournisseur : </label>
            <select id="fournisseur_id" name="fournisseur_id" class="form-select" required>
              <?php foreach($fournisseurs as $fournisseur): ?>
                <option value="<?php echo $fournisseur["id_fournisseur"]; ?>" <?php if($fournisseur["id_fournisseur"] == $une_commande["fournisseur_id"]) echo "selected"; ?>>
                  <?php echo $fournisseur["nom_fournisseur"]; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          