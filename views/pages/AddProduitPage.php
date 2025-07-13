<h1>Nouveau produit : </h1>
<form action="createNewProduit" method="post">
    <div class="mb-3">
        <label for="nom_produit" class="form-label">Nom : </label>
        <input type="text" id="nom_produit" name="nom_produit" class="form-control" placeholder="Entrer le nom du produit" required>
    </div>
    <div class="mb-3">
        <label for="prix_produit" class="form-label">Prix : </label>
        <input type="number" id="prix_produit" name="prix_produit" class="form-control" placeholder="Entrer le prix" required>
    </div>
    <div class="mb-3">
        <label for="stock_produit" class="form-label">Stock : </label>
        <input type="number" id="stock_produit" name="stock_produit" class="form-control" placeholder="Entrer le nombre de stock" required>
    </div>
    <div class="mb-3">
        <label for="id_fournisseur" class="form-label">Fournisseur : </label>
        <select class="form-select" id="id_fournisseur" name="id_fournisseur">
        <?php foreach($liste_fournisseurs as $un_fournisseur) { ?>    
            <option value="<?php echo $un_fournisseur["id_fournisseur"]; ?>"><?php echo $un_fournisseur["nom_fournisseur"]; ?></option>
        <?php } ?>
        </select>
    </div>
  <button type="submit" class="btn btn-primary">Ajouter le nouveau produit</button>
</form>