<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $un_produit["nom_produit"]; ?></h5>
    <p><strong>Prix : </strong><?php echo $un_produit["prix_produit"]; ?></p>
    <p><strong>Stock : </strong><?php echo $un_produit["stock_produit"]; ?></p>
    <p><strong>Fournisseur : </strong><?php echo $un_produit["nom_fournisseur"]; ?></p>
    <div class="d-flex justify-content-between">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifyProduitModal<?php echo $un_produit["id_produit"]; ?>">Modifier</button>
        <?php require("ModifyProduitModal.php"); ?>
        <form action="delete_produit" method="post">
            <input type="hidden" name="id_produit" value="<?php echo $un_produit["id_produit"]; ?>">
            <button class="btn btn-danger">Supprimer</button>
        </form>
    </div>
  </div>
</div>