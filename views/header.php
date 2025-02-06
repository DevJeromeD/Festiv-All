<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festiv'All</title>
    <link rel="icon" type="image/x-icon" href="../public/images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fe2b6eda6d.js" crossorigin="anonymous"></script>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-sm navbar-dark colorNash">
            <div class="container-fluid">
                <a class="navbar-brand ecart-perso" href="index.php?controller=Home&action=homeAction"><img src="../public/images/logo.png" alt="Logo du site" class="logo-image"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link colorNash" href="index.php?controller=Home&action=homeAction">Accueil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link colorNash dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Événements</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?controller=Evenement&action=viewConcertUser&id_categorie=1">Concerts</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=Evenement&action=viewConcertUser&&id_categorie=3">Spectacles</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=Evenement&action=viewConcertUser&&id_categorie=2">Ateliers</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Village gourmand</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link colorNash" href="javascript:void(0)">Réserver</a>
                        </li>
                        <?php if (isset($_SESSION['user']['statut']) && $_SESSION['user']['statut'] == "admin") {
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link colorNash dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <?php echo $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'] ?></a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?controller=Evenement&action=viewController">Gestion administrateur</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="index.php?controller=Utilisateur&action=logout&close=1">Se déconnecter</a></li>
                                </ul>
                            </li>
                        <?php
                        } elseif (isset($_SESSION['user']['statut']) && $_SESSION['user']['statut'] == "utilisateur") {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link colorNash" href="index.php?controller=Utilisateur&action=logout&close=1">Se déconnecter</a>
                            </li>
                        <?php
                        } else { ?>
                            <li class="nav-item">
                                <a class="nav-link colorNash" href="index.php?controller=Utilisateur&action=view">Se connecter/S'inscrire</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2 colorNashForm-control" type="text" placeholder="Rechercher">
                        <button class="btn btn-primary colorNashBtn" type="button">Rechercher</button>
                    </form>

                    <!-- <button id="themeSwitch2">
                        <i class="fa-solid fa-moon"></i>
                    </button> -->
                </div>
            </div>
        </nav>
    </header>

    <main>

        <!-- Contenu principal, à chaque page -->
        <div class="content-container">

            <?php

            // var_dump($_SESSION);
            // die;
