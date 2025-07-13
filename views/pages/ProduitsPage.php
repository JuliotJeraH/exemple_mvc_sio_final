<h1>Liste des produits</h1>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex" action="produit_page" method="post">
        <input class="form-control me-2" name="nom_produit" type="text" placeholder="Nom du produit">
        <input class="form-control me-2" name="prix_reference" type="text" placeholder="Prix de référence">
        <button class="btn btn-outline-success" type="submit">Filtrer</button>
      </form>
    </div>
  </div>
</nav>
<div class="d-flex flex-wrap gap-4 justify-content-center">
<?php
    foreach($liste_produits as $un_produit) {
        require("views/components/UnProduit.php");
    }
?>
</div>