<h2>Nos produits tendance</h2>
<div class="d-flex flex-wrap gap-4 justify-content-center">
<?php
    foreach($liste_produits as $un_produit) {
        require("views/components/UnProduit.php");
    }
?>
</div>