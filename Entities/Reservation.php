<?php

class Reservation
{

    private $id_utilisateur;
    private $id_evenement;
    private $id_reservation;
    private $place_taken;




    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }


    public function setId_utilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }




    public function getId_evenement()
    {
        return $this->id_evenement;
    }


    public function setId_evenement($id_evenement)
    {
        $this->id_evenement = $id_evenement;

        return $this;
    }




    public function getId_reservation()
    {
        return $this->id_reservation;
    }


    public function setId_reservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;

        return $this;
    }




    public function getPlace_taken()
    {
        return $this->place_taken;
    }


    public function setPlace_taken($place_taken)
    {
        $this->place_taken = $place_taken;

        return $this;
    }
}
