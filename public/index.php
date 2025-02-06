<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [
        'id_utilisateur' => 0,
        'nom' => 'Invité',
        'prenom' => 'Utilisateur',
        'statut' => 'invite'
    ];
}


require_once '../Core/Router.php';
require_once '../Core/DbConnect.php';
require_once '../Controllers/Controller.php';

require_once '../Entities/Evenement.php';
require_once '../Models/EvenementModel.php';

require_once '../Entities/Categorie.php';
require_once '../Models/CategorieModel.php';

require_once '../Entities/Utilisateur.php';
require_once '../Models/UtilisateurModel.php';

require_once '../Entities/Commentaire.php';
require_once '../Models/CommentaireModel.php';

require_once '../Entities/Reservation.php';
require_once '../Models/ReservationModel.php';


$router = new Router();
$router->routes();
