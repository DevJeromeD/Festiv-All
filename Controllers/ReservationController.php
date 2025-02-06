<?php

class ReservationController extends Controller
{

    public function addTreatment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id_utilisateur = $_POST['id_utilisateur'];
            $id_evenement = $_POST['id_evenement'];
            $place_taken = $_POST['place_taken'];

            // var_dump($_POST);
            // die;

            $reservation = new Reservation();

            $reservation->setId_utilisateur($id_utilisateur);
            $reservation->setId_evenement($id_evenement);
            $reservation->setPlace_taken($place_taken);

            $ReservationModel = new ReservationModel();
            $exec = $ReservationModel->addModel($reservation);
            // var_dump($_POST);
            // die;

            header('location:index.php?controller=home&action=homeAction&exec=' . $exec);
        } else {
            echo "<p>Erreur</p>";
        }
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

        $id_utilisateur = $_POST['id_utilisateur'];
        $id_evenement = $_POST['id_evenement'];
        $id_reservation = $_POST['id_reservation'];
        $place_taken = $_POST['place_taken'];

        // var_dump($_POST);
        // die;

        $reservation = new Reservation();

        $reservation->setId_utilisateur($id_utilisateur);
        $reservation->setId_evenement($id_evenement);
        $reservation->setId_reservation($id_reservation);
        $reservation->setPlace_taken($place_taken);



        $ReservationModel = new ReservationModel();
        $exec = $ReservationModel->update($reservation);

        header('location:index.php?controller=Home&action=homeAction&exec=' . $exec);
    }
}
