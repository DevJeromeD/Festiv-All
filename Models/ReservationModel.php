<?php

class ReservationModel extends DbConnect
{
    public function view()
    {
        $this->request = "SELECT * FROM reservation";

        $result = $this->connection->query($this->request);
        $user = $result->fetchAll(PDO::FETCH_OBJ);

        // var_dump($user);
        // die;

        return $user;
    }

    public function addModel(Reservation $reservation)
    {
        // var_dump($reservation);
        // var_dump($categories);

        $this->request = 'INSERT INTO reservation VALUES (
            ' . $reservation->getId_utilisateur() . ', 
            ' . $reservation->getId_evenement() . ', 
            NULL, 
            ' . $reservation->getPlace_taken() . ')';
        // var_dump($reservation);
        // die;
        $result = $this->connection->exec($this->request);


        return $result;
    }

    public function update($reservation)
    {

        $requete = 'UPDATE reservation
    INNER JOIN evenement ON evenement.id_evenement = reservation.id_evenement
    INNER JOIN utilisateur ON utilisateur.id_utilisateur = reservation.id_utilisateur
    SET 
        reservation.id_utilisateur = "' . $reservation->getId_utilisateur() . '",
        reservation.place_taken = "' . $reservation->getPlace_taken() . '",
        evenement.nbr_place = evenement.nbr_place - "' . $reservation->getPlace_taken() . '"
    WHERE reservation.id_reservation = "' . $reservation->getId_reservation() . '"
';

        // Exécution de la requête
        $resultat = $this->connection->exec($requete);



        var_dump($reservation);
        die;

        return $resultat;
    }

    public function placeRestante($id_evenement)
    {

        $this->request = "SELECT nbr_place - SUM(place_taken) AS nb FROM evenement 
        INNER JOIN reservation ON reservation.id_evenement = evenement.id_evenement
        WHERE evenement.id_evenement = " . $id_evenement;

        $result = $this->connection->query($this->request);
        $nb = $result->fetchAll(PDO::FETCH_OBJ);

        // var_dump($user);
        // die;

        if (isset($nb[0]->nb)) {
            return intval($nb[0]->nb);
        } else {
            return -1;
        }
    }
}
