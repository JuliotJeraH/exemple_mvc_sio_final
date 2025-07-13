<h2>Ajout au panier</h2>
<form action="panier_page" method="post">
    <div class="mb-3">
        <label for="id_produit" class="form-label">Produit</label>
        <select class="form-select" id="id_produit" name="id_produit">
        <?php foreach($liste_produits as $un_produit) { ?>    
            <option value="<?php echo $un_produit["id_produit"]; ?>"><?php echo $un_produit["nom_produit"]; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité</label>
        <input type="number" id="quantite" name="quantite" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
</form>
<?php require_once("views/components/DetailsPanier.php"); ?>
<form action="commande_page" method="post">
    <button type="submit" class="btn btn-success">Commander</button>
</form>