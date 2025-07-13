<div class="modal fade" id="modifyFournisseurModal<?php echo $un_fournisseur["id_fournisseur"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification d'un fournisseur</h1>
      </div>
      <div class="modal-body">
      <form action="modify_fournisseur" method="post">
        <input type="hidden" value="<?php echo $un_fournisseur["id_fournisseur"]; ?>" name="id_fournisseur">  
      <div class="mb-3">
        <label for="nom_fournisseur" class="form-label">Nom : </label>
        <input type="text" id="nom_fournisseur" name="nom_fournisseur" class="form-control" value="<?php echo $un_fournisseur["nom_fournisseur"]; ?>" placeholder="Entrer le nom du fournisseur" required>
    </div>
  <button type="submit" class="btn btn-primary">Valider la modification</button>
</form>
      </div>
    </div>
  </div>
</div>