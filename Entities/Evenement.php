<?php

class Evenement
{

    private $id_evenement;
    private $nom_evenement;
    private $description;
    private $date_evenement;
    private $nbr_place;
    private $id_categorie;
    private $image;


    public function getId_evenement()
    {
        return $this->id_evenement;
    }


    public function setId_evenement($id_evenement)
    {
        $this->id_evenement = $id_evenement;

        return $this;
    }


    public function getNom_evenement()
    {
        return $this->nom_evenement;
    }


    public function setNom_evenement($nom_evenement)
    {
        $this->nom_evenement = $nom_evenement;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }


    public function getDate_evenement()
    {
        return $this->date_evenement;
    }


    public function setDate_evenement($date_evenement)
    {
        $this->date_evenement = $date_evenement;

        return $this;
    }


    public function getNbr_place()
    {
        return $this->nbr_place;
    }


    public function setNbr_place($nbr_place)
    {
        $this->nbr_place = $nbr_place;

        return $this;
    }


    public function getId_categorie()
    {
        return $this->id_categorie;
    }


    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
