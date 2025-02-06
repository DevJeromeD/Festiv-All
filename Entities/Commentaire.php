<?php

class Commentaire
{
    private $id_commentaire;
    private $contenu;
    private $date_commentaire;
    private $evenement_id;
    private $utilisateur_id;




    public function getId_commentaire()
    {
        return $this->id_commentaire;
    }


    public function setId_commentaire($id_commentaire)
    {
        $this->id_commentaire = $id_commentaire;

        return $this;
    }




    public function getContenu()
    {
        return $this->contenu;
    }


    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }




    public function getDate_commentaire()
    {
        return $this->date_commentaire;
    }


    public function setDate_commentaire($date_commentaire)
    {
        $this->date_commentaire = $date_commentaire;

        return $this;
    }



    public function getEvenement_id()
    {
        return $this->evenement_id;
    }


    public function setEvenement_id($evenement_id)
    {
        $this->evenement_id = $evenement_id;

        return $this;
    }




    public function getUtilisateur_id()
    {
        return $this->utilisateur_id;
    }


    public function setUtilisateur_id($utilisateur_id)
    {
        $this->utilisateur_id = $utilisateur_id;

        return $this;
    }
}
