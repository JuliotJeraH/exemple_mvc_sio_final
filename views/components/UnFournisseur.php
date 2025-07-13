<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $un_fournisseur["nom_fournisseur"]; ?></h5>
    <div class="d-flex justify-content-between">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifyFournisseurModal<?php echo $un_fournisseur["id_fournisseur"]; ?>">Modifier</button>
        <?php require("ModifyFournisseurModal.php"); ?>
        <form action="delete_fournisseur" method="post">
            <input type="hidden" name="id_fournisseur" value="<?php echo $un_fournisseur["id_fournisseur"]; ?>">
            <button class="btn btn-danger">Supprimer</button>
        </form>
    </div>
  </div>
</div>