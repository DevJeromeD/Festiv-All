<?php
class Utilisateur
{

    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $statut;


    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }


    public function setId_utilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getMdp()
    {
        return $this->mdp;
    }


    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }


    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }
}
