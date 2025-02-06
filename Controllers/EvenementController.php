<?php

class EvenementController extends Controller
{

    public function viewController()
    {

        $evenementModel = new EvenementModel();

        $evenement = $evenementModel->viewModel();
        // var_dump($evenement);
        // die;
        $this->render('Evenement/view', ['evenements' => $evenement]);
    }

    public function viewConcertUser()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $id_categorie = $_GET['id_categorie'];
            // var_dump($id_categorie);
            // die;

            $evenementModel = new EvenementModel();

            $evenements = $evenementModel->viewModelByCategorie($id_categorie);

            $reservationModel = new ReservationModel();
            // $reservations = [];
            foreach ($evenements as $evenement) {
                $evenement->placeRestante = $reservationModel->placeRestante($evenement->id_evenement);
            }

            // var_dump($reservations);
            // die;


            $this->render('Evenement/userView_concert', [
                'evenements' => $evenements
            ]);
        }
    }

    public function viewConcertUserPlace($id_evenement)
    {

        $reservationModel = new ReservationModel();
        $reservation = $reservationModel->placeRestante($id_evenement);

        return $reservation;
    }

    public function add()
    {
        $categorieModel = new CategorieModel();
        $categories = $categorieModel->view();

        $this->render('Evenement/add', ['categories' => $categories]);
    }

    public function addTreatment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // $id_creation = $_POST['id_creation'];
            $nom_evenement = $_POST['nom_evenement'];
            // $categorie = $_POST['nom_categorie'];
            $description = $_POST['description'];
            $date_evenement = $_POST['date_evenement'];
            $nbr_place = $_POST['nbr_place'];
            $id_categorie = $_POST['id_categorie'];

            // var_dump($_POST);
            // die;
            $picture = '';
            if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'images/';
                $uploadFile = $uploadDir . basename($_FILES['picture']['name']);

                if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile)) {
                    $picture = basename($_FILES['picture']['name']);
                }
            }

            $evenement = new Evenement();
            $evenement->setNom_evenement($nom_evenement);
            $evenement->setDescription($description);
            $evenement->setDate_evenement($date_evenement);
            $evenement->setNbr_place($nbr_place);
            $evenement->setId_categorie($id_categorie);
            $evenement->setImage($picture);

            $plop = new EvenementModel();
            $exec = $plop->addModel($evenement);
            // var_dump($_POST);
            // die;

            header('location:index.php?controller=Evenement&action=viewController&exec=' . $exec);
        } else {
            echo "<p>Erreur</p>";
        }
    }


    public function delete()
    {

        $id_evenement = intval($_GET['id_evenement']);

        $evenement2 = new Evenement();
        $evenement2->setId_evenement($id_evenement);
        // var_dump($id_evenement);
        // die;
        $evenement = new EvenementModel();
        $exec = $evenement->deleteFromModel($evenement2);

        header('location:index.php?controller=Evenement&action=viewController&exec=' . $exec);
    }

    public function updateGet()
    {

        $id_evenement = $_GET['id_evenement'];
        $id_categorie = $_GET['id_categorie'];

        // var_dump($id_evenement);
        // var_dump($id_categorie);
        // die;

        $evenement = new Evenement();
        $evenement->setId_evenement($id_evenement);

        $categorieModel = new CategorieModel();
        $categories = $categorieModel->view();

        $evenementModel = new EvenementModel();
        $evenement = $evenementModel->findSelected($evenement);

        // var_dump($categories);
        // die;

        $this->render('Evenement/update', $data = ['evenement' => $evenement, 'categories' => $categories]);
    }

    public function updateTreatment()
    {
        $id_evenement = $_POST['id_evenement'];
        $nom_evenement = $_POST['nom_evenement'];
        $description = $_POST['description'];
        $date_evenement = $_POST['date_evenement'];
        $id_categorie = $_POST['id_categorie'];
        $image = $_POST['image'];


        // var_dump($_POST);
        // die;

        $evenement = new Evenement();

        $evenement->setId_evenement($id_evenement);
        $evenement->setNom_evenement($nom_evenement);
        $evenement->setDescription($description);
        $evenement->setDate_evenement($date_evenement);
        $evenement->setId_categorie($id_categorie);
        $evenement->setImage($image);


        $evenementModel = new EvenementModel();
        $exec = $evenementModel->update($evenement);

        header('location:index.php?controller=Evenement&action=viewController&exec=' . $exec);
    }


    public function showSelected()
    {

        $id_evenement = $_GET['id_evenement'];
        // var_dump($_GET);
        // die;

        $evenement = new Evenement();
        $evenement->setId_evenement($id_evenement);

        $evenementModel = new EvenementModel();
        $flop = $evenementModel->findSelected($evenement);


        // var_dump($flop);
        // die;

        $this->render('Evenement/showSelected', ['evenements' => $flop]);
    }

    public function viewSelected()
    {
        $id_evenement = $_GET['id_evenement'];
        // var_dump($_GET);
        // die;

        $evenement = new Evenement();
        $evenement->setId_evenement($id_evenement);

        $evenementModel = new EvenementModel();
        $evenement = $evenementModel->findSelected($evenement);

        // Récupérer les commentaires associés à l'événement
        $commentaireModel = new CommentaireModel();
        $commentaires = $commentaireModel->viewModel();

        $reservationModel = new ReservationModel();
        $nbPlaceRestante = $reservationModel->placeRestante($id_evenement);

        // var_dump($nbPlaceRestante);
        // die;


        // Passer les deux variables à la vue
        $this->render('Evenement/viewSelected', [
            'evenement' => $evenement,
            'commentaires' => $commentaires,
            'nbPlaceRestante' => $nbPlaceRestante
        ]);
    }






    // COMMENTAIRE





    public function addCommentaire()
    {
        $commentaireModel = new CommentaireModel();
        $commentaire = $commentaireModel->viewModel();

        $this->render('Evenement/viewSelected', ['commentaire2' => $commentaire]);
    }

    public function addCommentaireTreatment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id_evenement = intval($_GET['id_evenement']);


            $contenu = $_POST['contenu'];
            $date_commentaire = $_POST['date_commentaire'];
            $evenement_id = $_POST['evenement_id'];
            $utilisateur_id = $_POST['utilisateur_id'];

            // var_dump($_POST);
            // die;

            $commentaire = new Commentaire();
            $commentaire->setContenu($contenu);
            $commentaire->setDate_commentaire($date_commentaire);
            $commentaire->setEvenement_id($evenement_id);
            $commentaire->setUtilisateur_id($utilisateur_id);

            $plop = new CommentaireModel();
            $exec = $plop->addModel($commentaire);
            // var_dump($_POST);
            // die;

            header('location:index.php?controller=Evenement&action=viewSelected&exec=' . $exec . '&id_evenement=' . $id_evenement);
        } else {
            echo "<p>Erreur</p>";
        }
    }

    public function deleteCommentaire()
    {

        $id_commentaire = intval($_GET['id_commentaire']);
        $id_evenement = intval($_GET['id_evenement']);

        $commentaire2 = new Commentaire();
        $commentaire2->setId_commentaire($id_commentaire);
        // var_dump($id_evenement);
        // die;
        $commentaire = new CommentaireModel();
        $exec = $commentaire->deleteFromModel($commentaire2);

        header('location:index.php?controller=Evenement&action=viewSelected&exec=' . $exec . '&id_evenement=' . $id_evenement);
    }

    public function updateCommentaireGet()
    {

        $id_evenement = $_GET['id_evenement'];
        $id_commentaire = $_GET['id_commentaire'];
        $evenement_id = $_GET['evenement_id'];

        // var_dump($id_commentaire);
        // die;
        // var_dump($id_evenement);
        // var_dump($id_categorie);
        // die;

        $commentaire = new Commentaire();
        $commentaire->setId_commentaire($id_commentaire);
        $commentaire->setEvenement_id($evenement_id);

        // var_dump($id_commentaire);
        // die;

        $commentaireModel = new CommentaireModel();
        $commentaire = $commentaireModel->findSelected($commentaire);

        // === Récupération des détails de l'événement ===
        $evenement = new Evenement();
        $evenement->setId_evenement($id_evenement);

        $evenementModel = new EvenementModel();
        $evenement = $evenementModel->findSelected($evenement);

        // Vérification des données récupérées
        // var_dump($commentaire);
        // var_dump($evenement);
        // var_dump($evenement_id);
        // die;

        // Envoi des données à la vue
        $this->render('Evenement/viewSelected', [
            'commentaires' => $commentaire,
            'evenement' => $evenement,
        ]);
    }

    public function updateCommentaireTreatment()
    {
        $id_evenement = $_GET['id_evenement'];

        $id_commentaire = $_POST['id_commentaire'];
        $contenu = $_POST['contenu'];
        $date_commentaire = $_POST['date_commentaire'];
        $evenement_id = $_POST['evenement_id'];
        $utilisateur_id = $_POST['utilisateur_id'];


        // var_dump($_POST);
        // die;

        $commentaire = new Commentaire();

        $commentaire->setId_commentaire($id_commentaire);
        $commentaire->setContenu($contenu);
        $commentaire->setDate_commentaire($date_commentaire);
        $commentaire->setEvenement_id($evenement_id);
        $commentaire->setUtilisateur_id($utilisateur_id);


        $commentaireModel = new CommentaireModel();
        $exec = $commentaireModel->update($commentaire);

        header('location:index.php?controller=Evenement&action=viewSelected&exec=' . $exec . '&id_evenement=' . $id_evenement);
    }
}
