<?php
    require_once("controllers/PagesController.php");
    require_once("controllers/FournisseurController.php");
    require_once("controllers/ProduitController.php");
    require_once("controllers/CommandeController.php");
    if(empty($_GET["page"])) {
        $page = "accueil";
    } else {
        $path = explode("/", filter_var($_GET["page"]), FILTER_SANITIZE_URL);
        $page = $path[0];
    }
    switch($page) {
        case "accueil":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            $pageController = new PagesController();
            $pageController->homePage();
            break;
        case "fournisseur_page":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            $pageController = new PagesController();
            $pageController->fournisseursPage();
            break;
        case "add_fournisseur_page":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            $pageController = new PagesController();
            $pageController->addFournisseurPage();
            break;
        case "modify_fournisseur":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            if(isset($_POST["id_fournisseur"])
            and isset($_POST["nom_fournisseur"])) {
                $id_fournisseur = $_POST["id_fournisseur"];
                $nom_fournisseur = htmlspecialchars($_POST["nom_fournisseur"]);
                if(empty($id_fournisseur) 
                or empty($nom_fournisseur)) {
                    header("Location: fournisseur_page");
                }
                $fournisseur_control = new FournisseurController();
                $fournisseur_control->modifyFournisseur($id_fournisseur, $nom_fournisseur);
            } else {
                header("Location: fournisseur_page");
            }
            break;
        case "delete_fournisseur":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            if(isset($_POST["id_fournisseur"])) {
                $id_fournisseur = $_POST["id_fournisseur"];
                if(empty($id_fournisseur)) {
                    header("Location: fournisseur_page");
                }
                $fournisseur_control = new FournisseurController();
                $fournisseur_control->deleteFournisseur($id_fournisseur);
                } else {
                    header("Location: fournisseur_page");
                }
                break;
        case "createNewFournisseur":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            if(isset($_POST["nom_fournisseur"])) {
                $nom_fournisseur = htmlspecialchars($_POST["nom_fournisseur"]);
                if(empty($nom_fournisseur)) {
                    header("Location: add_fournisseur_page");
                }
                $fournisseur_control = new FournisseurController();
                $fournisseur_control->createFournisseur($nom_fournisseur);
            } else {
                header("Location: add_fournisseur_page");
            }
            break;
        case "produit_page":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            $pageController = new PagesController();
            if(isset($_POST["nom_produit"])
            and isset($_POST["prix_reference"])) {
                extract($_POST);
                $nom_produit = htmlspecialchars($nom_produit);
                $prix_reference = htmlspecialchars($prix_reference);
                if(empty($prix_reference)) {
                    $prix_reference = 9999999999;
                }
                $pageController->produitsFiltresPage($nom_produit, $prix_reference);
            } else {
                $pageController->produitsPage();
            }
            break;
        case "add_produit_page":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            $pageController = new PagesController();
            $pageController->addProduitPage();
            break;
        case "modify_produit":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            if(isset($_POST["id_produit"])
            and isset($_POST["nom_produit"])
            and isset($_POST["prix_produit"])
            and isset($_POST["stock_produit"])
            and isset($_POST["id_fournisseur"])) {
                $id_produit = $_POST["id_produit"];
                $nom_produit = htmlspecialchars($_POST["nom_produit"]);
                $prix_produit = htmlspecialchars($_POST["prix_produit"]);
                $stock_produit = htmlspecialchars($_POST["stock_produit"]);
                $id_fournisseur = $_POST["id_fournisseur"];
                if(empty($id_produit) 
                or empty($nom_produit)
                or empty($prix_produit)
                or empty($stock_produit)
                or empty($id_fournisseur)) {
                    header("Location: produit_page");
                }
                $produit_control = new ProduitController();
                $produit_control->modifyProduit($id_produit, $nom_produit, $prix_produit, $stock_produit, $id_fournisseur);
            } else {
                header("Location: produit_page");
            }
            break;
        case "delete_produit":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            if(isset($_POST["id_produit"])) {
                $id_produit = $_POST["id_produit"];
                if(empty($id_produit)) {
                    header("Location: produit_page");
                }
                $produit_control = new ProduitController();
                $produit_control->deleteProduit($id_produit);
            } else {
                header("Location: produit_page");
            }
            break;
        case "createNewProduit":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            if(isset($_POST["nom_produit"])
            and isset($_POST["prix_produit"])
            and isset($_POST["stock_produit"])
            and isset($_POST["id_fournisseur"])) {
                $nom_produit = htmlspecialchars($_POST["nom_produit"]);
                $prix_produit = htmlspecialchars($_POST["prix_produit"]);
                $stock_produit = htmlspecialchars($_POST["stock_produit"]);
                $id_fournisseur = htmlspecialchars($_POST["id_fournisseur"]);
                if(empty($nom_produit)
                or empty($prix_produit)
                or empty($stock_produit)
                or empty($id_fournisseur)) {
                    header("Location: add_produit_page");
                }
                $produit_control = new ProduitController();
                $produit_control->createProduit($nom_produit, $prix_produit, $stock_produit, $id_fournisseur);
            } else {
                header("Location: add_produit_page");
            }
            break;
            case "panier_page":
                if (session_status() != 2) {
                    session_start();
                }
            
                // Initialiser la session panier si nécessaire
                if (!isset($_SESSION["etat_stock"])) {
                    $_SESSION["etat_stock"] = false;
                }
            
                // Si formulaire soumis
                if (isset($_POST["id_produit"]) && isset($_POST["quantite"])) {
                    $id_produit = $_POST["id_produit"];
                    $quantite = htmlspecialchars($_POST["quantite"]);
            
                    if (empty($id_produit) || empty($quantite)) {
                        header("Location: panier_page");
                        exit;
                    }
            
                    $util = new Utilities();
                    $util->ajouterPanier($id_produit, $quantite);
            
                    header("Location: panier_page");
                    exit;
                }
            
                // Sinon, on affiche la page (après tout traitement POST)
                $page_control = new PagesController();
                $page_control->panierPage();
                break;
            
            
        case "commande_page":
            $page_control = new PagesController();
            $page_control->commandePage();
            if(isset($_POST["id_produit"])
                and isset($_POST["quantite"])) {
                    extract($_POST);
                    $quantite = htmlspecialchars($quantite);
                    if(empty($id_produit)
                    or empty($quantite)) {
                        header("Location: panier_page");
                    }
                    $util = new Utilities();
                    $util->ajouterPanier($id_produit, $quantite);
                    header("Location: panier_page");
                }
            break;
        case "newCommande":
            if(isset($_POST["id_client"])
            and isset($_POST["id_livreur"])) {
                extract($_POST);
                if(empty($id_client)
                or empty($id_livreur)) {
                    header("Location: accueil");
                }
                $commande_control = new CommandeController();
                $commande_control->createCommande($id_client, $id_livreur);
                } else {
                    header("Location: accueil");
                }
            break;

        case "lignes_commande_page":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            $pageController = new PagesController();
            $pageController->lignesCommandePage();
            break;

        case "delete_commande":
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            if(isset($_POST["id_commande"])) {
                $id_commande = $_POST["id_commande"];
                if(empty($id_commande)) {
                    header("Location: lignes_commande_page");
                    exit;
                }
                require_once("controllers/CommandeController.php");
                $commande_control = new CommandeController();
                $commande_control->deleteCommande($id_commande);
            } else {
                header("Location: lignes_commande_page");
            }
            break;

        case "modify_commande":
            $commandeController = new CommandeController();
            $commandeController->modifyCommande();
            break;
            
            
        
        default:
            if(session_status() != 2) {
                session_start();
                session_destroy();
            }
            echo "<p>Tsisy lty ah</p>";
            break;
    }
?>