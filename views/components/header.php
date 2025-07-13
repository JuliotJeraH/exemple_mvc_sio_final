
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="accueil">Vente SIO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="accueil">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Fournisseurs
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="fournisseur_page">Liste des fournisseurs</a></li>
            <li><a class="dropdown-item" href="add_fournisseur_page">Nouveau fournisseur</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produits
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="produit_page">Liste des produits</a></li>
            <li><a class="dropdown-item" href="add_produit_page">Nouveau produit</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Commandes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="lignes_commande_page">Liste des commandes</a></li>
            <li><a class="dropdown-item" href="panier_page">Nouvelle commande</a></li>
          </ul>

        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>