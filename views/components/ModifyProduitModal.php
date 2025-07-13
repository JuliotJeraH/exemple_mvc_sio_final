<div class="modal fade" id="modifyProduitModal<?php echo $un_produit["id_produit"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification d'un produit</h1>
      </div>
      <div class="modal-body">
      <form action="modify_produit" method="post">
        <input type="hidden" value="<?php echo $un_produit["id_produit"]; ?>" name="id_produit">  
      <div class="mb-3">
        <label for="nom_produit" class="form-label">Nom : </label>
        <input type="text" id="nom_produit" name="nom_produit" class="form-control" value="<?php echo $un_produit["nom_produit"]; ?>" placeholder="Entrer le nom du produit" required>
    </div>
    <div class="mb-3">
        <label for="prix_produit" class="form-label">Prix : </label>
        <input type="number" id="prix_produit" name="prix_produit" class="form-control" value="<?php echo $un_produit["prix_produit"]; ?>" placeholder="Entrer le prix" required>
    </div>
    <div class="mb-3">
        <label for="stock_produit" class="form-label">Stock : </label>
        <input type="number" id="stock_produit" name="stock_produit" class="form-control" value="<?php echo $un_produit["stock_produit"]; ?>" placeholder="Entrer le nombre de stock" required>
    </div>
    <div class="mb-3">
        <label for="id_fournisseur" class="form-label">Fournisseur : </label>
        <select class="form-select" id="id_fournisseur" name="id_fournisseur" aria-label="Default select example">
        <?php foreach($liste_fournisseurs as $un_fournisseur) { ?>    
            <option value="<?php echo $un_fournisseur["id_fournisseur"]; ?>" <?php echo $un_fournisseur["id_fournisseur"] == $un_produit["id_fournisseur"] ? "selected" : "" ; ?>><?php echo $un_fournisseur["nom_fournisseur"]; ?></option>
        <?php } ?>
        </select>
    </div>
  <button type="submit" class="btn btn-primary">Valider la modification</button>
</form>
      </div>
    </div>
  </div>
</div>