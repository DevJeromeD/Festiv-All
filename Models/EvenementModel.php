<?php

class EvenementModel extends DbConnect
{

    public function viewModel()
    {

        $this->request = "SELECT evenement.id_evenement,
        evenement.nom_evenement,
        evenement.description,
        evenement.date_evenement,
        evenement.nbr_place,
        evenement.id_categorie,
        evenement.image,
        categorie.nom_categorie
        FROM
        evenement
        INNER JOIN categorie ON evenement.id_categorie = categorie.id_categorie ORDER BY evenement.id_evenement ASC;";

        $result = $this->connection->query($this->request);
        $evenement = $result->fetchAll();
        // var_dump($evenement);
        // die;
        return $evenement;
    }

    public function viewModelByCategorie($id_categorie)
    {

        $this->request = "SELECT evenement.id_evenement,
        evenement.nom_evenement,
        evenement.description,
        evenement.date_evenement,
        evenement.nbr_place,
        evenement.id_categorie,
        evenement.image,
        categorie.nom_categorie
        FROM
        evenement
        INNER JOIN categorie ON evenement.id_categorie = categorie.id_categorie WHERE evenement.id_categorie =$id_categorie";

        $result = $this->connection->query($this->request);
        $evenement = $result->fetchAll();
        // var_dump($evenement);
        // die;
        return $evenement;
    }

    public function addModel(Evenement $evenement)
    {
        // var_dump($evenement);
        // var_dump($categories);

        $this->request = 'INSERT INTO evenement VALUES (NULL, 
            "' . $evenement->getNom_evenement() . '", 
            "' . $evenement->getDescription() . '", 
            "' . $evenement->getDate_evenement() . '", 
            ' . $evenement->getNbr_place() . ', 
            ' . $evenement->getId_categorie() . ',
            "' . $evenement->getImage() . '")';
        // var_dump($evenement);
        // die;
        $result = $this->connection->exec($this->request);


        return $result;
    }


    public function deleteFromModel($evenement2)
    {

        $requete = "DELETE FROM evenement WHERE id_evenement=" . $evenement2->getId_evenement();
        $resultat = $this->connection->exec($requete);

        // var_dump($resultat);
        // die;

        return $resultat;
    }

    public function update($evenement)
    {

        $requete = 'UPDATE evenement SET nom_evenement="' . $evenement->getNom_evenement() . '",
         description="' . $evenement->getDescription() . '",
         date_evenement="' . $evenement->getDate_evenement() . '",
         id_categorie=' . $evenement->getId_categorie() . ',
         image="' . $evenement->getImage() . '" WHERE id_evenement=' . $evenement->getId_evenement();
        $resultat = $this->connection->exec($requete);

        return $resultat;
    }

    public function findSelected(Evenement $evenement)
    {

        $this->request = "SELECT evenement.id_evenement,
        evenement.nom_evenement,
        evenement.description,
        evenement.date_evenement,
        evenement.nbr_place,
        evenement.id_categorie,
        evenement.image,
        categorie.nom_categorie
        FROM evenement 
        INNER JOIN categorie ON evenement.id_categorie = categorie.id_categorie
        WHERE id_evenement=" . $evenement->getId_evenement();



        // $this->request = "SELECT * FROM evenement WHERE id_creation=" . $evenement->getId_creation();
        $result = $this->connection->query($this->request);
        $evenements = $result->fetch();
        // var_dump($evenements);
        // die;
        return $evenements;
    }
}
