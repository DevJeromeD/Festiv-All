<?php

class UtilisateurController extends Controller
{

    public function view()
    {
        $utilisateurModel = new UtilisateurModel();

        $user = $utilisateurModel->view();
        // var_dump($evenement);
        // die;
        $this->render('Utilisateur/connexion', ['users' => $user]);
    }

    public function connexionController()
    {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        // }

        // $user = new Utilisateur();
        // $user->setEmail($email);
        // $user->setMdp($mdp);
        // var_dump($user);
        // die;

        $userModel = new UtilisateurModel();

        $user = $userModel->getUser($email, $mdp);
        // var_dump($user);
        // die;

        // echo "Coucou";

        // var_dump($user[0]->prenom);
        // var_dump($email);
        // die;

        if (isset($user->email, $user->mdp) && $user->email == $email && $user->mdp == $mdp) {
            // Code à exécuter si l'utilisateur est trouvé et les informations correspondent
            // Exemple : Démarrer une session
            $_SESSION['user'] = [
                'id_utilisateur' => $user->id_utilisateur,
                'nom' => $user->nom,
                'prenom' => $user->prenom,
                'statut' => $user->statut
            ];
            // var_dump($_SESSION);
            // // die;
            // echo "coucou";
            // exit;
        } else {
            // Code à exécuter si les identifiants sont incorrects
            // Exemple : Message d'erreur
            echo "Identifiants incorrects.";
        }

        $this->render('home/homeAction', ['users' => $user]);
        // }
    }


    public function logout()
    {

        $close = $_GET['close'];

        if (isset($close) && $close == 1) {
            session_destroy();
            header("Location: index.php?controller=Home&action=homeAction");
        }

        // $this->render('home/homeAction');
    }

    public function add()
    {
        $utilisateurModel = new UtilisateurModel();
        $users = $utilisateurModel->view();

        $this->render('Utilisateur/add', ['users' => $users]);
    }

    public function addTreatment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $statut = $_POST['statut'];

            // var_dump($_POST);
            // die;

            $user = new Utilisateur();
            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setEmail($email);
            $user->setMdp($mdp);
            $user->setStatut($statut);

            $plop = new utilisateurModel();
            $exec = $plop->addUser($user);
            // var_dump($_POST);
            // die;

            header('location:index.php?controller=home&action=homeAction&exec=' . $exec);
        } else {
            echo "<p>Erreur</p>";
        }
    }
}
