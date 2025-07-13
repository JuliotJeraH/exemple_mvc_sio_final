<h1>Liste des fournisseurs</h1>
<div class="d-flex flex-wrap gap-4 justify-content-center">
<?php
    foreach($liste_fournisseurs as $un_fournisseur) {
        require("views/components/UnFournisseur.php");
    }
?>
</div>