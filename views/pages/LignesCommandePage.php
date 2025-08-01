<h1>Liste des commandes</h1>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex gap-2" action="lignes_commande_page" method="post">
        <input class="form-control me-2" name="nom_produit" type="text" placeholder="Nom du produit"
          value="<?php echo isset($_POST['nom_produit']) ? htmlspecialchars($_POST['nom_produit']) : ''; ?>">
        <button class="btn btn-outline-success" type="submit">Filtrer</button>
        <a href="lignes_commande_page" class="btn btn-outline-secondary">Réinitialiser</a>
      </form>
    </div>
  </div>
</nav>

<div class="d-flex flex-wrap gap-4 justify-content-center">
  <?php
  foreach ($liste_commandes as $une_commande) {
    require("views/components/UneCommande.php");
  }
  ?>
</div>
