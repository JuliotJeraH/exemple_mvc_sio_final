<h2>Confirmation de commande</h2>
<h3>Etat du panier</h3>
<?php require_once("views/components/DetailsPanier.php"); ?>
<form action="newCommande" method="post">
    <div class="mb-3">
        <label for="id_client" class="form-label">Client</label>
        <select class="form-select" id="id_client" name="id_client">
        <?php foreach($liste_clients as $un_client) { ?>    
            <option value="<?php echo $un_client["id_client"]; ?>"><?php echo $un_client["nom_client"]; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="id_livreur" class="form-label">Livreur</label>
        <select class="form-select" id="id_livreur" name="id_livreur">
        <?php foreach($liste_livreurs as $un_livreur) { ?>    
            <option value="<?php echo $un_livreur["id_livreur"]; ?>"><?php echo $un_livreur["nom_livreur"]; ?></option>
        <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Confirmer la commande</button>
</form>